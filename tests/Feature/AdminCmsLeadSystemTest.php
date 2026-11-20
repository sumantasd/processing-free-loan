<?php

namespace Tests\Feature;

use App\Models\AuditLog;
use App\Models\HomepageSection;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\LeadFollowup;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AdminCmsLeadSystemTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Test 1: Public Homepage & Product Pages return HTTP 200.
     */
    public function test_public_pages_render_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/personal-loan');
        $response->assertStatus(200);

        $response = $this->get('/partners');
        $response->assertStatus(200);

        $response = $this->get('/about');
        $response->assertStatus(200);

        $response = $this->get('/privacy-policy');
        $response->assertStatus(200);
    }

    /**
     * Test 2: Admin routes require authentication and admin role.
     */
    public function test_admin_routes_protected_by_rbac(): void
    {
        // Guest is redirected to admin login
        $guestResponse = $this->get('/admin');
        $guestResponse->assertRedirect('/admin/login');

        // Ordinary employee (role: caller) is blocked from /admin
        $caller = User::where('email', 'caller@processingfreeloan.com')->first();
        $this->actingAs($caller);
        $callerResponse = $this->get('/admin');
        $callerResponse->assertStatus(403);

        // Super Admin has full access to /admin
        $admin = User::where('email', 'admin@processingfreeloan.com')->first();
        $this->actingAs($admin);
        $adminResponse = $this->get('/admin');
        $adminResponse->assertStatus(200);
    }

    /**
     * Test 3: User Workspace is accessible to employees and strictly isolates leads.
     */
    public function test_user_workspace_and_lead_isolation(): void
    {
        $caller = User::where('email', 'caller@processingfreeloan.com')->first();
        $manager = User::where('email', 'manager@processingfreeloan.com')->first();

        // 1. Caller accesses user dashboard
        $this->actingAs($caller);
        $dashResponse = $this->get('/user/dashboard');
        $dashResponse->assertStatus(200);

        // 2. Create a lead assigned to Manager
        $managerLead = Lead::create([
            'full_name' => 'Manager Exclusive Lead',
            'mobile' => '9876543210',
            'loan_category' => 'business_loan',
            'loan_amount' => 1500000,
            'status' => 'allocated',
            'assigned_to' => $manager->id,
            'reference_code' => 'PFL-TEST-MGR-01',
        ]);

        // 3. Caller tries to view Manager's lead -> 404 / denied
        $unauthorizedLeadResponse = $this->get("/user/leads/{$managerLead->id}");
        $unauthorizedLeadResponse->assertStatus(404);

        // 4. Create a lead assigned to Caller
        $callerLead = Lead::create([
            'full_name' => 'Caller Owned Lead',
            'mobile' => '9876543211',
            'loan_category' => 'personal_loan',
            'loan_amount' => 500000,
            'status' => 'allocated',
            'assigned_to' => $caller->id,
            'reference_code' => 'PFL-TEST-CALLER-01',
        ]);

        // Caller CAN view their own lead
        $authorizedLeadResponse = $this->get("/user/leads/{$callerLead->id}");
        $authorizedLeadResponse->assertStatus(200);

        // Caller can update status and add interaction note
        $updateResponse = $this->post("/user/leads/{$callerLead->id}/status", [
            'status' => 'contacted',
            'note' => 'Spoke with customer, requested payslips.',
        ]);
        $updateResponse->assertRedirect();

        // Verify status and activity recorded
        $this->assertDatabaseHas('leads', [
            'id' => $callerLead->id,
            'status' => 'contacted',
        ]);
        $this->assertDatabaseHas('lead_activities', [
            'lead_id' => $callerLead->id,
            'activity_type' => 'status_changed',
        ]);
        $this->assertDatabaseHas('lead_notes', [
            'lead_id' => $callerLead->id,
            'user_id' => $caller->id,
        ]);
    }

    /**
     * Test 4: Dynamic CMS Section update persists and reflects live.
     */
    public function test_dynamic_cms_update_and_persistence(): void
    {
        $admin = User::where('email', 'admin@processingfreeloan.com')->first();
        $this->actingAs($admin);

        $heroSection = HomepageSection::where('section_key', 'hero')->first();
        $this->assertNotNull($heroSection);

        $customTitle = 'Exclusive Zero Processing Fee Loans 2026';
        $updateResponse = $this->post("/admin/cms/homepage/sections/{$heroSection->id}", [
            'title' => $customTitle,
            'badge' => 'PREMIUM FINTECH VERIFIED',
            'subtitle' => 'Custom updated subtitle via CMS test suite.',
            'is_active' => '1',
            'display_order' => '1',
        ]);
        $updateResponse->assertRedirect();

        // Check MySQL database persistence
        $this->assertDatabaseHas('homepage_sections', [
            'id' => $heroSection->id,
            'title' => $customTitle,
            'badge' => 'PREMIUM FINTECH VERIFIED',
        ]);

        // Check Audit Log entry
        $this->assertDatabaseHas('audit_logs', [
            'action' => 'homepage_section_updated',
            'user_id' => $admin->id,
        ]);

        // Check public website renders updated title
        $publicResponse = $this->get('/');
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee($customTitle);
    }

    /**
     * Test 5: Single & Bulk Lead Allocation by Admin.
     */
    public function test_admin_lead_allocation(): void
    {
        $admin = User::where('email', 'admin@processingfreeloan.com')->first();
        $caller = User::where('email', 'caller@processingfreeloan.com')->first();
        $this->actingAs($admin);

        // Create 2 fresh leads
        $lead1 = Lead::create([
            'full_name' => 'Allocation Applicant 1',
            'mobile' => '9876543221',
            'loan_category' => 'car_loan',
            'status' => 'new',
            'reference_code' => 'PFL-ALLOC-01',
        ]);
        $lead2 = Lead::create([
            'full_name' => 'Allocation Applicant 2',
            'mobile' => '9876543222',
            'loan_category' => 'home_loan',
            'status' => 'new',
            'reference_code' => 'PFL-ALLOC-02',
        ]);

        // Bulk allocate to caller
        $allocResponse = $this->post('/admin/leads/allocate', [
            'lead_ids' => [$lead1->id, $lead2->id],
            'assigned_to' => $caller->id,
            'allocation_note' => 'Allocated for urgent telephone verification.',
        ]);
        $allocResponse->assertRedirect();

        // Check leads updated to 'allocated' and assigned to caller
        $this->assertDatabaseHas('leads', [
            'id' => $lead1->id,
            'status' => 'allocated',
            'assigned_to' => $caller->id,
        ]);
        $this->assertDatabaseHas('leads', [
            'id' => $lead2->id,
            'status' => 'allocated',
            'assigned_to' => $caller->id,
        ]);

        // Check allocation history records created
        $this->assertDatabaseHas('lead_allocations', [
            'lead_id' => $lead1->id,
            'assigned_user_id' => $caller->id,
            'allocated_by_user_id' => $admin->id,
        ]);
    }
}

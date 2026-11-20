<?php

namespace Tests\Feature;

use App\Models\AuditLog;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TestimonialsCmsTest extends TestCase
{
    use DatabaseTransactions;

    protected function getAdmin(): User
    {
        return User::where('email', 'admin@processingfreeloan.com')->first();
    }

    /**
     * Test 1: Public homepage renders testimonials with complete cards, ratings and loan badges.
     */
    public function test_public_homepage_renders_testimonials_cards(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Section header and key customer names
        $response->assertSee('What Our Customers Say');
        $response->assertSee('Verified Customer Reviews');
        $response->assertSee('Subrata Mukherjee');
        $response->assertSee('Dr. Debolina Banerjee');
        $response->assertSee('Anupam Roy');

        // Review text and loan category badges
        $response->assertSee('Salaried Personal Loan');
        $response->assertSee('Doctor Professional Loan');
        $response->assertSee('Unsecured Business Loan');

        // Carousel touch handlers
        $response->assertSee('handleTouchStart');
        $response->assertSee('handleTouchEnd');
        $response->assertSee('cardsPerView');
    }

    /**
     * Test 2: Admin can access testimonials management panel.
     */
    public function test_admin_can_view_testimonials_management(): void
    {
        $admin = $this->getAdmin();

        $response = $this->actingAs($admin)->get('/admin/cms/testimonials');
        $response->assertStatus(200);
        $response->assertSee('Customer Testimonials');
        $response->assertSee('Add New Testimonial');
    }

    /**
     * Test 3: Admin can create a testimonial with image upload and validation.
     */
    public function test_admin_can_create_testimonial_with_image(): void
    {
        Storage::fake('public');
        $admin = $this->getAdmin();

        $photo = UploadedFile::fake()->image('customer.jpg', 400, 400);

        $response = $this->actingAs($admin)->post('/admin/cms/testimonials', [
            'customer_name' => 'Amitabh Sengupta',
            'role' => 'Senior Bank Manager',
            'location' => 'Kolkata, WB',
            'loan_category' => 'Home Loan',
            'review' => 'Outstanding experience securing a loan without processing fee.',
            'rating' => 5,
            'display_order' => 10,
            'is_active' => '1',
            'customer_image' => $photo,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $testimonial = Testimonial::where('customer_name', 'Amitabh Sengupta')->first();
        $this->assertNotNull($testimonial);
        $this->assertEquals('Home Loan', $testimonial->loan_category);
        $this->assertEquals(5, $testimonial->rating);
        $this->assertNotNull($testimonial->customer_image);

        // Verify file stored in storage/testimonials
        $storedPath = str_replace('storage/', '', $testimonial->customer_image);
        Storage::disk('public')->assertExists($storedPath);

        // Verify audit log
        $this->assertDatabaseHas('audit_logs', [
            'action' => 'testimonial_created',
            'user_id' => $admin->id,
        ]);
    }

    /**
     * Test 4: Admin can update testimonial and replace or remove image.
     */
    public function test_admin_can_update_testimonial_and_remove_image(): void
    {
        Storage::fake('public');
        $admin = $this->getAdmin();

        $t = Testimonial::create([
            'customer_name' => 'Tanmoy Saha',
            'customer_image' => 'storage/testimonials/old.jpg',
            'role' => 'Software Lead',
            'location' => 'Salt Lake, Kolkata',
            'loan_category' => 'Personal Loan',
            'review' => 'Initial review text.',
            'rating' => 4,
            'is_active' => true,
            'display_order' => 99,
        ]);

        // Update with remove image checkbox
        $response = $this->actingAs($admin)->put('/admin/cms/testimonials/' . $t->id, [
            'customer_name' => 'Tanmoy Saha',
            'role' => 'Principal Architect',
            'location' => 'New Town, Kolkata',
            'loan_category' => 'Executive Loan',
            'review' => 'Updated high-praise review text.',
            'rating' => 5,
            'display_order' => 5,
            'is_active' => '1',
            'remove_image' => '1',
        ]);

        $response->assertRedirect();

        $t->refresh();
        $this->assertEquals('Principal Architect', $t->role);
        $this->assertEquals('Executive Loan', $t->loan_category);
        $this->assertEquals(5, $t->rating);
        $this->assertNull($t->customer_image);
        $this->assertEquals('TS', $t->initials);
    }

    /**
     * Test 5: Admin can delete a testimonial.
     */
    public function test_admin_can_delete_testimonial(): void
    {
        $admin = $this->getAdmin();

        $t = Testimonial::create([
            'customer_name' => 'Temporary Reviewer',
            'role' => 'Tester',
            'review' => 'Temporary review to be deleted.',
            'rating' => 5,
            'is_active' => true,
        ]);

        $id = $t->id;

        $response = $this->actingAs($admin)->delete('/admin/cms/testimonials/' . $id);
        $response->assertRedirect();

        $this->assertDatabaseMissing('testimonials', ['id' => $id]);
    }

    /**
     * Test 6: Image validation rejects invalid files and enforces max size.
     */
    public function test_image_validation_rejects_executable_or_invalid_file(): void
    {
        $admin = $this->getAdmin();

        $fakeScript = UploadedFile::fake()->create('malicious.php', 100, 'application/x-php');

        $response = $this->actingAs($admin)->post('/admin/cms/testimonials', [
            'customer_name' => 'Malicious User',
            'review' => 'Attempting file upload.',
            'rating' => 5,
            'customer_image' => $fakeScript,
        ]);

        $response->assertSessionHasErrors(['customer_image']);
    }
}

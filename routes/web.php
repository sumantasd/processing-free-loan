<?php

use App\Http\Controllers\Admin\AdminAuditController;
use App\Http\Controllers\Admin\AdminCmsController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFollowupController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserFollowupController;
use App\Http\Controllers\User\UserLeadController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. PUBLIC WEBSITE ROUTES (PRESERVED)
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Inner Loan Product Pages
Route::get('/personal-loan', [LoanController::class, 'personalLoan'])->name('loans.personal');
Route::get('/business-loan', [LoanController::class, 'businessLoan'])->name('loans.business');
Route::get('/new-car-loan', [LoanController::class, 'newCarLoan'])->name('loans.new-car');
Route::get('/used-car-loan', [LoanController::class, 'usedCarLoan'])->name('loans.used-car');
Route::get('/doctor-loan', [LoanController::class, 'doctorLoan'])->name('loans.doctor');
Route::get('/ca-loan', [LoanController::class, 'caLoan'])->name('loans.ca');

// Banking & NBFC Partners
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
Route::get('/partners/{slug}', [PartnerController::class, 'show'])->name('partners.show');

// Content & Company Pages
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');

// Articles & Guides
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Legal Pages
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('legal.privacy');
Route::get('/terms-conditions', [PageController::class, 'terms'])->name('legal.terms');
Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('legal.disclaimer');

// Public Lead Submission Endpoint
Route::post('/apply', [LeadController::class, 'store'])->name('leads.store');

// ==========================================
// 2. AUTHENTICATION ROUTES
// ==========================================
// Dedicated Admin Authentication
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.submit');
Route::match(['get', 'post'], '/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

// Dedicated Employee / User Authentication
Route::get('/user/login', [AuthController::class, 'showUserLogin'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'userLogin'])->name('user.login.submit');
Route::match(['get', 'post'], '/user/logout', [AuthController::class, 'userLogout'])->name('user.logout');

// General / Compatible Fallback Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// 3. ADMIN PORTAL ROUTES (/admin)
// ==========================================
Route::prefix('admin')->middleware(['admin'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Lead Management & Allocation
    Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/create', [AdminLeadController::class, 'create'])->name('leads.create');
    Route::post('/leads', [AdminLeadController::class, 'store'])->name('leads.store');
    Route::get('/leads/export', [AdminLeadController::class, 'export'])->name('leads.export');
    Route::get('/leads/{id}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::post('/leads/allocate', [AdminLeadController::class, 'allocate'])->name('leads.allocate');
    Route::post('/leads/{id}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');
    Route::post('/leads/{id}/notes', [AdminLeadController::class, 'addNote'])->name('leads.note');
    Route::post('/leads/{id}/followup', [AdminLeadController::class, 'addFollowup'])->name('leads.followup');

    // User & Employee Management
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [AdminUserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
    Route::post('/users/{id}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('users.toggle-status');
    Route::post('/users/{id}/reset-password', [AdminUserController::class, 'resetPassword'])->name('users.reset-password');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Follow-ups
    Route::get('/followups', [AdminFollowupController::class, 'index'])->name('followups.index');

    // Audit Logs
    Route::get('/audit-logs', [AdminAuditController::class, 'index'])->name('audit-logs.index');

    // Dynamic Website CMS
    Route::prefix('cms')->name('cms.')->group(function () {
        // Homepage
        Route::get('/homepage', [AdminCmsController::class, 'homepage'])->name('homepage');
        Route::post('/homepage/sections/{id}', [AdminCmsController::class, 'updateHomepageSection'])->name('homepage.update');

        // Header & Footer
        Route::get('/header-footer', [AdminCmsController::class, 'headerFooter'])->name('header-footer');
        Route::post('/header-footer', [AdminCmsController::class, 'updateHeaderFooter'])->name('header-footer.update');

        // Pages
        Route::get('/pages', [AdminCmsController::class, 'pages'])->name('pages');
        Route::get('/pages/{id}/edit', [AdminCmsController::class, 'editPage'])->name('pages.edit');
        Route::put('/pages/{id}', [AdminCmsController::class, 'updatePage'])->name('pages.update');

        // Loan Products
        Route::get('/products', [AdminCmsController::class, 'loanProducts'])->name('products');
        Route::get('/products/{id}/edit', [AdminCmsController::class, 'editLoanProduct'])->name('products.edit');
        Route::put('/products/{id}', [AdminCmsController::class, 'updateLoanProduct'])->name('products.update');

        // Lenders
        Route::get('/lenders', [AdminCmsController::class, 'lenders'])->name('lenders');
        Route::get('/lenders/{id}/edit', [AdminCmsController::class, 'editLender'])->name('lenders.edit');
        Route::put('/lenders/{id}', [AdminCmsController::class, 'updateLender'])->name('lenders.update');

        // Blogs
        Route::get('/blogs', [AdminCmsController::class, 'blogs'])->name('blogs');
        Route::get('/blogs/{id}/edit', [AdminCmsController::class, 'editBlog'])->name('blogs.edit');
        Route::put('/blogs/{id}', [AdminCmsController::class, 'updateBlog'])->name('blogs.update');

        // FAQs
        Route::get('/faqs', [AdminCmsController::class, 'faqs'])->name('faqs');
        Route::post('/faqs', [AdminCmsController::class, 'storeFaq'])->name('faqs.store');
        Route::put('/faqs/{id}', [AdminCmsController::class, 'updateFaq'])->name('faqs.update');
        Route::delete('/faqs/{id}', [AdminCmsController::class, 'destroyFaq'])->name('faqs.destroy');

        // Testimonials
        Route::get('/testimonials', [AdminCmsController::class, 'testimonials'])->name('testimonials');
        Route::post('/testimonials', [AdminCmsController::class, 'storeTestimonial'])->name('testimonials.store');
        Route::put('/testimonials/{id}', [AdminCmsController::class, 'updateTestimonial'])->name('testimonials.update');
        Route::delete('/testimonials/{id}', [AdminCmsController::class, 'destroyTestimonial'])->name('testimonials.destroy');

        // Media Library
        Route::get('/media', [AdminCmsController::class, 'media'])->name('media');
        Route::post('/media', [AdminCmsController::class, 'uploadMedia'])->name('media.upload');
    });
});

// ==========================================
// 4. USER WORKSPACE ROUTES (/user)
// ==========================================
Route::prefix('user')->middleware(['user'])->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // My Leads
    Route::get('/my-leads', [UserLeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/{id}', [UserLeadController::class, 'show'])->name('leads.show');
    Route::post('/leads/{id}/status', [UserLeadController::class, 'updateStatus'])->name('leads.status');
    Route::post('/leads/{id}/notes', [UserLeadController::class, 'addNote'])->name('leads.note');
    Route::post('/leads/{id}/followup', [UserLeadController::class, 'scheduleFollowup'])->name('leads.followup');

    // Follow-ups
    Route::get('/followups', [UserFollowupController::class, 'index'])->name('followups.index');
    Route::post('/followups/{id}/complete', [UserFollowupController::class, 'complete'])->name('followups.complete');

    // Profile & Password
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('profile.password');
});

<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

// Homepage (17 Sections)
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

// Lead Submission Endpoint
Route::post('/apply', [LeadController::class, 'store'])->name('leads.store');

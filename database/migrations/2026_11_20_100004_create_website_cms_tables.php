<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Website Settings (Header, Footer, Brand, Contact, General)
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('group', 50); // general, brand, header, footer, contact, seo
            $table->string('key', 80)->unique();
            $table->longText('value')->nullable();
            $table->string('label', 120)->nullable();
            $table->string('type', 30)->default('text'); // text, textarea, json, boolean, image
            $table->timestamps();
        });

        // 2. Homepage Sections
        Schema::create('homepage_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key', 60)->unique(); // hero, quick_form, products, partners, how_it_works, emi_calculator, why_choose, eligibility_docs, stats, testimonials, expert_assistance, articles, faq, final_cta
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('badge')->nullable();
            $table->json('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 3. Website Pages
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->unique(); // home, about, contact, privacy, terms, disclaimer
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 4. Loan Products CMS
        Schema::create('loan_products', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 80)->unique();
            $table->string('title');
            $table->string('tagline')->nullable();
            $table->string('badge')->nullable();
            $table->string('icon')->nullable();
            $table->string('color', 40)->nullable();
            $table->string('bg_gradient')->nullable();
            $table->string('amount_range')->nullable();
            $table->decimal('min_amount', 14, 2)->default(0);
            $table->decimal('max_amount', 14, 2)->default(0);
            $table->string('interest_rate')->nullable();
            $table->string('tenure')->nullable();
            $table->string('processing_fee')->nullable();
            $table->text('description')->nullable();
            $table->json('key_benefits')->nullable();
            $table->json('eligibility')->nullable();
            $table->json('documents')->nullable();
            $table->json('suitable_lenders')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 5. Banks & NBFC Lenders CMS
        Schema::create('lenders', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 80)->unique();
            $table->string('name');
            $table->string('type', 20)->default('Bank'); // Bank / NBFC
            $table->string('logo')->nullable();
            $table->decimal('rating', 3, 1)->default(4.8);
            $table->string('approval_speed')->nullable();
            $table->string('min_interest')->nullable();
            $table->string('max_tenure')->nullable();
            $table->string('processing_fee_waiver')->nullable();
            $table->json('features')->nullable();
            $table->text('description')->nullable();
            $table->json('products')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 6. Blog Posts
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 120)->unique();
            $table->string('title');
            $table->string('category', 80)->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('author', 100)->default('Processing Free Loan Editorial');
            $table->string('read_time', 30)->default('4 min read');
            $table->json('tags')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });

        // 7. FAQs
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('category', 50)->default('General');
            $table->boolean('is_active')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 8. Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_image')->nullable();
            $table->string('role', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->text('review');
            $table->integer('rating')->default(5);
            $table->boolean('is_verified')->default(true);
            $table->boolean('is_active')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 9. Centralized Media Library
        Schema::create('media_library', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('original_name');
            $table->string('file_path');
            $table->string('url');
            $table->string('mime_type', 80);
            $table->unsignedBigInteger('file_size');
            $table->string('alt_text')->nullable();
            $table->string('category', 50)->default('general');
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_library');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('lenders');
        Schema::dropIfExists('loan_products');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('homepage_sections');
        Schema::dropIfExists('website_settings');
    }
};

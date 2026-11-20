<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\HomepageSection;
use App\Models\Lender;
use App\Models\LoanProduct;
use App\Models\MediaLibrary;
use App\Models\Page;
use App\Models\Testimonial;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCmsController extends Controller
{
    // ==========================================
    // 1. HOMEPAGE SECTIONS
    // ==========================================
    public function homepage()
    {
        $sections = HomepageSection::orderBy('display_order')->get();
        return view('admin.cms.homepage', compact('sections'));
    }

    public function updateHomepageSection(Request $request, $id)
    {
        $section = HomepageSection::findOrFail($id);
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'badge' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $section->update($validated);

        Cache::forget("homepage_section_{$section->section_key}");
        AuditLog::log('homepage_section_updated', 'cms', 'homepage_sections', $section->id, ['key' => $section->section_key]);

        return back()->with('success', "Section '{$section->section_key}' updated successfully.");
    }

    // ==========================================
    // 2. HEADER & FOOTER SETTINGS
    // ==========================================
    public function headerFooter()
    {
        $settings = WebsiteSetting::whereIn('group', ['header', 'footer', 'brand', 'contact'])->get()->groupBy('group');
        return view('admin.cms.header-footer', compact('settings'));
    }

    public function updateHeaderFooter(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? json_encode($value) : $value]
            );
            Cache::forget("setting_{$key}");
        }

        AuditLog::log('website_settings_updated', 'cms', 'website_settings');

        return back()->with('success', 'Header, Footer and Brand settings saved successfully.');
    }

    // ==========================================
    // 3. PAGES MANAGEMENT
    // ==========================================
    public function pages()
    {
        $pages = Page::orderBy('display_order')->get();
        return view('admin.cms.pages', compact('pages'));
    }

    public function editPage($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.cms.page-edit', compact('page'));
    }

    public function updatePage(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $page->update($validated);

        AuditLog::log('page_updated', 'cms', 'pages', $page->id, ['slug' => $page->slug]);

        return redirect()->route('admin.cms.pages')->with('success', "Page '{$page->title}' updated successfully.");
    }

    // ==========================================
    // 4. LOAN PRODUCTS CMS
    // ==========================================
    public function loanProducts()
    {
        $products = LoanProduct::orderBy('display_order')->get();
        return view('admin.cms.loan-products', compact('products'));
    }

    public function editLoanProduct($id)
    {
        $product = LoanProduct::findOrFail($id);
        return view('admin.cms.loan-product-edit', compact('product'));
    }

    public function updateLoanProduct(Request $request, $id)
    {
        $product = LoanProduct::findOrFail($id);
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'interest_rate' => ['nullable', 'string', 'max:100'],
            'amount_range' => ['nullable', 'string', 'max:100'],
            'min_amount' => ['nullable', 'numeric'],
            'max_amount' => ['nullable', 'numeric'],
            'tenure' => ['nullable', 'string', 'max:100'],
            'processing_fee' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $product->update($validated);

        AuditLog::log('loan_product_updated', 'cms', 'loan_products', $product->id, ['slug' => $product->slug]);

        return redirect()->route('admin.cms.products')->with('success', "Loan Product '{$product->title}' updated.");
    }

    // ==========================================
    // 5. BANKS & NBFCS LENDERS CMS
    // ==========================================
    public function lenders()
    {
        $lenders = Lender::orderBy('display_order')->get();
        return view('admin.cms.lenders', compact('lenders'));
    }

    public function editLender($id)
    {
        $lender = Lender::findOrFail($id);
        return view('admin.cms.lender-edit', compact('lender'));
    }

    public function updateLender(Request $request, $id)
    {
        $lender = Lender::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'type' => ['required', 'in:Bank,NBFC'],
            'rating' => ['nullable', 'numeric', 'min:1', 'max:5'],
            'approval_speed' => ['nullable', 'string'],
            'min_interest' => ['nullable', 'string'],
            'max_tenure' => ['nullable', 'string'],
            'processing_fee_waiver' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $lender->update($validated);

        AuditLog::log('lender_updated', 'cms', 'lenders', $lender->id, ['name' => $lender->name]);

        return redirect()->route('admin.cms.lenders')->with('success', "Lender '{$lender->name}' updated.");
    }

    // ==========================================
    // 6. BLOG POSTS CMS
    // ==========================================
    public function blogs()
    {
        $blogs = BlogPost::latest()->paginate(15);
        return view('admin.cms.blogs', compact('blogs'));
    }

    public function editBlog($id)
    {
        $blog = BlogPost::findOrFail($id);
        return view('admin.cms.blog-edit', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = BlogPost::findOrFail($id);
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $blog->update($validated);

        AuditLog::log('blog_updated', 'cms', 'blog_posts', $blog->id, ['title' => $blog->title]);

        return redirect()->route('admin.cms.blogs')->with('success', "Article '{$blog->title}' updated.");
    }

    // ==========================================
    // 7. FAQS CMS
    // ==========================================
    public function faqs()
    {
        $faqs = Faq::orderBy('display_order')->get();
        return view('admin.cms.faqs', compact('faqs'));
    }

    public function storeFaq(Request $request)
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:80'],
        ]);

        $validated['is_active'] = true;
        $validated['display_order'] = Faq::max('display_order') + 1;
        Faq::create($validated);

        AuditLog::log('faq_created', 'cms', 'faqs');

        return back()->with('success', 'FAQ added successfully.');
    }

    public function updateFaq(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:80'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $faq->update($validated);

        AuditLog::log('faq_updated', 'cms', 'faqs', $faq->id);

        return back()->with('success', 'FAQ updated.');
    }

    public function destroyFaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        AuditLog::log('faq_deleted', 'cms', 'faqs', $id);
        return back()->with('success', 'FAQ deleted.');
    }

    // ==========================================
    // 8. TESTIMONIALS CMS
    // ==========================================
    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('display_order')->get();
        return view('admin.cms.testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'role' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:100'],
            'loan_category' => ['nullable', 'string', 'max:100'],
            'review' => ['required', 'string', 'max:2000'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
            'is_verified' => ['nullable'],
            'customer_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        if ($request->hasFile('customer_image')) {
            $file = $request->file('customer_image');
            $filename = 'testimonial_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('testimonials', $filename, 'public');
            $validated['customer_image'] = 'storage/' . $path;
        }

        $validated['is_verified'] = $request->has('is_verified') ? $request->boolean('is_verified') : true;
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;
        $validated['display_order'] = $request->filled('display_order') ? (int) $request->display_order : ((Testimonial::max('display_order') ?? 0) + 1);
        
        $testimonial = Testimonial::create($validated);

        AuditLog::log('testimonial_created', 'cms', 'testimonials', $testimonial->id);

        return back()->with('success', 'Customer testimonial added successfully.');
    }

    public function updateTestimonial(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'role' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:100'],
            'loan_category' => ['nullable', 'string', 'max:100'],
            'review' => ['required', 'string', 'max:2000'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
            'is_verified' => ['nullable'],
            'remove_image' => ['nullable', 'boolean'],
            'customer_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        // Remove old image if requested
        if ($request->boolean('remove_image')) {
            if ($testimonial->customer_image && str_starts_with($testimonial->customer_image, 'storage/testimonials/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $testimonial->customer_image));
            }
            $validated['customer_image'] = null;
        }

        // Upload replacement image
        if ($request->hasFile('customer_image')) {
            if ($testimonial->customer_image && str_starts_with($testimonial->customer_image, 'storage/testimonials/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $testimonial->customer_image));
            }
            $file = $request->file('customer_image');
            $filename = 'testimonial_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('testimonials', $filename, 'public');
            $validated['customer_image'] = 'storage/' . $path;
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_verified'] = $request->boolean('is_verified');
        if ($request->filled('display_order')) {
            $validated['display_order'] = (int) $request->display_order;
        }

        $testimonial->update($validated);

        AuditLog::log('testimonial_updated', 'cms', 'testimonials', $testimonial->id);

        return back()->with('success', 'Customer testimonial updated successfully.');
    }

    public function destroyTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->customer_image && str_starts_with($testimonial->customer_image, 'storage/testimonials/')) {
            Storage::disk('public')->delete(str_replace('storage/', '', $testimonial->customer_image));
        }
        $testimonial->delete();
        AuditLog::log('testimonial_deleted', 'cms', 'testimonials', $id);
        return back()->with('success', 'Customer testimonial deleted successfully.');
    }

    // ==========================================
    // 9. CENTRALIZED MEDIA LIBRARY
    // ==========================================
    public function media()
    {
        $media = MediaLibrary::latest()->paginate(24);
        return view('admin.cms.media', compact('media'));
    }

    public function uploadMedia(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,svg,pdf', 'max:10240'], // 10MB limit, no executables
            'category' => ['nullable', 'string', 'max:50'],
            'alt_text' => ['nullable', 'string', 'max:200'],
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $ext;
        
        $path = $file->storeAs('uploads/media', $filename, 'public');

        $media = MediaLibrary::create([
            'filename' => $filename,
            'original_name' => $originalName,
            'file_path' => $path,
            'url' => '/storage/' . $path,
            'mime_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'alt_text' => $request->alt_text ?: $originalName,
            'category' => $request->category ?: 'general',
            'uploaded_by' => auth()->id(),
        ]);

        AuditLog::log('media_uploaded', 'cms', 'media_library', $media->id, ['filename' => $filename]);

        return back()->with('success', "File {$originalName} uploaded successfully.");
    }
}

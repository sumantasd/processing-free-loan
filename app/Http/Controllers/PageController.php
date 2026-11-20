<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\FintechDataService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $brand = FintechDataService::getBrandConfig();
        $stats = FintechDataService::getStats();
        $whyChoose = FintechDataService::getWhyChooseUs();
        $lenders = FintechDataService::getAllLenders();

        return view('frontend.pages.about', compact('brand', 'stats', 'whyChoose', 'lenders'));
    }

    public function contact()
    {
        $brand = FintechDataService::getBrandConfig();
        $products = FintechDataService::getLoanProducts();

        return view('frontend.pages.contact', compact('brand', 'products'));
    }

    public function privacy()
    {
        $brand = FintechDataService::getBrandConfig();
        $dbPage = Page::where('slug', 'privacy-policy')->first();
        return view('frontend.pages.legal', [
            'brand' => $brand,
            'title' => $dbPage?->title ?? 'Privacy Policy',
            'type' => 'privacy',
            'custom_content' => $dbPage?->content,
            'updated_at' => $dbPage?->updated_at ? $dbPage->updated_at->format('F d, Y') : 'January 15, 2025'
        ]);
    }

    public function terms()
    {
        $brand = FintechDataService::getBrandConfig();
        $dbPage = Page::where('slug', 'terms-and-conditions')->first();
        return view('frontend.pages.legal', [
            'brand' => $brand,
            'title' => $dbPage?->title ?? 'Terms and Conditions',
            'type' => 'terms',
            'custom_content' => $dbPage?->content,
            'updated_at' => $dbPage?->updated_at ? $dbPage->updated_at->format('F d, Y') : 'January 15, 2025'
        ]);
    }

    public function disclaimer()
    {
        $brand = FintechDataService::getBrandConfig();
        $dbPage = Page::where('slug', 'disclaimer')->first();
        return view('frontend.pages.legal', [
            'brand' => $brand,
            'title' => $dbPage?->title ?? 'Financial Services Disclaimer',
            'type' => 'disclaimer',
            'custom_content' => $dbPage?->content,
            'updated_at' => $dbPage?->updated_at ? $dbPage->updated_at->format('F d, Y') : 'January 15, 2025'
        ]);
    }
}

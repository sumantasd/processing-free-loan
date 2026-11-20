<?php

namespace App\Http\Controllers;

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
        return view('frontend.pages.legal', [
            'brand' => $brand,
            'title' => 'Privacy Policy',
            'type' => 'privacy',
            'updated_at' => 'January 15, 2025'
        ]);
    }

    public function terms()
    {
        $brand = FintechDataService::getBrandConfig();
        return view('frontend.pages.legal', [
            'brand' => $brand,
            'title' => 'Terms and Conditions',
            'type' => 'terms',
            'updated_at' => 'January 15, 2025'
        ]);
    }

    public function disclaimer()
    {
        $brand = FintechDataService::getBrandConfig();
        return view('frontend.pages.legal', [
            'brand' => $brand,
            'title' => 'Financial Services Disclaimer',
            'type' => 'disclaimer',
            'updated_at' => 'January 15, 2025'
        ]);
    }
}

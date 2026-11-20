<?php

namespace App\Http\Controllers;

use App\Services\FintechDataService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brand = FintechDataService::getBrandConfig();
        $products = FintechDataService::getLoanProducts();
        $lenders = FintechDataService::getAllLenders();
        $stats = FintechDataService::getStats();
        $whyChoose = FintechDataService::getWhyChooseUs();
        $howItWorks = FintechDataService::getHowItWorks();
        $testimonials = FintechDataService::getTestimonials();
        $faqs = FintechDataService::getFaqs();
        $articles = FintechDataService::getArticles();

        return view('frontend.pages.home', compact(
            'brand',
            'products',
            'lenders',
            'stats',
            'whyChoose',
            'howItWorks',
            'testimonials',
            'faqs',
            'articles'
        ));
    }
}

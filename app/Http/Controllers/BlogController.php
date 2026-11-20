<?php

namespace App\Http\Controllers;

use App\Services\FintechDataService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = FintechDataService::getArticles();
        $brand = FintechDataService::getBrandConfig();
        $products = FintechDataService::getLoanProducts();

        return view('frontend.pages.blog-list', compact('articles', 'brand', 'products'));
    }

    public function show(string $slug)
    {
        $article = FintechDataService::getArticleBySlug($slug);
        if (!$article) {
            abort(404);
        }

        $allArticles = FintechDataService::getArticles();
        $relatedArticles = array_filter($allArticles, fn($a) => $a['slug'] !== $slug);
        $brand = FintechDataService::getBrandConfig();
        $products = FintechDataService::getLoanProducts();

        return view('frontend.pages.blog-detail', compact('article', 'relatedArticles', 'brand', 'products'));
    }
}

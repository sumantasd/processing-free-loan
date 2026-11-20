<?php

namespace App\Http\Controllers;

use App\Services\FintechDataService;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $allLenders = FintechDataService::getAllLenders();
        $brand = FintechDataService::getBrandConfig();
        $products = FintechDataService::getLoanProducts();

        $selectedType = $request->query('type'); // 'Bank', 'NBFC', or null
        $selectedProduct = $request->query('product');

        $lenders = array_filter($allLenders, function ($lender) use ($selectedType, $selectedProduct) {
            if ($selectedType && strtolower($lender['type']) !== strtolower($selectedType)) {
                return false;
            }
            if ($selectedProduct) {
                $hasProd = false;
                foreach ($lender['products'] as $p) {
                    if (stripos($p, $selectedProduct) !== false) {
                        $hasProd = true;
                        break;
                    }
                }
                if (!$hasProd) return false;
            }
            return true;
        });

        $banks = array_filter($allLenders, fn($l) => $l['type'] === 'Bank');
        $nbfcs = array_filter($allLenders, fn($l) => $l['type'] === 'NBFC');

        return view('frontend.pages.partners', compact('lenders', 'banks', 'nbfcs', 'brand', 'products', 'selectedType', 'selectedProduct'));
    }

    public function show(string $slug)
    {
        $lender = FintechDataService::getLenderBySlug($slug);
        if (!$lender) {
            abort(404);
        }

        $allLenders = FintechDataService::getAllLenders();
        $relatedLenders = array_slice(array_filter($allLenders, fn($l) => $l['slug'] !== $slug && $l['type'] === $l['type']), 0, 3);
        $products = FintechDataService::getLoanProducts();
        $brand = FintechDataService::getBrandConfig();
        $faqs = FintechDataService::getFaqs();

        return view('frontend.pages.partner-detail', compact('lender', 'relatedLenders', 'products', 'brand', 'faqs'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\FintechDataService;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    private function showProduct(string $slug)
    {
        $products = FintechDataService::getLoanProducts();
        if (!isset($products[$slug])) {
            abort(404);
        }

        $product = $products[$slug];
        $allProducts = $products;
        $allLenders = FintechDataService::getAllLenders();
        $brand = FintechDataService::getBrandConfig();
        $faqs = FintechDataService::getFaqs();

        // Filter lenders matching this product
        $matchingLenders = array_filter($allLenders, function ($lender) use ($product) {
            foreach ($lender['products'] as $prodName) {
                if (stripos($product['title'], 'car') !== false && stripos($prodName, 'car') !== false) {
                    if (stripos($product['title'], 'new') !== false && stripos($prodName, 'new') !== false) return true;
                    if (stripos($product['title'], 'used') !== false && stripos($prodName, 'used') !== false) return true;
                } elseif (stripos($product['title'], 'doctor') !== false || stripos($product['title'], 'ca') !== false) {
                    if (stripos($prodName, 'doctor') !== false || stripos($prodName, 'ca') !== false) return true;
                } elseif (stripos($product['title'], 'business') !== false && stripos($prodName, 'business') !== false) {
                    return true;
                } elseif (stripos($product['title'], 'personal') !== false && stripos($prodName, 'personal') !== false) {
                    return true;
                }
            }
            return false;
        });

        return view('frontend.pages.loan-detail', compact('product', 'allProducts', 'matchingLenders', 'brand', 'faqs'));
    }

    public function personalLoan()
    {
        return $this->showProduct('personal-loan');
    }

    public function businessLoan()
    {
        return $this->showProduct('business-loan');
    }

    public function newCarLoan()
    {
        return $this->showProduct('new-car-loan');
    }

    public function usedCarLoan()
    {
        return $this->showProduct('used-car-loan');
    }

    public function doctorLoan()
    {
        return $this->showProduct('doctor-loan');
    }

    public function caLoan()
    {
        return $this->showProduct('ca-loan');
    }
}

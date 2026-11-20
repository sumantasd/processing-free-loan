@extends('admin.layouts.app')

@section('title', 'Loan Products CMS')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Loan Products CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage interest rates, tenure limits, amounts, and zero-processing fee promo banners for all 6 loan offerings</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $prod)
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $prod->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                        {{ $prod->is_published ? 'Active' : 'Hidden' }}
                    </span>
                    <span class="text-xs font-semibold text-slate-400 font-mono">/loans/{{ $prod->slug }}</span>
                </div>
                <h3 class="text-base font-bold text-[#062B59]">{{ $prod->title }}</h3>
                <p class="text-xs text-slate-500 mt-1">{{ $prod->tagline }}</p>

                <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 text-xs">
                    <div class="flex justify-between">
                        <span class="text-slate-400">Interest Rate:</span>
                        <span class="font-bold text-[#0866E8]">{{ $prod->interest_rate }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Amount:</span>
                        <span class="font-semibold text-slate-700">{{ $prod->amount_range }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Tenure:</span>
                        <span class="font-semibold text-slate-700">{{ $prod->tenure }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Processing Fee:</span>
                        <span class="font-bold text-emerald-600">{{ $prod->processing_fee }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-3 border-t border-slate-100 flex items-center justify-between">
                <a href="/loans/{{ $prod->slug }}" target="_blank" class="text-xs font-semibold text-slate-400 hover:text-slate-600">Preview</a>
                <a href="{{ route('admin.cms.products.edit', $prod->id) }}" class="px-3.5 py-1.5 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-lg transition">
                    Edit Product
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

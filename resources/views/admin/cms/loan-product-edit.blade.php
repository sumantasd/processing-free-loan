@extends('admin.layouts.app')

@section('title', 'Edit Loan Product - ' . $product->title)

@section('content')
<div class="space-y-6 max-w-4xl">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Edit Product: {{ $product->title }}</h1>
            <p class="text-xs text-slate-500 mt-1">Configure interest rates, ticket sizes, and promotional terms</p>
        </div>
        <a href="{{ route('admin.cms.products') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition">
            Back to Products
        </a>
    </div>

    <form action="{{ route('admin.cms.products.update', $product->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Product Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $product->title) }}" required class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tagline / Subtitle</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $product->tagline) }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Interest Rate Display</label>
                    <input type="text" name="interest_rate" value="{{ old('interest_rate', $product->interest_rate) }}" placeholder="e.g. Starting @ 10.49% p.a." class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Amount Range Display</label>
                    <input type="text" name="amount_range" value="{{ old('amount_range', $product->amount_range) }}" placeholder="e.g. ₹50,000 to ₹50 Lakhs" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tenure Display</label>
                    <input type="text" name="tenure" value="{{ old('tenure', $product->tenure) }}" placeholder="e.g. 12 to 72 Months" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Min Loan Amount (₹)</label>
                    <input type="number" name="min_amount" value="{{ old('min_amount', $product->min_amount) }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Max Loan Amount (₹)</label>
                    <input type="number" name="max_amount" value="{{ old('max_amount', $product->max_amount) }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Processing Fee Offer</label>
                    <input type="text" name="processing_fee" value="{{ old('processing_fee', $product->processing_fee) }}" placeholder="Zero Processing Fee Offers Available*" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Full Description</label>
                <textarea name="description" rows="5" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ $product->is_published ? 'checked' : '' }} class="w-4 h-4 text-[#0866E8] rounded border-slate-300 focus:ring-[#0866E8]">
                    <span class="text-xs font-bold text-slate-700">Display this loan product on the live website</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.cms.products') }}" class="px-5 py-2.5 bg-slate-100 text-slate-600 text-xs font-bold rounded-xl hover:bg-slate-200 transition">Cancel</a>
            <button type="submit" class="px-6 py-2.5 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl shadow-md transition">Update Loan Product</button>
        </div>
    </form>
</div>
@endsection

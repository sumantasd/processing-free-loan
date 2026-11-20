@extends('admin.layouts.app')

@section('title', 'Edit Lender - ' . $lender->name)

@section('content')
<div class="space-y-6 max-w-4xl">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Edit Lender: {{ $lender->name }}</h1>
            <p class="text-xs text-slate-500 mt-1">Configure Bank / NBFC partner rates and promotional terms</p>
        </div>
        <a href="{{ route('admin.cms.lenders') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition">
            Back to Lenders
        </a>
    </div>

    <form action="{{ route('admin.cms.lenders.update', $lender->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Partner Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $lender->name) }}" required class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Institution Type <span class="text-red-500">*</span></label>
                    <select name="type" required class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                        <option value="Bank" {{ $lender->type === 'Bank' ? 'selected' : '' }}>Commercial Bank</option>
                        <option value="NBFC" {{ $lender->type === 'NBFC' ? 'selected' : '' }}>NBFC (Non-Banking Financial Company)</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Starting Interest Rate</label>
                    <input type="text" name="min_interest" value="{{ old('min_interest', $lender->min_interest) }}" placeholder="10.49% p.a." class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Approval Speed</label>
                    <input type="text" name="approval_speed" value="{{ old('approval_speed', $lender->approval_speed) }}" placeholder="24 - 48 Hours" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Rating (1 to 5)</label>
                    <input type="number" step="0.1" min="1" max="5" name="rating" value="{{ old('rating', $lender->rating) }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Max Tenure</label>
                    <input type="text" name="max_tenure" value="{{ old('max_tenure', $lender->max_tenure) }}" placeholder="Up to 7 Years" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Processing Fee Waiver Promotion</label>
                    <input type="text" name="processing_fee_waiver" value="{{ old('processing_fee_waiver', $lender->processing_fee_waiver) }}" placeholder="Zero Processing Fee on Selected Schemes" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Description / Notes</label>
                <textarea name="description" rows="3" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">{{ old('description', $lender->description) }}</textarea>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ $lender->is_published ? 'checked' : '' }} class="w-4 h-4 text-[#0866E8] rounded border-slate-300 focus:ring-[#0866E8]">
                    <span class="text-xs font-bold text-slate-700">Display partner on live website & comparison table</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.cms.lenders') }}" class="px-5 py-2.5 bg-slate-100 text-slate-600 text-xs font-bold rounded-xl hover:bg-slate-200 transition">Cancel</a>
            <button type="submit" class="px-6 py-2.5 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl shadow-md transition">Update Partner</button>
        </div>
    </form>
</div>
@endsection

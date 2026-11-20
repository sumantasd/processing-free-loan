@extends('admin.layouts.app')

@section('title', 'Header, Footer & Brand Settings')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Header & Footer Global Settings</h1>
            <p class="text-xs text-slate-500 mt-1">Manage global brand identity, support contact details, developer credits, and footer disclaimers</p>
        </div>
    </div>

    @php
        $settingsFlat = \App\Models\WebsiteSetting::pluck('value', 'key')->toArray();
    @endphp

    <form action="{{ route('admin.cms.header-footer.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- 1. Brand Identity -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <h2 class="text-base font-bold text-[#062B59] mb-4 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                Official Brand & Company Identity
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Brand Name</label>
                    <input type="text" name="brand_name" value="{{ old('brand_name', $settingsFlat['brand_name'] ?? 'Processing Free Loan') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Official Tagline</label>
                    <input type="text" name="brand_tagline" value="{{ old('brand_tagline', $settingsFlat['brand_tagline'] ?? 'LOAN WITHOUT PROCESSING FEE') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Parent Company Identity</label>
                    <input type="text" name="company_identity" value="{{ old('company_identity', $settingsFlat['company_identity'] ?? 'Unit Of Findeal Financial Private Limited') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Market & Currency</label>
                    <input type="text" value="India (INR ₹)" disabled class="w-full px-3.5 py-2.5 text-xs border border-slate-200 bg-slate-50 text-slate-500 rounded-xl">
                </div>
            </div>
        </div>

        <!-- 2. Header Bar Settings -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <h2 class="text-base font-bold text-[#062B59] mb-4 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                Top Header Bar & Navigation CTA
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Header Support Phone</label>
                    <input type="text" name="header_phone" value="{{ old('header_phone', $settingsFlat['header_phone'] ?? '+91 7074906556') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Header Support Email</label>
                    <input type="email" name="header_email" value="{{ old('header_email', $settingsFlat['header_email'] ?? 'support@processingfreeloan.com') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Apply Button Text</label>
                    <input type="text" name="header_cta_text" value="{{ old('header_cta_text', $settingsFlat['header_cta_text'] ?? 'Apply Now') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Apply Button Destination URL</label>
                    <input type="text" name="header_cta_link" value="{{ old('header_cta_link', $settingsFlat['header_cta_link'] ?? '#lead-form-section') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>
        </div>

        <!-- 3. Registered Office & Footer Content -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <h2 class="text-base font-bold text-[#062B59] mb-4 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-indigo-600"></span>
                Office Address & Footer Disclaimers
            </h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Registered Office Address</label>
                    <textarea name="footer_address" rows="2" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">{{ old('footer_address', $settingsFlat['footer_address'] ?? 'Khata No. 3429, Premer Danga, Near PDB High School, Khattimari, Cooch Behar, West Bengal – 736171, India.') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Google Maps Direct Link</label>
                    <input type="text" name="google_maps_url" value="{{ old('google_maps_url', $settingsFlat['google_maps_url'] ?? 'https://maps.google.com/?q=Premer+Danga+Khattimari+Cooch+Behar+West+Bengal+736171') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Footer Mandatory Disclaimer</label>
                    <textarea name="footer_disclaimer" rows="3" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">{{ old('footer_disclaimer', $settingsFlat['footer_disclaimer'] ?? 'ProcessingFreeLoan.com (Unit Of Findeal Financial Private Limited) is a financial loan aggregator and comparison platform assisting Indian borrowers with loan discovery from RBI-regulated Banks and NBFCs. We are not a direct lender. Processing fee waiver offers are subject to individual lender policies, credit evaluation, and specific promo schemes. Final interest rates and terms are solely determined by the lending institution.') }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Developer Attribution Name</label>
                        <input type="text" name="developer_name" value="{{ old('developer_name', $settingsFlat['developer_name'] ?? 'Tech Googly') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Developer Attribution Website URL</label>
                        <input type="text" name="developer_url" value="{{ old('developer_url', $settingsFlat['developer_url'] ?? 'https://techgoogly.com/') }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl shadow-md transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Save All Global Settings
            </button>
        </div>
    </form>
</div>
@endsection

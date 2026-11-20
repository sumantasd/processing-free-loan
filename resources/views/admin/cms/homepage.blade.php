@extends('admin.layouts.app')

@section('title', 'Homepage Sections Manager')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Homepage Sections CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Control visibility, headlines, badges, and ordering of all homepage content sections</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 bg-white text-[#0866E8] border border-blue-200 rounded-xl text-xs font-bold hover:bg-blue-50 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Live Website
            </a>
        </div>
    </div>

    <!-- Sections List -->
    <div class="grid grid-cols-1 gap-6">
        @foreach($sections as $section)
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden" x-data="{ expanded: false }">
            <div class="p-5 flex items-center justify-between gap-4 cursor-pointer hover:bg-slate-50/50 transition" @click="expanded = !expanded">
                <div class="flex items-center gap-4 min-w-0">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center font-bold text-xs {{ $section->is_active ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-slate-100 text-slate-400' }}">
                        #{{ $section->display_order }}
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <h3 class="text-sm font-bold text-[#062B59] truncate">{{ $section->title ?: Str::headline($section->section_key) }}</h3>
                            <span class="text-[10px] font-mono bg-slate-100 text-slate-500 px-2 py-0.5 rounded">{{ $section->section_key }}</span>
                            @if($section->badge)
                            <span class="text-[10px] font-bold bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full">{{ $section->badge }}</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-500 truncate mt-0.5">{{ $section->subtitle ?: 'Standard section layout' }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold {{ $section->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                        <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $section->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                        {{ $section->is_active ? 'Visible' : 'Hidden' }}
                    </span>
                    <button type="button" class="text-xs font-semibold text-[#0866E8] hover:underline flex items-center gap-1">
                        <span x-text="expanded ? 'Close' : 'Configure'"></span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                </div>
            </div>

            <!-- Edit Form Dropdown -->
            <div x-show="expanded" x-collapse class="border-t border-slate-100 bg-slate-50/60 p-6">
                <form action="{{ route('admin.cms.homepage.update', $section->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Section Title / Headline</label>
                            <input type="text" name="title" value="{{ old('title', $section->title) }}" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8] focus:border-[#0866E8] bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Badge / Tagline</label>
                            <input type="text" name="badge" value="{{ old('badge', $section->badge) }}" placeholder="e.g. TRUSTED LOAN PARTNER" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8] focus:border-[#0866E8] bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Subtitle / Supporting Description</label>
                        <textarea name="subtitle" rows="2" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8] focus:border-[#0866E8] bg-white">{{ old('subtitle', $section->subtitle) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Image URL / Path</label>
                            <input type="text" name="image" value="{{ old('image', $section->image) }}" placeholder="/images/hero-banner.png" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8] focus:border-[#0866E8] bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Display Order</label>
                            <input type="number" name="display_order" value="{{ old('display_order', $section->display_order) }}" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8] focus:border-[#0866E8] bg-white">
                        </div>
                        <div class="pt-5">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" {{ $section->is_active ? 'checked' : '' }} class="w-4 h-4 text-[#0866E8] rounded border-slate-300 focus:ring-[#0866E8]">
                                <span class="text-xs font-bold text-slate-700">Display Section on Homepage</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="submit" class="px-5 py-2 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl shadow-xs transition">
                            Save Section Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

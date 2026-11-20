@extends('admin.layouts.app')

@section('title', 'Manage Static & CMS Pages')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Pages CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage static information pages, legal policies, and SEO metadata</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6">Page Name</th>
                        <th class="py-3.5 px-6">Slug / Route</th>
                        <th class="py-3.5 px-6">SEO Title</th>
                        <th class="py-3.5 px-6">Status</th>
                        <th class="py-3.5 px-6">Last Updated</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($pages as $page)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="py-4 px-6 font-bold text-[#062B59]">
                            {{ $page->title }}
                        </td>
                        <td class="py-4 px-6 font-mono text-slate-600">
                            /{{ $page->slug }}
                        </td>
                        <td class="py-4 px-6 text-slate-500 max-w-xs truncate">
                            {{ $page->seo_title ?: $page->title }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold {{ $page->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                {{ $page->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-500">
                            {{ $page->updated_at->format('d M Y, h:i A') }}
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="/{{ $page->slug }}" target="_blank" class="text-slate-400 hover:text-slate-600 text-xs font-semibold">View</a>
                            <a href="{{ route('admin.cms.pages.edit', $page->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-50 text-[#0866E8] hover:bg-blue-100 rounded-lg text-xs font-bold transition">
                                Edit Page
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">No CMS pages found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

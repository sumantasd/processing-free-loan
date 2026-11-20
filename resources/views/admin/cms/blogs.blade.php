@extends('admin.layouts.app')

@section('title', 'Manage Blog Articles')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Blog & Loan Guides CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage financial articles, loan comparison guides, and credit score education</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6">Article Title</th>
                        <th class="py-3.5 px-6">Category</th>
                        <th class="py-3.5 px-6">Published</th>
                        <th class="py-3.5 px-6">Views</th>
                        <th class="py-3.5 px-6">Date</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($blogs as $blog)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="py-4 px-6 font-bold text-[#062B59] max-w-sm">
                            <div class="truncate">{{ $blog->title }}</div>
                            <div class="text-[11px] font-normal text-slate-400 mt-0.5 truncate">{{ $blog->excerpt }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-blue-700">
                                {{ $blog->category ?: 'Financial Advice' }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold {{ $blog->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                {{ $blog->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-600 font-semibold">
                            {{ number_format($blog->views) }}
                        </td>
                        <td class="py-4 px-6 text-slate-400">
                            {{ $blog->created_at->format('d M Y') }}
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="{{ route('admin.cms.blogs.edit', $blog->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-50 text-[#0866E8] hover:bg-blue-100 rounded-lg text-xs font-bold transition">
                                Edit Article
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">No blog articles found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($blogs->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

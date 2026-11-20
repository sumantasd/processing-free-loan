@extends('admin.layouts.app')

@section('title', 'Edit Blog Article - ' . $blog->title)

@section('content')
<div class="space-y-6 max-w-4xl">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Edit Article</h1>
            <p class="text-xs text-slate-500 mt-1">Slug: /blog/{{ $blog->slug }}</p>
        </div>
        <a href="{{ route('admin.cms.blogs') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition">
            Back to Articles
        </a>
    </div>

    <form action="{{ route('admin.cms.blogs.update', $blog->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 mb-1">Article Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $blog->title) }}" required class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Category</label>
                    <input type="text" name="category" value="{{ old('category', $blog->category) }}" placeholder="e.g. Loan Tips, Credit Score" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Summary / Excerpt</label>
                <textarea name="excerpt" rows="2" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">{{ old('excerpt', $blog->excerpt) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Full Article Content (HTML / Text)</label>
                <textarea name="content" rows="12" class="w-full px-3.5 py-2.5 text-xs font-mono border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ $blog->is_published ? 'checked' : '' }} class="w-4 h-4 text-[#0866E8] rounded border-slate-300 focus:ring-[#0866E8]">
                    <span class="text-xs font-bold text-slate-700">Publish this article on the live website</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.cms.blogs') }}" class="px-5 py-2.5 bg-slate-100 text-slate-600 text-xs font-bold rounded-xl hover:bg-slate-200 transition">Cancel</a>
            <button type="submit" class="px-6 py-2.5 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl shadow-md transition">Update Article</button>
        </div>
    </form>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Centralized Media Library')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Media & Image Library</h1>
            <p class="text-xs text-slate-500 mt-1">Upload and manage banners, partner logos, loan graphics, and document attachments</p>
        </div>
    </div>

    <!-- Upload Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
        <h2 class="text-sm font-bold text-[#062B59] mb-3">Upload New Image / Document</h2>
        <form action="{{ route('admin.cms.media.upload') }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row gap-4 items-center">
            @csrf
            <div class="flex-1 w-full">
                <input type="file" name="file" required accept="image/*,.pdf" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-[#0866E8] hover:file:bg-blue-100 cursor-pointer">
            </div>
            <div class="w-full sm:w-48">
                <input type="text" name="alt_text" placeholder="Alt text / description" class="w-full px-3 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
            </div>
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl shadow-xs transition whitespace-nowrap">
                Upload File
            </button>
        </form>
    </div>

    <!-- Media Gallery -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($media as $item)
        <div class="bg-white rounded-xl border border-slate-200/80 overflow-hidden shadow-xs group hover:shadow-md transition flex flex-col justify-between">
            <div class="aspect-square bg-slate-50 flex items-center justify-center p-2 overflow-hidden relative">
                @if(Str::startsWith($item->mime_type, 'image/'))
                <img src="{{ $item->url }}" alt="{{ $item->alt_text }}" class="w-full h-full object-contain">
                @else
                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                @endif
            </div>
            <div class="p-2.5 bg-slate-50/70 border-t border-slate-100 text-[10px]">
                <div class="font-bold text-slate-700 truncate" title="{{ $item->original_name }}">{{ $item->original_name }}</div>
                <div class="text-slate-400 flex items-center justify-between mt-1">
                    <span>{{ round($item->file_size / 1024, 1) }} KB</span>
                    <button type="button" onclick="navigator.clipboard.writeText('{{ $item->url }}'); alert('File URL copied to clipboard: {{ $item->url }}');" class="text-[#0866E8] hover:underline font-bold">Copy URL</button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-6 bg-white p-12 text-center text-slate-400 rounded-2xl border border-slate-200">
            No media files uploaded yet.
        </div>
        @endforelse
    </div>

    @if($media->hasPages())
    <div class="p-4 bg-white rounded-2xl border border-slate-200">
        {{ $media->links() }}
    </div>
    @endif
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Manage Frequently Asked Questions (FAQs)')

@section('content')
<div class="space-y-6" x-data="{ addModal: false, editModal: false, activeFaq: { id: '', question: '', answer: '', category: '', is_active: 1 } }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Frequently Asked Questions (FAQs)</h1>
            <p class="text-xs text-slate-500 mt-1">Manage borrower questions and answers displayed on the homepage and loan pages</p>
        </div>
        <button @click="addModal = true" class="px-4 py-2.5 bg-[#0866E8] hover:bg-blue-600 text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New FAQ
        </button>
    </div>

    <!-- FAQ Accordion List -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs divide-y divide-slate-100">
        @forelse($faqs as $faq)
        <div class="p-5 flex items-start justify-between gap-4 hover:bg-slate-50/50 transition">
            <div class="space-y-1.5 flex-1 min-w-0">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-[11px] flex-shrink-0">
                        {{ $loop->iteration }}
                    </span>
                    <h3 class="text-sm font-bold text-[#062B59]">{{ $faq->question }}</h3>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold {{ $faq->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                        {{ $faq->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <p class="text-xs text-slate-600 pl-8 leading-relaxed">{{ $faq->answer }}</p>
            </div>

            <div class="flex items-center gap-2 flex-shrink-0">
                <button type="button" 
                        @click="activeFaq = { id: '{{ $faq->id }}', question: `{{ addslashes($faq->question) }}`, answer: `{{ addslashes($faq->answer) }}`, category: '{{ $faq->category }}', is_active: {{ $faq->is_active ? 1 : 0 }} }; editModal = true"
                        class="p-2 text-slate-400 hover:text-[#0866E8] hover:bg-blue-50 rounded-lg transition" title="Edit FAQ">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                </button>
                <form action="{{ route('admin.cms.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Delete this FAQ permanently?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete FAQ">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="p-12 text-center text-slate-400">No FAQs created yet.</div>
        @endforelse
    </div>

    <!-- Add Modal -->
    <div x-show="addModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" style="display: none;">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl">
            <h3 class="text-base font-bold text-[#062B59]">Add New FAQ</h3>
            <form action="{{ route('admin.cms.faqs.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Question <span class="text-red-500">*</span></label>
                    <input type="text" name="question" required class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Answer <span class="text-red-500">*</span></label>
                    <textarea name="answer" rows="4" required class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Category</label>
                    <input type="text" name="category" placeholder="General, Eligibility, Interest Rates" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="addModal = false" class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200">Cancel</button>
                    <button type="submit" class="px-5 py-2 text-xs font-bold text-white bg-[#062B59] rounded-xl hover:bg-[#031B3B]">Create FAQ</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" style="display: none;">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl">
            <h3 class="text-base font-bold text-[#062B59]">Edit FAQ</h3>
            <form :action="'/admin/cms/faqs/' + activeFaq.id" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Question <span class="text-red-500">*</span></label>
                    <input type="text" name="question" x-model="activeFaq.question" required class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Answer <span class="text-red-500">*</span></label>
                    <textarea name="answer" rows="4" x-model="activeFaq.answer" required class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Category</label>
                        <input type="text" name="category" x-model="activeFaq.category" class="w-48 px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                    <label class="flex items-center gap-2 pt-4 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" :checked="activeFaq.is_active == 1" class="w-4 h-4 text-[#0866E8] rounded border-slate-300">
                        <span class="text-xs font-bold text-slate-700">Active</span>
                    </label>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="editModal = false" class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200">Cancel</button>
                    <button type="submit" class="px-5 py-2 text-xs font-bold text-white bg-[#062B59] rounded-xl hover:bg-[#031B3B]">Update FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

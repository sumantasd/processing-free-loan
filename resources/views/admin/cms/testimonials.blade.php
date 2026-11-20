@extends('admin.layouts.app')

@section('title', 'Manage Customer Testimonials')

@section('content')
<div class="space-y-6" x-data="{ 
    addModal: false, 
    editModal: false, 
    editItem: { id: null, customer_name: '', role: '', location: '', loan_category: '', rating: 5, review: '', display_order: 1, is_active: true, avatar_url: null, initials: '' } 
}">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Customer Testimonials & Reviews</h1>
            <p class="text-xs text-slate-500 mt-1">Manage verified borrower reviews and customer testimonials displayed on the homepage</p>
        </div>
        <button @click="addModal = true" class="px-4 py-2.5 bg-[#0866E8] hover:bg-blue-600 text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-2 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New Testimonial
        </button>
    </div>

    @if(session('success'))
        <div class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center justify-between">
            <span>✓ {{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs space-y-1">
            @foreach($errors->all() as $err)
                <div>• {{ $err }}</div>
            @endforeach
        </div>
    @endif

    <!-- Testimonials Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($testimonials as $item)
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex flex-col justify-between hover:shadow-md transition">
            <div>
                <!-- Top Status & Rating Row -->
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-1 text-[#F59E0B]">
                        @for($i = 0; $i < $item->rating; $i++)
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <div class="flex items-center gap-2">
                        @if($item->loan_category)
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                                {{ $item->loan_category }}
                            </span>
                        @endif
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $item->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                            {{ $item->is_active ? 'Published' : 'Hidden' }}
                        </span>
                    </div>
                </div>

                <!-- Review Text -->
                <p class="text-xs text-slate-600 leading-relaxed mb-4 italic">"{{ $item->review }}"</p>

                <!-- Customer Info -->
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full flex-shrink-0 overflow-hidden ring-2 ring-emerald-400/40 bg-slate-100 flex items-center justify-center">
                        @if($item->avatar_url)
                            <img src="{{ $item->avatar_url }}" alt="{{ $item->customer_name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-[#062B59] to-[#0866E8] text-white font-extrabold text-xs flex items-center justify-center">
                                {{ $item->initials }}
                            </div>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <div class="font-extrabold text-xs text-[#062B59] truncate">{{ $item->customer_name }}</div>
                        <div class="text-[11px] text-slate-500 truncate">{{ $item->role ?: 'Verified Borrower' }}</div>
                        <div class="text-[10px] text-slate-400 truncate">{{ $item->location ?: 'West Bengal, India' }}</div>
                    </div>
                </div>
            </div>

            <!-- Card Actions -->
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                <span class="text-[10px] font-medium text-slate-400">Order: #{{ $item->display_order }}</span>
                <div class="flex items-center gap-3">
                    <button type="button" 
                            @click="editItem = {
                                id: {{ $item->id }},
                                customer_name: '{{ addslashes($item->customer_name) }}',
                                role: '{{ addslashes($item->role ?? '') }}',
                                location: '{{ addslashes($item->location ?? '') }}',
                                loan_category: '{{ addslashes($item->loan_category ?? '') }}',
                                rating: {{ $item->rating }},
                                review: '{{ addslashes(preg_replace('/\s+/', ' ', $item->review)) }}',
                                display_order: {{ $item->display_order }},
                                is_active: {{ $item->is_active ? 'true' : 'false' }},
                                avatar_url: '{{ $item->avatar_url ? addslashes($item->avatar_url) : '' }}',
                                initials: '{{ $item->initials }}'
                            }; editModal = true;"
                            class="font-bold text-[#0866E8] hover:underline cursor-pointer">
                        Edit
                    </button>
                    <form action="{{ route('admin.cms.testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-semibold text-red-500 hover:text-red-700 cursor-pointer">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 bg-white p-12 text-center text-slate-400 rounded-2xl border border-slate-200">No customer testimonials found.</div>
        @endforelse
    </div>

    <!-- Add Modal -->
    <div x-show="addModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" style="display: none;">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl max-h-[90vh] overflow-y-auto">
            <h3 class="text-base font-bold text-[#062B59]">Add Customer Testimonial</h3>
            <form action="{{ route('admin.cms.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Customer Name <span class="text-red-500">*</span></label>
                        <input type="text" name="customer_name" required class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Role / Designation</label>
                        <input type="text" name="role" placeholder="e.g. Senior IT Consultant, Doctor" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">City / Location</label>
                        <input type="text" name="location" placeholder="e.g. Kolkata, West Bengal" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Loan Category Badge</label>
                        <input type="text" name="loan_category" placeholder="e.g. Salaried Personal Loan" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Rating (1 to 5 Stars)</label>
                        <select name="rating" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                            <option value="5" selected>5 Stars (★★★★★)</option>
                            <option value="4">4 Stars (★★★★)</option>
                            <option value="3">3 Stars (★★★)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Display Order</label>
                        <input type="number" name="display_order" value="1" min="0" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Customer Profile Image</label>
                    <input type="file" name="customer_image" accept="image/jpeg,image/png,image/jpg,image/webp" class="w-full px-3 py-1.5 text-xs border border-slate-300 rounded-xl file:mr-3 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-[10px] text-slate-400 mt-1">Accepts JPG, PNG, WEBP (Max 2MB). Initials fallback used if omitted.</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Review Quote <span class="text-red-500">*</span></label>
                    <textarea name="review" rows="3" required placeholder="Customer review text..." class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]"></textarea>
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" id="add_active" value="1" checked class="w-4 h-4 text-[#0866E8] rounded border-slate-300">
                    <label for="add_active" class="text-xs font-semibold text-slate-700">Publish immediately on homepage</label>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="addModal = false" class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200 cursor-pointer">Cancel</button>
                    <button type="submit" class="px-5 py-2 text-xs font-bold text-white bg-[#062B59] rounded-xl hover:bg-[#031B3B] cursor-pointer">Save Testimonial</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" style="display: none;">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl max-h-[90vh] overflow-y-auto">
            <h3 class="text-base font-bold text-[#062B59]">Edit Customer Testimonial</h3>
            <form :action="'{{ url('/admin/cms/testimonials') }}/' + editItem.id" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Customer Name <span class="text-red-500">*</span></label>
                        <input type="text" name="customer_name" x-model="editItem.customer_name" required class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Role / Designation</label>
                        <input type="text" name="role" x-model="editItem.role" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">City / Location</label>
                        <input type="text" name="location" x-model="editItem.location" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Loan Category Badge</label>
                        <input type="text" name="loan_category" x-model="editItem.loan_category" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Rating</label>
                        <select name="rating" x-model="editItem.rating" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                            <option value="5">5 Stars (★★★★★)</option>
                            <option value="4">4 Stars (★★★★)</option>
                            <option value="3">3 Stars (★★★)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Display Order</label>
                        <input type="number" name="display_order" x-model="editItem.display_order" min="0" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>
                </div>

                <!-- Existing Photo Preview & Replace Option -->
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
                    <div class="flex items-center gap-3">
                        <template x-if="editItem.avatar_url">
                            <img :src="editItem.avatar_url" class="w-11 h-11 rounded-full object-cover ring-2 ring-emerald-400/40">
                        </template>
                        <template x-if="!editItem.avatar_url">
                            <div class="w-11 h-11 rounded-full bg-[#062B59] text-white flex items-center justify-center font-bold text-xs" x-text="editItem.initials"></div>
                        </template>
                        <div class="flex-1 min-w-0">
                            <label class="block text-xs font-bold text-slate-700 mb-0.5">Replace Customer Image</label>
                            <input type="file" name="customer_image" accept="image/jpeg,image/png,image/jpg,image/webp" class="w-full text-xs file:mr-2 file:py-1 file:px-2 file:rounded-lg file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-700">
                        </div>
                    </div>
                    <template x-if="editItem.avatar_url">
                        <div class="mt-2 pt-2 border-t border-slate-200 flex items-center gap-2">
                            <input type="checkbox" name="remove_image" id="remove_img" value="1" class="w-3.5 h-3.5 text-red-600 rounded">
                            <label for="remove_img" class="text-[11px] font-semibold text-red-600">Remove current photo and use initials fallback</label>
                        </div>
                    </template>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Review Quote <span class="text-red-500">*</span></label>
                    <textarea name="review" x-model="editItem.review" rows="3" required class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]"></textarea>
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" id="edit_active" value="1" x-model="editItem.is_active" class="w-4 h-4 text-[#0866E8] rounded border-slate-300">
                    <label for="edit_active" class="text-xs font-semibold text-slate-700">Published on homepage</label>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="editModal = false" class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200 cursor-pointer">Cancel</button>
                    <button type="submit" class="px-5 py-2 text-xs font-bold text-white bg-[#062B59] rounded-xl hover:bg-[#031B3B] cursor-pointer">Update Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Edit Testimonial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Client Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Role -->
                        <div class="mb-6">
                            <label for="role" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Client Role:</label>
                            <input type="text" name="role" id="role" value="{{ old('role', $testimonial->role) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Client Image (Optional):</label>
                            @if($testimonial->image_url)
                                <div class="mb-4">
                                    <img src="{{ $testimonial->image_url }}" alt="Current Image" class="w-16 h-16 rounded-full object-cover border border-slate-600">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-slate-300 focus:outline-none focus:border-indigo-500 transition-colors">
                            <p class="text-xs text-slate-500 mt-2">Upload a new image to replace the current one.</p>
                        </div>

                        <!-- Message -->
                        <div class="mb-6">
                            <label for="message" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Feedback:</label>
                            <textarea name="message" id="message" rows="4" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>{{ old('message', $testimonial->message) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-800">
                             <a href="{{ route('admin.testimonials.index') }}" class="text-slate-400 hover:text-white font-semibold transition-colors">
                                Cancel
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all uppercase tracking-wide text-sm" type="submit">
                                Update Testimonial
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

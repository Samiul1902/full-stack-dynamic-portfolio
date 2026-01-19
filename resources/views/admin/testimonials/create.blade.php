<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Add New Testimonial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Client Name:</label>
                            <input type="text" name="name" id="name" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Role -->
                        <div class="mb-6">
                            <label for="role" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Client Role:</label>
                            <input type="text" name="role" id="role" placeholder="e.g. CEO, Tech Lead" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Client Image (Optional):</label>
                            <input type="file" name="image" id="image" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-slate-300 focus:outline-none focus:border-indigo-500 transition-colors">
                        </div>

                        <!-- Message -->
                        <div class="mb-6">
                            <label for="message" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Feedback:</label>
                            <textarea name="message" id="message" rows="4" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all uppercase tracking-wide text-sm" type="submit">
                                Save Testimonial
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

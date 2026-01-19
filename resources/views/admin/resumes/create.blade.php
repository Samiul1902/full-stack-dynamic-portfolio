<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Upload New Resume') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-6">
                    <form action="{{ route('admin.resumes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="headline" class="block text-slate-300 text-sm font-bold mb-2">Headline / Version Note (Optional)</label>
                            <input type="text" name="headline" id="headline" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-slate-700 bg-slate-900 text-white rounded-md p-3" placeholder="e.g. Updated with React Native Experience">
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-slate-300 text-sm font-bold mb-2">Resume File (PDF)</label>
                            <input type="file" name="file" id="file" accept="application/pdf" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-slate-700 bg-slate-900 text-white rounded-md p-3" required>
                            <p class="text-slate-500 text-xs mt-1">Max file size: 10MB</p>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.resumes.index') }}" class="text-slate-400 hover:text-white mr-4 font-semibold text-sm uppercase tracking-wide">Cancel</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all text-sm uppercase tracking-wider">
                                Upload & Publish
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

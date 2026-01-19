<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <!-- EasyMDE CSS -->
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <style>
        .editor-wrapper .CodeMirror {
            background-color: #0f172a;
            color: #cbd5e1;
            border-color: #334155;
        }
        .editor-wrapper .editor-toolbar {
            background-color: #1e293b;
            border-color: #334155;
            color: #cbd5e1;
        }
        .editor-wrapper .editor-toolbar i {
            color: #94a3b8;
        }
        .editor-wrapper .editor-toolbar i:hover {
            color: #fff;
        }
        .editor-wrapper .editor-preview {
            background-color: #0f172a;
            color: #cbd5e1;
        }
    </style>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors" required>
                            </div>

                            <!-- Category & Cover Image -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="category_id" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Category</label>
                                    <select name="category_id" id="category_id" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white focus:outline-none focus:border-indigo-500 transition-colors">
                                        <option value="">Select Category (Optional)</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="cover_image" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Cover Image (Leave empty to keep current)</label>
                                    @if($post->cover_image)
                                        <div class="mb-2">
                                            <img src="{{ $post->cover_image }}" alt="Current Cover" class="h-20 w-auto rounded border border-slate-700">
                                        </div>
                                    @endif
                                    <input type="file" name="cover_image" id="cover_image" class="block w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-500/10 file:text-indigo-400 hover:file:bg-indigo-500/20">
                                </div>
                            </div>

                            <!-- Excerpt -->
                            <div>
                                <label for="excerpt" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="3" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors">{{ old('excerpt', $post->excerpt) }}</textarea>
                            </div>

                            <!-- Content (Markdown) -->
                            <div class="editor-wrapper">
                                <label for="content" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Content (Markdown)</label>
                                <textarea name="content" id="content" class="hidden">{{ old('content', $post->content) }}</textarea>
                            </div>

                            <!-- Publish Toggle -->
                            <div class="flex items-center">
                                <input type="checkbox" name="is_published" id="is_published" {{ $post->is_published ? 'checked' : '' }} class="rounded border-slate-700 bg-slate-900 text-indigo-600 shadow-sm focus:ring-indigo-500 h-5 w-5">
                                <label for="is_published" class="ml-2 text-sm text-white font-bold">Published</label>
                            </div>

                            <div class="flex justify-between items-center pt-4 border-t border-slate-800 mt-4">
                                <a href="{{ route('admin.posts.index') }}" class="text-slate-400 hover:text-white font-semibold transition-colors">Cancel</a>
                                <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all uppercase tracking-wide text-sm" type="submit">
                                    Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- EasyMDE Script -->
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <script>
        const easyMDE = new EasyMDE({
            element: document.getElementById('content'),
            spellChecker: false,
            autosave: {
                enabled: true,
                uniqueId: "edit_post_{{ $post->id }}",
                delay: 1000,
            },
            status: false,
             // Force sync on change to ensure value is submitted
             forceSync: true,
        });
    </script>
</x-app-layout>

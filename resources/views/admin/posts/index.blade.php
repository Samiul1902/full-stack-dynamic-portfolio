<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
                {{ __('Manage Posts') }}
            </h2>
            <a href="{{ route('admin.posts.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all text-sm uppercase tracking-wider">
                + New Post
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-6">
                    
                    @if(session('success'))
                        <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-lg relative mb-6" role="alert">
                            <span class="block sm:inline font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Title
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Category
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Status
                                    </th>
                                     <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Last Updated
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-right text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                    <tr class="hover:bg-slate-800/50 transition-colors">
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <div class="flex items-center">
                                                @if($post->cover_image)
                                                    <div class="flex-shrink-0 w-10 h-10 mr-3">
                                                        <img class="w-full h-full rounded-md object-cover" src="{{ $post->cover_image }}" alt="" />
                                                    </div>
                                                @endif
                                                <div>
                                                    <p class="text-white font-semibold">{{ $post->title }}</p>
                                                    <p class="text-slate-500 text-xs truncate w-48">{{ $post->slug }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            @if($post->category)
                                                <span class="px-2 py-1 bg-slate-800 text-slate-300 rounded text-xs border border-slate-700">
                                                    {{ $post->category->name }}
                                                </span>
                                            @else
                                                <span class="text-slate-500 text-xs italic">Uncategorized</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $post->is_published ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20' }}">
                                                {{ $post->is_published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <p class="text-slate-400 text-xs">{{ $post->updated_at->diffForHumans() }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm text-right">
                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-indigo-400 hover:text-indigo-300 font-bold mr-4">Edit</a>
                                            
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-500 hover:text-rose-400 font-bold">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm text-center text-slate-500">
                                            No posts found. Start writing!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all text-sm uppercase tracking-wider">
                + Add Category
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
                                        Name
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Slug
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Posts Count
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-right text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr class="hover:bg-slate-800/50 transition-colors">
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <p class="text-white font-semibold">{{ $category->name }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <p class="text-slate-400 font-mono text-xs">{{ $category->slug }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <span class="px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-bold">
                                                {{ $category->posts_count }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm text-right">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-indigo-400 hover:text-indigo-300 font-bold mr-4">Edit</a>
                                            
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure? This will decouple linked posts.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-500 hover:text-rose-400 font-bold">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm text-center text-slate-500">
                                            No categories found. Start by adding one!
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

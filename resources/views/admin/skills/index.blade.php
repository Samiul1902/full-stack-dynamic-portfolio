<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
                {{ __('Manage Skills') }}
            </h2>
            <a href="{{ route('admin.skills.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all text-sm uppercase tracking-wider">
                + Add New Skill
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
                                        Level (%)
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Category
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-right text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skills as $skill)
                                    <tr class="hover:bg-slate-800/50 transition-colors">
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-white font-semibold whitespace-no-wrap">
                                                        {{ $skill->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <div class="w-full bg-slate-700 rounded-full h-1.5 w-24">
                                                <div class="bg-indigo-500 h-1.5 rounded-full" style="width: {{ $skill->level }}%"></div>
                                            </div>
                                            <span class="text-xs text-slate-400 mt-1 block">{{ $skill->level }}%</span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <span class="relative inline-block px-3 py-1 font-semibold text-indigo-100 leading-tight">
                                                <span aria-hidden class="absolute inset-0 bg-indigo-500/20 rounded-full"></span>
                                                <span class="relative text-xs uppercase tracking-wide">{{ $skill->category }}</span>
                                            </span>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm text-right">
                                            <a href="{{ route('admin.skills.edit', $skill->id) }}" class="text-indigo-400 hover:text-indigo-300 font-bold mr-4">Edit</a>
                                            
                                            <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-500 hover:text-rose-400 font-bold">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

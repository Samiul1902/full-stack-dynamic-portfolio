<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
                {{ __('Manage Testimonials') }}
            </h2>
            <a href="{{ route('admin.testimonials.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all text-sm uppercase tracking-wider">
                + Add New Testimonial
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
                                        Client
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Role
                                    </th>
                                    <th class="px-5 py-3 border-b border-slate-700 bg-slate-900/50 text-left text-xs font-bold text-indigo-300 uppercase tracking-widest">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr class="hover:bg-slate-800/50 transition-colors">
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <div class="flex items-center gap-4">
                                                @if($testimonial->image_url)
                                                    <img class="w-10 h-10 rounded-full object-cover" src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}" />
                                                @else
                                                    <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold text-xs">
                                                        {{ substr($testimonial->name, 0, 2) }}
                                                    </div>
                                                @endif
                                                <div class="ml-3">
                                                    <p class="text-white font-semibold whitespace-no-wrap">
                                                        {{ $testimonial->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm">
                                            <p class="text-slate-300 whitespace-no-wrap">{{ $testimonial->role }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-slate-800 bg-transparent text-sm text-right">
                                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="text-indigo-400 hover:text-indigo-300 font-bold mr-4">Edit</a>
                                            
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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

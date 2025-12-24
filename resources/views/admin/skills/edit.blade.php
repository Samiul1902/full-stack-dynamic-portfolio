<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.skills.update', $skill->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Skill Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <!-- Level -->
                         <div class="mb-4">
                            <label for="level" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Proficiency Level (0-100):</label>
                            <input type="number" name="level" id="level" min="0" max="100" value="{{ old('level', $skill->level) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <!-- Category -->
                         <div class="mb-4">
                            <label for="category" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Category:</label>
                             <select name="category" id="category" class="shadow border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="Frontend" {{ $skill->category == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                                <option value="Backend" {{ $skill->category == 'Backend' ? 'selected' : '' }}>Backend</option>
                                <option value="Database" {{ $skill->category == 'Database' ? 'selected' : '' }}>Database</option>
                                <option value="Tools" {{ $skill->category == 'Tools' ? 'selected' : '' }}>Tools/DevOps</option>
                                <option value="Other" {{ $skill->category == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update Skill
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

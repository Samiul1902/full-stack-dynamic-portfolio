<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Study History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.study-history.update', $studyHistory->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Institution -->
                        <div class="mb-4">
                            <label for="institution" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Institution:</label>
                            <input type="text" name="institution" id="institution" value="{{ old('institution', $studyHistory->institution) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <!-- Level -->
                        <div class="mb-4">
                            <label for="level" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Level/Degree:</label>
                            <input type="text" name="level" id="level" value="{{ old('level', $studyHistory->level) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- Start Year -->
                            <div>
                                <label for="start_year" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Start Year:</label>
                                <input type="number" name="start_year" id="start_year" min="1900" max="2100" value="{{ old('start_year', $studyHistory->start_year) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <!-- End Year -->
                            <div>
                                <label for="end_year" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">End Year (Leave blank if present):</label>
                                <input type="number" name="end_year" id="end_year" min="1900" max="2100" value="{{ old('end_year', $studyHistory->end_year) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                        </div>

                        <!-- Grade -->
                         <div class="mb-4">
                            <label for="grade" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Grade/CGPA:</label>
                            <input type="text" name="grade" id="grade" value="{{ old('grade', $studyHistory->grade) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Details -->
                        <div class="mb-4">
                            <label for="details" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Details (Optional):</label>
                            <textarea name="details" id="details" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('details', $studyHistory->details) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update Entry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

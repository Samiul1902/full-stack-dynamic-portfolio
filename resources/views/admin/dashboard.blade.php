<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Projects Stats -->
                        <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg">
                            <h4 class="text-xl font-semibold">Projects</h4>
                            <p class="text-3xl font-bold">{{ $projectCount }}</p>
                            <a href="{{ route('admin.projects.index') }}" class="text-blue-600 dark:text-blue-300 hover:underline mt-2 block">Manage Projects &rarr;</a>
                        </div>

                        <!-- Skills Stats -->
                        <div class="bg-green-100 dark:bg-green-900 p-4 rounded-lg">
                            <h4 class="text-xl font-semibold">Skills</h4>
                            <p class="text-3xl font-bold">{{ $skillCount }}</p>
                            <a href="{{ route('admin.skills.index') }}" class="text-green-600 dark:text-green-300 hover:underline mt-2 block">Manage Skills &rarr;</a>
                        </div>

                         <!-- Study History Stats -->
                         <div class="bg-purple-100 dark:bg-purple-900 p-4 rounded-lg">
                            <h4 class="text-xl font-semibold">Education</h4>
                            <p class="text-3xl font-bold">{{ $studyCount }}</p>
                            <a href="{{ route('admin.study-history.index') }}" class="text-purple-600 dark:text-purple-300 hover:underline mt-2 block">Manage Education &rarr;</a>
                        </div>

                         <!-- Achievements Stats -->
                         <div class="bg-yellow-100 dark:bg-yellow-900 p-4 rounded-lg">
                            <h4 class="text-xl font-semibold">Awards</h4>
                            <p class="text-3xl font-bold">{{ $achievementCount }}</p>
                            <a href="{{ route('admin.achievements.index') }}" class="text-yellow-600 dark:text-yellow-300 hover:underline mt-2 block">Manage Awards &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

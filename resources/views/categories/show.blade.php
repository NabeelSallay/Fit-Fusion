<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($category->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-grow">
                            <h1 class="text-2xl font-semibold text-gray-900">{{ $category->name}}</h1>
                            <p class="text-gray-600">{{ $category->description }}</p>
                            <p class="text-gray-600">Created: {{ $category->created_at->diffForHumans() }}</p>
                            <p class="text-gray-600">Updated: {{ $category->updated_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex items
               </div>
            </div>
        </div>
    </div>
</x-app-layout>


@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Archives</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <div class="category-folder bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-200 ease-in-out">
                    <h2 class="text-xl font-semibold mb-2 document">
                        <a href="{{ route('category.show', $category->id) }}" class="flex items-center text-black-600 category-name">
                            <i class="fas fa-folder folder-icon mr-2"></i>
                            {{ $category->name }}
                        </a>
                    </h2>
                </div>
            @endforeach
        </div>
    </div>
@endsection

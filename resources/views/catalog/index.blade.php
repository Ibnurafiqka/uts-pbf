@extends('layouts.app')

@section('title', 'Katalog Buku')

@section('content')
<div class="bg-gradient-to-b from-blue-50 to-white min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section with Enhanced Design -->
        <div class="relative mb-12 bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-600">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h1 class="text-3xl font-bold text-gray-800 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Katalog Buku</h1>
                </div>
                
                <!-- Search Form with Enhanced Design -->
                <div class="w-full md:w-auto">
                    <form action="{{ route('catalog.index') }}" method="GET" class="flex">
                        <div class="relative flex-grow">
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Cari judul atau penulis..." 
                                value="{{ request('search') }}"
                                class="w-full px-4 py-3 pr-10 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                            >
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-r-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg">
                            Cari
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Stats Bar (Optional) -->
            <div class="mt-6 flex flex-wrap gap-4 text-sm text-gray-600">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ $books->total() }} Buku Tersedia</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span>{{ $categories->count() }} Kategori</span>
                </div>
            </div>
        </div>

        @if($books->isEmpty())
            <div class="bg-white border-l-4 border-yellow-400 p-6 mb-6 rounded-md shadow-md animate-fade-in">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-yellow-800">Tidak ada hasil</h3>
                        <p class="mt-2 text-sm text-yellow-700">
                            Tidak ada buku yang ditemukan sesuai kriteria pencarian Anda. Coba gunakan kata kunci yang berbeda atau hapus filter.
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('catalog.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                Reset Pencarian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Filter Categories with Enhanced Design -->
            <div class="mb-8 bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Filter berdasarkan kategori:</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('catalog.index') }}" class="px-4 py-2 rounded-full text-sm transition-all duration-300 {{ request()->missing('category') ? 'bg-blue-600 text-white font-medium shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Semua
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('catalog.index', ['category' => $category->id]) }}" class="px-4 py-2 rounded-full text-sm transition-all duration-300 {{ request('category') == $category->id ? 'bg-blue-600 text-white font-medium shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Book Grid with Enhanced Design -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($books as $book)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                        <div class="relative h-64 overflow-hidden group">
                            @if($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-40 transition-opacity duration-300"></div>
                            
                            @if($book->stock <= 0)
                                <div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                    Tidak Tersedia
                                </div>
                            @elseif($book->stock <= 3)
                                <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                    Stok Terbatas ({{ $book->stock }})
                                </div>
                            @endif

                            <!-- Category Badge -->
                            <div class="absolute bottom-3 left-3 bg-blue-600 bg-opacity-90 text-white text-xs font-medium px-3 py-1 rounded-full">
                                {{ $book->category->name ?? 'Uncategorized' }}
                            </div>
                        </div>
                        
                        <div class="p-5 flex-grow border-b border-gray-100">
                            <h2 class="text-xl font-semibold text-gray-800 line-clamp-2 mb-2 hover:text-blue-600 transition-colors">{{ $book->title }}</h2>
                            <div class="flex items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <p class="text-sm text-gray-600">{{ $book->author }}</p>
                            </div>
                            
                            <div class="flex items-center text-xs text-gray-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $book->year }}</span>
                            </div>

                            <p class="text-sm text-gray-600 line-clamp-3 mb-4">{{ Str::limit($book->description, 150) }}</p>
                        </div>
                        
                        <div class="p-5 bg-gray-50">
                            <div class="flex justify-between items-center">
                                <span class="flex items-center gap-1 {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-sm font-medium">{{ $book->stock > 0 ? 'Tersedia' : 'Habis' }}</span>
                                </span>
                                <a href="{{ route('catalog.detail', ['id' => $book->id]) }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 shadow-md hover:shadow-lg">
                                    <span>Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Enhanced Pagination -->
            <div class="mt-12 flex justify-center">
                <div class="bg-white rounded-lg shadow px-4 py-3">
                    {{ $books->onEachSide(1)->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Custom Styles -->
<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Improve pagination styling */
    .pagination {
        display: flex;
        list-style: none;
        gap: 0.5rem;
    }
    
    .page-item {
        display: inline-block;
    }
    
    .page-link, .page-item.disabled .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .page-item.active .page-link {
        background: linear-gradient(to right, #2563eb, #4f46e5);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
    }
    
    .page-link:hover {
        background-color: #f3f4f6;
    }
    
    .page-item.disabled .page-link {
        color: #9ca3af;
        pointer-events: none;
    }
</style>
@endsection
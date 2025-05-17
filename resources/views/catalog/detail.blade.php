@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-5 text-gray-600 text-sm">
        <a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a>
        <span class="mx-2">/</span>
        <a href="{{ route('catalog.index') }}" class="hover:text-blue-600">Katalog</a>
        <span class="mx-2">/</span>
        <span class="text-gray-800 font-medium">{{ $book->title }}</span>
    </nav>

    <!-- Book Details Card -->
    <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-gray-100">
        <div class="md:flex">
            <!-- Book Cover Column -->
            <div class="md:w-1/3 relative">
                <!-- Badge for New Books (if published in current year) -->
                @if($book->year == date('Y'))
                <div class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Baru</div>
                @endif
                
                <!-- Stock Badge -->
                <div class="absolute top-4 right-4 {{ $book->stock > 0 ? 'bg-blue-500' : 'bg-red-500' }} text-white text-xs font-bold px-3 py-1 rounded-full">
                    {{ $book->stock > 0 ? 'Tersedia' : 'Habis' }}
                </div>
                
                <!-- Cover Image with Gradient Overlay -->
                <div class="relative h-full">
                    <div class="h-full bg-gradient-to-r from-gray-200 to-gray-100 flex items-center justify-center">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Book Info Column -->
            <div class="md:w-2/3 p-8">
                <!-- Category & Rating -->
                <div class="flex justify-between items-center mb-3">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                        {{ $book->category->name ?? 'Kategori tidak tersedia' }}
                    </span>
                    
                    <!-- Optional: Rating Stars (if you have a rating system) -->
                    <div class="flex items-center text-yellow-400">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                        <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                        <span class="ml-2 text-sm text-gray-600">4.0</span>
                    </div>
                </div>

                <!-- Title and Author -->
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $book->title }}</h1>
                <p class="text-lg text-gray-700 mb-6">oleh <span class="font-medium">{{ $book->author }}</span></p>

                <!-- Description -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $book->description }}</p>
                </div>

                <!-- Book Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6 mb-6">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <div>
                            <span class="text-sm text-gray-500">Penerbit</span>
                            <p class="text-gray-800">{{ $book->publisher }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <span class="text-sm text-gray-500">Tahun Terbit</span>
                            <p class="text-gray-800">{{ $book->year }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <div>
                            <span class="text-sm text-gray-500">ISBN</span>
                            <p class="text-gray-800">{{ $book->isbn }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <div>
                            <span class="text-sm text-gray-500">Stok</span>
                            <p class="text-gray-800">{{ $book->stock }} buku</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap gap-3 mt-8">
                    @if($book->stock > 0)
                    <a href="#" class="inline-flex items-center justify-center px-5 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Pinjam Buku
                    </a>
                    @endif
                    
                    <a href="{{ route('catalog.index') }}" class="inline-flex items-center justify-center px-5 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Katalog
                    </a>
                    
                    <button class="inline-flex items-center justify-center px-5 py-2 text-gray-700 border border-gray-300 hover:bg-gray-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Books Section -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Buku Terkait</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            <!-- Sample Related Books (You would need to pass these from controller) -->
            @for($i = 0; $i < 5; $i++)
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                <div class="h-56 bg-gray-200">
                    <img src="/api/placeholder/180/250" alt="Book Cover" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-medium mb-1 truncate">Judul Buku Terkait</h3>
                    <p class="text-gray-600 text-sm">Penulis</p>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection
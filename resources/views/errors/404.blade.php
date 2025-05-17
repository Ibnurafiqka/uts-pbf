@extends('layouts.guest')

@section('title', 'Halaman Tidak Ditemukan - 404')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-50 to-white px-4 py-12">
    <div class="max-w-3xl w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- Illustration Side -->
            <div class="w-full md:w-2/5 bg-gradient-to-br from-blue-600 to-indigo-700 p-8 text-white flex flex-col justify-between">
                <div>
                    <svg class="w-16 h-16 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h3 class="text-xl font-bold mt-4">Perpustakaan Digital</h3>
                    <p class="mt-2 text-blue-100">Temukan buku favorit Anda dalam koleksi kami.</p>
                </div>
                
                <!-- Book Stack Illustration -->
                <div class="mt-8 hidden md:block">
                    <div class="relative h-48">
                        <!-- Books Stack Illustration -->
                        <div class="absolute bottom-0 left-0 right-0 flex justify-center">
                            <!-- Book 1 -->
                            <div class="w-16 h-32 bg-blue-400 rounded-sm transform rotate-12 absolute bottom-0 left-12 shadow-lg"></div>
                            <!-- Book 2 -->
                            <div class="w-16 h-36 bg-indigo-300 rounded-sm transform -rotate-6 absolute bottom-0 left-8 shadow-lg"></div>
                            <!-- Book 3 -->
                            <div class="w-16 h-28 bg-blue-300 rounded-sm transform rotate-3 absolute bottom-0 right-8 shadow-lg"></div>
                            <!-- Book 4 -->
                            <div class="w-16 h-32 bg-indigo-400 rounded-sm transform -rotate-15 absolute bottom-0 right-12 shadow-lg"></div>
                            <!-- Main Book -->
                            <div class="w-24 h-40 bg-white bg-opacity-20 backdrop-filter backdrop-blur rounded-sm transform relative bottom-0 shadow-xl flex items-center justify-center border border-white border-opacity-30">
                                <span class="text-4xl font-bold">404</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Side -->
            <div class="w-full md:w-3/5 p-8">
                <div class="text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 flex items-center justify-center md:justify-start">
                        <span class="mr-3">Halaman Tidak Ditemukan</span>
                        <svg class="h-8 w-8 text-red-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </h1>
                    
                    <p class="mt-4 text-lg text-gray-600">
                        Maaf, halaman yang Anda cari tidak dapat ditemukan atau telah dihapus.
                    </p>
                    
                    <div class="mt-8 bg-gray-50 rounded-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-medium text-gray-800 mb-3">Beberapa kemungkinan penyebabnya:</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>URL yang Anda masukkan mungkin salah ketik atau tidak valid</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Halaman mungkin telah dipindahkan atau dihapus</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Anda mungkin tidak memiliki izin untuk mengakses halaman ini</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mt-8 space-y-4">
                        <a href="{{ route('catalog.index') }}" class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium px-6 py-3 rounded-lg text-center transition-all duration-300 shadow-md hover:shadow-lg">
                            Kembali ke Katalog Buku
                        </a>
                        
                        <div class="flex justify-between">
                            <a href="{{ url('/') }}" class="flex-1 mr-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium px-6 py-3 rounded-lg text-center transition-all duration-300">
                                Halaman Utama
                            </a>
                            <button onclick="window.history.back()" class="flex-1 ml-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium px-6 py-3 rounded-lg text-center transition-all duration-300">
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-gray-50 px-8 py-4 text-center md:text-right text-gray-500 text-sm border-t border-gray-100">
            <p>Jika Anda yakin bahwa ini adalah kesalahan, silakan <a href="mailto:support@perpustakaandigital.com" class="text-blue-600 hover:underline">hubungi kami</a>.</p>
        </div>
    </div>
</div>

<!-- Custom Animation for 404 Page -->
<style>
    @keyframes float {
        0% { transform: translateY(0px) rotate(-15deg); }
        50% { transform: translateY(-10px) rotate(-12deg); }
        100% { transform: translateY(0px) rotate(-15deg); }
    }
    
    @keyframes float2 {
        0% { transform: translateY(0px) rotate(3deg); }
        50% { transform: translateY(-5px) rotate(5deg); }
        100% { transform: translateY(0px) rotate(3deg); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    .animate-float2 {
        animation: float2 2.5s ease-in-out infinite;
    }
    
    /* Apply animations to books */
    .transform.rotate-12 {
        animation: float 3s ease-in-out infinite;
    }
    
    .transform.-rotate-6 {
        animation: float2 4s ease-in-out infinite;
    }
    
    .transform.rotate-3 {
        animation: float 3.5s ease-in-out infinite 0.5s;
    }
    
    .transform.-rotate-15 {
        animation: float2 3s ease-in-out infinite 1s;
    }
</style>
@endsection
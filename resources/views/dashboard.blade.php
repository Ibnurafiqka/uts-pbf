@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Dashboard Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Dashboard Penyewa
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Kelola penyewaan dan temukan buku baru untuk disewa
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>!
                        </h3>
                        <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p>Jelajahi koleksi buku kami dan mulai menyewa buku favorit Anda.</p>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                        <a href="{{ url('/catalog') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-book-open mr-2"></i>
                            Lihat Katalog
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 mb-6">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Buku Disewa
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        2
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="text-sm">
                        <a href="#active-rentals" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Lihat semua
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Tenggat Terdekat
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        3 hari lagi
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="text-sm">
                        <a href="#active-rentals" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Lihat detail
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <i class="fas fa-coins text-white"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Denda
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        Rp 0
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Lihat riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Rentals -->
        <div id="active-rentals" class="bg-white shadow overflow-hidden sm:rounded-md mb-6">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Buku Yang Sedang Disewa
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Buku yang sedang Anda sewa saat ini
                </p>
            </div>
            <ul role="list" class="divide-y divide-gray-200">
                <li>
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-20 w-14 bg-gray-100 overflow-hidden rounded">
                                    <img class="h-full w-full object-cover" src="/images/library/covers/harry-potter.png" alt="Book cover">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-indigo-600 truncate">
                                        Harry Potter dan Batu Bertuah
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Penulis: J.K. Rowling
                                    </p>
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                </div>
                            </div>
                            <div class="ml-2 flex-shrink-0 flex flex-col items-end">
                                <p class="text-sm text-gray-500">Jatuh tempo: <span class="font-medium">17 Mei 2025</span></p>
                                <button class="mt-2 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Perpanjang
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-20 w-14 bg-gray-100 overflow-hidden rounded">
                                    <img class="h-full w-full object-cover" src="/images/library/covers/laskar-pelangi.jpg" alt="Book cover">
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-indigo-600 truncate">
                                        Laskar Pelangi
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Penulis: Andrea Hirata
                                    </p>
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        3 hari tersisa
                                    </span>
                                </div>
                            </div>
                            <div class="ml-2 flex-shrink-0 flex flex-col items-end">
                                <p class="text-sm text-gray-500">Jatuh tempo: <span class="font-medium">18 Mei 2025</span></p>
                                <button class="mt-2 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Perpanjang
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Available Books Section -->
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
            Buku Yang Tersedia Untuk Disewa
        </h3>
        
        <!-- Filters -->
        <div class="bg-white shadow rounded-lg p-4 mb-6">
            <div class="md:flex md:justify-between md:items-center">
                <div class="mb-2 md:mb-0">
                    <label for="categories" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="categories" name="categories" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Semua Kategori</option>
                        <option>Fiksi</option>
                        <option>Non-Fiksi</option>
                        <option>Pendidikan</option>
                        <option>Sastra</option>
                        <option>Fantasi</option>
                    </select>
                </div>
                
                <div class="relative flex items-center w-full md:w-64">
                    <input type="text" placeholder="Cari judul atau penulis..." class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2 pl-10 pr-3 sm:text-sm border-gray-300 rounded-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Book Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Book 1 -->
            <div class="bg-white rounded-lg border overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img class="w-full h-full object-cover" src="/images/library/covers/bumi-manusia.jpeg" alt="Book cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Bumi Manusia</h3>
                            <p class="mt-1 text-xs text-gray-500">Pramoedya Ananta Toer</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Tersedia
                        </span>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500 line-clamp-2">Novel sejarah yang menceritakan tentang perjuangan Minke pada masa kolonial Belanda.</p>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-xs text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i> 4.8
                            </span>
                        </div>
                        <button class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sewa Buku
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Book 2 -->
            <div class="bg-white rounded-lg border overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img class="w-full h-full object-cover" src="/images/library/covers/filosofi-teras.jpg" alt="Book cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Filosofi Teras</h3>
                            <p class="mt-1 text-xs text-gray-500">Henry Manampiring</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Tersedia
                        </span>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500 line-clamp-2">Buku tentang filosofi Stoa yang mengajarkan kita untuk mengendalikan emosi dan fokus pada hal yang dapat kita kontrol.</p>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-xs text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i> 4.6
                            </span>
                        </div>
                        <button class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sewa Buku
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Book 3 -->
            <div class="bg-white rounded-lg border overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img class="w-full h-full object-cover" src="/images/library/covers/hujan.jpg" alt="Book cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Hujan</h3>
                            <p class="mt-1 text-xs text-gray-500">Tere Liye</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Tersedia
                        </span>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500 line-clamp-2">Novel yang mengisahkan perjalanan hidup seorang gadis bernama Lail yang selamat dari bencana.</p>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-xs text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i> 4.7
                            </span>
                        </div>
                        <button class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sewa Buku
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Book 4 -->
            <div class="bg-white rounded-lg border overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img class="w-full h-full object-cover" src="/images/library/covers/laut-bercerita.jpg" alt="Book cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Laut Bercerita</h3>
                            <p class="mt-1 text-xs text-gray-500">Leila S. Chudori</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Tersedia
                        </span>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500 line-clamp-2">Novel tentang aktivis mahasiswa yang menentang rezim Orde Baru pada tahun 1990-an.</p>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-xs text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i> 4.9
                            </span>
                        </div>
                        <button class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sewa Buku
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Book 5 -->
            <div class="bg-white rounded-lg border overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img class="w-full h-full object-cover" src="/images/library/covers/atomic-habit.jpg" alt="Book cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Atomic Habits</h3>
                            <p class="mt-1 text-xs text-gray-500">James Clear</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Tersedia
                        </span>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500 line-clamp-2">Panduan praktis untuk mengembangkan kebiasaan baik dan menghilangkan kebiasaan buruk.</p>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-xs text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i> 4.8
                            </span>
                        </div>
                        <button class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sewa Buku
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Book 6 -->
            <div class="bg-white rounded-lg border overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img class="w-full h-full object-cover" src="/images/library/covers/sapiens.jpg" alt="Book cover">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Sapiens</h3>
                            <p class="mt-1 text-xs text-gray-500">Yuval Noah Harari</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Terbatas
                        </span>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500 line-clamp-2">Buku yang mengeksplorasi sejarah manusia dari munculnya homo sapiens hingga masa kini.</p>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-xs text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i> 4.7
                            </span>
                        </div>
                        <button class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sewa Buku
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 mt-6 rounded-lg shadow">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </a>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">6</span>
                        of
                        <span class="font-medium">24</span>
                        results
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                            ...
                        </span>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            8
                        </a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
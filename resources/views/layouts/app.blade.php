<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Website</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        /* Filament-style colors */
        :root {
            --primary: rgb(79, 70, 229);
            --primary-hover: rgb(67, 56, 202);
            --primary-50: rgb(238, 242, 255);
            --primary-100: rgb(224, 231, 255);
            --primary-200: rgb(199, 210, 254);
            --primary-300: rgb(165, 180, 252);
            --primary-400: rgb(129, 140, 248);
            --primary-500: rgb(99, 102, 241);
            --primary-600: rgb(79, 70, 229);
            --primary-700: rgb(67, 56, 202);
            --primary-800: rgb(55, 48, 163);
            --primary-900: rgb(49, 46, 129);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }

        .filament-bg-primary {
            background-color: var(--primary);
        }
        
        .filament-text-primary {
            color: var(--primary);
        }
        
        .filament-hover:hover {
            background-color: var(--primary-50);
        }
        
        .filament-ring-primary:focus {
            outline: 2px solid var(--primary-300);
            outline-offset: 2px;
        }
        
        /* Dark mode toggle styles */
        .dark-mode-toggle {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }
        
        .dark-mode-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        
        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .toggle-slider {
            background-color: var(--primary);
        }
        
        input:checked + .toggle-slider:before {
            transform: translateX(24px);
        }
        
        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            min-width: 220px;
            z-index: 10;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-blue-50 to-white text-gray-800">
    <!-- Filament-style Navbar -->
    <nav class="bg-white border-b border-gray-200">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo and Main Nav -->
                <div class="flex items-center">
                    <div class="flex justify-center">
                        @include('filament.admin.logo')
                    </div>
                    
                    <div class="hidden md:block ml-10 flex-1 space-x-8">
                        <a href="{{ route('catalog.index') }}" class="font-medium text-slate-600 hover:text-primary transition-colors">
                            Catalog
                        </a>
                        <a href="#" class="font-medium text-slate-600 hover:text-primary transition-colors">
                            Dashboard
                        </a>
                        <a href="#" class="font-medium text-slate-600 hover:text-primary transition-colors">
                            Products
                        </a>
                        <a href="#" class="font-medium text-slate-600 hover:text-primary transition-colors">
                            Reports
                        </a>
                    </div>
                </div>
                
                <!-- Right Side Nav Items -->
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden md:block relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Search..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-primary focus:border-primary text-sm">
                    </div>
                    
                    <!-- Dark mode toggle -->
                    <div class="flex items-center">
                        <label class="dark-mode-toggle">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="p-1 rounded-full text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-primary">
                            <span class="sr-only">View notifications</span>
                            <i class="fas fa-bell"></i>
                        </button>
                        <!-- Notification indicator -->
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-400"></span>
                    </div>
                    
                    <!-- User profile dropdown -->
                    @auth
                    <div class="dropdown">
                        <button class="flex items-center space-x-2 text-sm font-medium text-gray-700 filament-hover px-3 py-2 rounded-md">
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>
                        <div class="dropdown-content mt-2 py-1">
                            <div class="px-4 py-2 text-xs text-gray-400">Manage Account</div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 filament-hover">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 filament-hover">Settings</a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 filament-hover">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left text-red-500">Log out</button>
                                </form>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-primary">Login</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-700">Register</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state -->
        <div class="md:hidden border-t border-gray-200 p-2" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('catalog.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 filament-hover">
                    Catalog
                </a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 filament-hover">
                    Dashboard
                </a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 filament-hover">
                    Products
                </a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 filament-hover">
                    Reports
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <footer class="bg-white text-center py-4 mt-10 shadow-inner border-t border-gray-200">
        <p class="text-sm text-gray-500">&copy; {{ date('Y') }} MyWebsite. All rights reserved.</p>
    </footer>

    <script>
        // Toggle mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('#mobile-menu-button');
            const mobileMenu = document.querySelector('#mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
            
            // Dark mode toggle functionality
            const darkModeToggle = document.querySelector('.dark-mode-toggle input');
            if (darkModeToggle) {
                darkModeToggle.addEventListener('change', function() {
                    document.body.classList.toggle('dark');
                });
            }
        });
    </script>
</body>
</html>
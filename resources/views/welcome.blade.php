<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library - Discover Knowledge</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#1e40af',
                        accent: '#3b82f6',
                        dark: '#0f172a',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .carousel-container {
            overflow: hidden;
            position: relative;
        }
        
        .carousel {
            display: flex;
            transition: transform 0.5s ease;
        }
        
        .carousel-item {
            min-width: 100%;
        }
        
        .gradient-overlay {
            background: linear-gradient(to right, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.5));
        }
        
        .hero-pattern {
            background-image: radial-gradient(rgba(37, 99, 235, 0.1) 2px, transparent 2px);
            background-size: 30px 30px;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .book-card {
            transition: all 0.3s ease;
        }
        
        .book-card:hover {
            transform: scale(1.03);
        }
        
        .feature-icon {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: rotate(10deg);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="text-primary">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                    <div class="text-xl font-bold text-dark">Digi<span class="text-primary">Library</span></div>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url ('/') }}" class="font-medium text-slate-600 hover:text-primary transition-colors">Home</a>
                    <a href="{{ route('catalog.index') }}" class="font-medium text-slate-600 hover:text-primary transition-colors">Catalog</a>
                    <a href="#" class="font-medium text-slate-600 hover:text-primary transition-colors">Services</a>
                    <a href="#" class="font-medium text-slate-600 hover:text-primary transition-colors">About</a>
                    <a href="#" class="font-medium text-slate-600 hover:text-primary transition-colors">Contact</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="hidden md:block px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition-colors">
                            Sign In
                        </a>
                    @endguest
                
                    @auth
                        <div class="hidden md:block text-sm text-gray-700">
                            Hello, {{ Auth::user()->name }} 👋 
                        </div>
                    @endauth
                
                    <button id="mobile-menu-button" class="md:hidden text-slate-500 hover:text-slate-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>                
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4">
                <a href="{{ url ('/') }}" class="block py-2 text-slate-600 hover:text-primary transition-colors">Home</a>
                <a href="{{ route('catalog.index') }}" class="block py-2 text-slate-600 hover:text-primary transition-colors">Catalog</a>
                <a href="#" class="block py-2 text-slate-600 hover:text-primary transition-colors">Services</a>
                <a href="#" class="block py-2 text-slate-600 hover:text-primary transition-colors">About</a>
                <a href="#" class="block py-2 text-slate-600 hover:text-primary transition-colors">Contact</a>
                <a href="#" class="block py-2 mt-2 text-center bg-primary text-white rounded-lg hover:bg-secondary transition-colors">
                    Sign In
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section with Carousel -->
    <section class="pt-24 pb-16 bg-dark hero-pattern" id="home">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-1/2 mb-12 lg:mb-0" data-aos="fade-right">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        Discover Knowledge in the <span class="text-primary">Digital Age</span>
                    </h1>
                    <p class="text-lg text-slate-300 mb-8">
                        Your gateway to a world of information, innovation, and imagination. Access thousands of books, journals, and resources with just a few clicks.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('catalog.index') }}" class="px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-secondary transition-colors">
                            Explore Catalog
                        </a>
                        <a href="#" class="px-6 py-3 bg-transparent border border-white text-white font-medium rounded-lg hover:bg-white/10 transition-colors">
                            Learn More
                        </a>
                    </div>
                </div>
                
                <div class="w-full lg:w-1/2" data-aos="fade-left">
                    <div class="carousel-container rounded-2xl shadow-2xl overflow-hidden">
                        <div class="carousel">
                            <div class="carousel-item relative">
                                <div class="gradient-overlay absolute inset-0"></div>
                                <img src="/images/library/covers/bumi.jpg" alt="Book Cover" class="w-full h-80 object-cover">
                                <div class="absolute bottom-6 left-6 text-white">
                                    <h3 class="text-2xl font-bold">Modern Library Experience</h3>
                                    <p class="text-slate-200">Advanced digital catalog system</p>
                                </div>
                            </div>
                            <div class="carousel-item relative">
                                <div class="gradient-overlay absolute inset-0"></div>
                                <img src="/images/library/covers/bulan.jpg" alt="Book Cover" class="w-full h-80 object-cover">
                                <div class="absolute bottom-6 left-6 text-white">
                                    <h3 class="text-2xl font-bold">Digital Resources</h3>
                                    <p class="text-slate-200">E-books, journals, and multimedia</p>
                                </div>
                            </div>
                            <div class="carousel-item relative">
                                <div class="gradient-overlay absolute inset-0"></div>
                                <img src="/images/library/covers/matahari.jpg" alt="Book Cover" class="w-full h-80 object-cover">
                                <div class="absolute bottom-6 left-6 text-white">
                                    <h3 class="text-2xl font-bold">Innovative Learning Spaces</h3>
                                    <p class="text-slate-200">Collaborative environments for growth</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-prev absolute top-1/2 left-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-next absolute top-1/2 right-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div class="carousel-indicators absolute bottom-2 left-1/2 -translate-x-1/2 flex space-x-2">
                            <button class="carousel-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors active"></button>
                            <button class="carousel-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                            <button class="carousel-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/3 px-4 mb-8 md:mb-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card p-6 bg-white rounded-xl shadow-lg border border-slate-100 text-center transition-all duration-300">
                        <div class="text-primary mb-4">
                            <i class="fas fa-book text-4xl"></i>
                        </div>
                        <h3 class="text-5xl font-bold mb-2 text-slate-800 counter">25,000+</h3>
                        <p class="text-lg text-slate-600">Books & Resources</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8 md:mb-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card p-6 bg-white rounded-xl shadow-lg border border-slate-100 text-center transition-all duration-300">
                        <div class="text-primary mb-4">
                            <i class="fas fa-users text-4xl"></i>
                        </div>
                        <h3 class="text-5xl font-bold mb-2 text-slate-800 counter">12,500+</h3>
                        <p class="text-lg text-slate-600">Active Members</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card p-6 bg-white rounded-xl shadow-lg border border-slate-100 text-center transition-all duration-300">
                        <div class="text-primary mb-4">
                            <i class="fas fa-download text-4xl"></i>
                        </div>
                        <h3 class="text-5xl font-bold mb-2 text-slate-800 counter">5,000+</h3>
                        <p class="text-lg text-slate-600">Monthly Downloads</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Featured Books Section -->
    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">Featured Collections</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Discover our specially curated selection of books and resources that are trending among our readers.</p>
            </div>
            
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                        <img src="/images/library/covers/bintang.jpg" alt="Book Cover" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg">The Digital Horizon</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">New</span>
                            </div>
                            <p class="text-slate-600 text-sm mb-4">By Emily Chen</p>
                            <div class="flex justify-between items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <a href="#" class="text-primary font-medium hover:underline">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                        <img src="/images/library/covers/ceroz dan batozar.jpg" alt="Book Cover" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg">Quantum Computing</h3>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">Popular</span>
                            </div>
                            <p class="text-slate-600 text-sm mb-4">By Dr. James Wilson</p>
                            <div class="flex justify-between items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a href="#" class="text-primary font-medium hover:underline">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                        <img src="/images/library/covers/komet.jpg" alt="Book Cover" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg">Art of Innovation</h3>
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">Featured</span>
                            </div>
                            <p class="text-slate-600 text-sm mb-4">By Sarah Johnson</p>
                            <div class="flex justify-between items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="text-primary font-medium hover:underline">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8" data-aos="fade-up" data-aos-delay="400">
                    <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                        <img src="/images/library/covers/komet-minor.jpg" alt="Book Cover" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg">Data Science Principles</h3>
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2 py-1 rounded">Bestseller</span>
                            </div>
                            <p class="text-slate-600 text-sm mb-4">By Michael Brown</p>
                            <div class="flex justify-between items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="text-primary font-medium hover:underline">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('catalog.index') }}" class="px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-secondary transition-colors inline-flex items-center">
                    View Complete Catalog
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">Modern Library Features</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Experience a next-generation library system with innovative features designed for the digital age.</p>
            </div>
            
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card p-6 bg-white rounded-xl border border-slate-100 shadow-md h-full transition-all duration-300 hover:shadow-lg">
                        <div class="feature-icon inline-block p-4 bg-blue-100 text-primary rounded-full mb-6">
                            <i class="fas fa-search text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Advanced Search</h3>
                        <p class="text-slate-600">Find exactly what you're looking for with our powerful search engine that filters by categories, authors, and keywords.</p>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card p-6 bg-white rounded-xl border border-slate-100 shadow-md h-full transition-all duration-300 hover:shadow-lg">
                        <div class="feature-icon inline-block p-4 bg-green-100 text-green-600 rounded-full mb-6">
                            <i class="fas fa-mobile-alt text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Mobile Access</h3>
                        <p class="text-slate-600">Access your library account, resources, and e-books from anywhere using our mobile-friendly platform.</p>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card p-6 bg-white rounded-xl border border-slate-100 shadow-md h-full transition-all duration-300 hover:shadow-lg">
                        <div class="feature-icon inline-block p-4 bg-purple-100 text-purple-600 rounded-full mb-6">
                            <i class="fas fa-bell text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Smart Notifications</h3>
                        <p class="text-slate-600">Get timely reminders about due dates, reservations, and personalized recommendations.</p>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card p-6 bg-white rounded-xl border border-slate-100 shadow-md h-full transition-all duration-300 hover:shadow-lg">
                        <div class="feature-icon inline-block p-4 bg-red-100 text-red-600 rounded-full mb-6">
                            <i class="fas fa-bookmark text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Digital Bookmarks</h3>
                        <p class="text-slate-600">Save your favorite books, articles, and resources for quick access and organization.</p>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card p-6 bg-white rounded-xl border border-slate-100 shadow-md h-full transition-all duration-300 hover:shadow-lg">
                        <div class="feature-icon inline-block p-4 bg-yellow-100 text-yellow-600 rounded-full mb-6">
                            <i class="fas fa-history text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Loan History</h3>
                        <p class="text-slate-600">Keep track of your reading history with a comprehensive loan record and reading statistics.</p>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card p-6 bg-white rounded-xl border border-slate-100 shadow-md h-full transition-all duration-300 hover:shadow-lg">
                        <div class="feature-icon inline-block p-4 bg-indigo-100 text-indigo-600 rounded-full mb-6">
                            <i class="fas fa-laptop text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Virtual Reading Rooms</h3>
                        <p class="text-slate-600">Join digital reading groups and participate in discussions from the comfort of your home.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-blue-700 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-2/3 mb-10 lg:mb-0" data-aos="fade-right">
                    <h2 class="text-3xl font-bold mb-6">Ready to Transform Your Reading Experience?</h2>
                    <p class="text-lg text-blue-100 mb-8">Join thousands of readers who have already discovered the benefits of our digital library system. Register today and get access to our entire collection.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-primary font-semibold rounded-lg hover:bg-blue-50 transition-colors">
                            Register Now
                        </a>
                        <a href="#" class="px-8 py-3 bg-transparent border border-white text-white font-semibold rounded-lg hover:bg-white/10 transition-colors">
                            Take a Tour
                        </a>
                    </div>
                </div>
                
                <div class="w-full lg:w-1/3 text-center" data-aos="fade-left">
                    <div class="relative">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-64 bg-blue-400 rounded-full filter blur-3xl opacity-20"></div>
                        <img src="/images/library/banners/digital-reading.jpg" alt="Digital Reading" class="floating relative mx-auto max-w-full rounded-xl shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">What Our Members Say</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Discover how our digital library system has transformed the learning experience for people like you.</p>
            </div>
            
            <div class="testimonial-slider relative">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-6 bg-white rounded-xl shadow-md border border-slate-100">
                            <div class="flex text-yellow-400 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-slate-600 mb-6 italic">"The digital library system has completely changed how I access information. I love being able to access my books from anywhere."</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="/images/library/avatars/user-1.png" alt="User" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold">David Lee</h4>
                                    <p class="text-sm text-slate-500">Student</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full md:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                        <div class="p-6 bg-white rounded-xl shadow-md border border-slate-100">
                            <div class="flex text-yellow-400 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="text-slate-600 mb-6 italic">"The recommendation system is surprisingly accurate. I've discovered so many great books I would have never found otherwise. Definitely worth the subscription!"</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="/images/library/avatars/user-2.jpg" alt="User" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold">Sarah Clarence</h4>
                                    <p class="text-sm text-slate-500">Book Enthusiast</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                        <div class="p-6 bg-white rounded-xl shadow-md border border-slate-100">
                            <div class="flex text-yellow-400 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-slate-600 mb-6 italic">"The recommendation system is surprisingly accurate. I've discovered so many great books I would have never found otherwise. Definitely worth the subscription!"</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="/images/library/avatars/user-3.jpg" alt="User" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold">Michelle Patel</h4>
                                    <p class="text-sm text-slate-500">CEO Grownium</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Newsletter Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-slate-900 rounded-2xl overflow-hidden shadow-xl" data-aos="zoom-in">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 p-12">
                        <h2 class="text-3xl font-bold text-white mb-4">Stay Updated</h2>
                        <p class="text-slate-300 mb-8">Subscribe to our newsletter to receive the latest updates on new arrivals, events, and exclusive content.</p>
                        <form class="space-y-4">
                            <div>
                                <input type="text" placeholder="Your Name" class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-700 text-white focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <input type="email" placeholder="Your Email" class="w-full px-4 py-3 rounded-lg bg-slate-800 border border-slate-700 text-white focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <button type="submit" class="w-full px-4 py-3 bg-primary text-white font-medium rounded-lg hover:bg-secondary transition-colors">
                                    Subscribe Now
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="hidden lg:block w-1/2 relative">
                        <img src="/images/library/banners/stay-update.jpeg" alt="Newsletter" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-slate-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4 mb-8">
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="text-primary">
                            <i class="fas fa-book-open text-2xl"></i>
                        </div>
                        <div class="text-xl font-bold">Digi<span class="text-primary">Library</span></div>
                    </div>
                    <p class="text-slate-400 mb-6">Your gateway to knowledge in the digital age. Access thousands of resources anytime, anywhere.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <h3 class="text-lg font-bold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Services</a></li>
                        <li><a href="{{ route('catalog.index') }}" class="text-slate-400 hover:text-white transition-colors">Catalog</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <h3 class="text-lg font-bold mb-6">Resources</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">E-Books</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Journals</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Research Papers</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Multimedia</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Archives</a></li>
                    </ul>
                </div>
                
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <h3 class="text-lg font-bold mb-6">Contact Us</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary"></i>
                            <span class="text-slate-400">Jl. Arief Rahman Hakim No.100 </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-primary"></i>
                            <span class="text-slate-400">+62 857-3104-0360</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-primary"></i>
                            <span class="text-slate-400">digibook@library.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-primary"></i>
                            <span class="text-slate-400">Senin-Jum'at, 08:00-17:00</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-slate-800 text-center">
                <p class="text-slate-400">&copy; 2025 DigiLibrary. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Carousel functionality
        const carousel = document.querySelector('.carousel');
        const carouselItems = document.querySelectorAll('.carousel-item');
        const prevButton = document.querySelector('.carousel-prev');
        const nextButton = document.querySelector('.carousel-next');
        const indicators = document.querySelectorAll('.carousel-indicator');
        let currentSlide = 0;
        
        function updateCarousel() {
            const offset = -currentSlide * 100;
            carousel.style.transform = `translateX(${offset}%)`;
            
            // Update indicators
            indicators.forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.add('bg-white');
                    indicator.classList.remove('bg-white/50');
                } else {
                    indicator.classList.remove('bg-white');
                    indicator.classList.add('bg-white/50');
                }
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % carouselItems.length;
            updateCarousel();
        }
        
        function prevSlide() {
            currentSlide = (currentSlide - 1 + carouselItems.length) % carouselItems.length;
            updateCarousel();
        }
        
        prevButton.addEventListener('click', prevSlide);
        nextButton.addEventListener('click', nextSlide);
        
        // Add click event to indicators
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                updateCarousel();
            });
        });
        
        // Auto slide
        let autoSlideInterval = setInterval(nextSlide, 5000);
        
        // Pause auto slide on hover
        carousel.parentElement.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });
        
        carousel.parentElement.addEventListener('mouseleave', () => {
            autoSlideInterval = setInterval(nextSlide, 5000);
        });
        
        // Counter animation
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const value = counter.textContent;
            counter.textContent = '0';
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(counter, value);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(counter);
        });
        
        function animateCounter(counter, finalValue) {
            // Handle values with "+" symbol at the end
            let isPlus = false;
            let numericValue = finalValue;
            
            if (finalValue.endsWith('+')) {
                isPlus = true;
                numericValue = finalValue.slice(0, -1);
            }
            
            // Remove commas for calculation
            numericValue = parseInt(numericValue.replace(/,/g, ''));
            
            let startValue = 0;
            let duration = 2000;
            let increment = numericValue / (duration / 16);
            
            let timer = setInterval(() => {
                startValue += increment;
                
                if (startValue >= numericValue) {
                    counter.textContent = finalValue;
                    clearInterval(timer);
                } else {
                    // Format with comma for thousands
                    counter.textContent = Math.floor(startValue).toLocaleString() + (isPlus ? '+' : '');
                }
            }, 16);
        }
        
        // Add floating animation to stats on hover
        const statCards = document.querySelectorAll('.stat-card');
        
        statCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.classList.add('floating');
            });
            
            card.addEventListener('mouseleave', () => {
                card.classList.remove('floating');
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50
        flex flex-col min-h-screen">
    
        <!-- Navbar -->
    <nav class="bg-gradient-to-r from-gray-900 to-gray-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo -->
                <a href="#" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-30 w-auto pt-4">
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#" class="hover:text-red-500 transition text-sm font-semibold italic">Home</a>
                    <a href="#" class="hover:text-red-500 transition text-sm font-semibold italic">Products</a>
                    <a href="#" class="hover:text-red-500 transition text-sm font-semibold italic">About Us</a>
                    <a href="#" class="hover:text-red-500 transition text-sm font-semibold italic">Contact</a>
                    <a href="{{ url('/login') }}" class="hover:text-red-500 transition text-sm font-semibold italic">Join Our Community</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white focus:outline-none" x-data="{ open: false }" @click="open = !open">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
    
    <!-- Search Bar -->
    <div class="bg-gradient-to-r from-gray-800 to-gray-700 text-white py-3 sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-3">
                <form method="GET" action="#" class="flex-1 flex gap-2">
                    <input type="text" name="query" placeholder="Cari..."
                        value="{{ request('query', '') }}"
                        class="flex-1 px-4 py-2 rounded bg-gray-600 text-white text-sm placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 transition px-3 py-2 rounded">
                        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                                    stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                    </button>
                </form>
                
                <!-- Cart Button -->
                <a href="#"
                    class="relative flex items-center px-3 py-2 bg-red-500 hover:bg-red-600 transition rounded">
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span
                        class="absolute -top-2 -right-2 bg-yellow-400 text-gray-900 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                        {{ session('cart_count', 0) }}
                    </span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <main class="flex-1">
        <div>
            
            <!-- Page Content -->
            @yield('content')
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 to-gray-800 text-gray-300 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                
                <!-- About Section -->
                <div>
                    <h3 class="text-white text-lg font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-cube"></i>
                        Diecast Shop
                    </h3>
                    <p class="text-sm mb-4">Your premium destination for quality diecast models and collectibles.
                        Discover rare and exclusive pieces for collectors worldwide.</p>
                    <div class="flex gap-3">
                        <a href="https://facebook.com" target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-700 hover:bg-red-500 transition flex items-center justify-center"
                            title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-700 hover:bg-red-500 transition flex items-center justify-center"
                            title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-700 hover:bg-red-500 transition flex items-center justify-center"
                            title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://youtube.com" target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-700 hover:bg-red-500 transition flex items-center justify-center"
                            title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-red-500 transition">Home</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">Products</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">About Us</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">Contact</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Customer Service -->
                <div>
                    <h4 class="text-white font-bold mb-4">Customer Service</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-red-500 transition">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">Returns Policy</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">Terms & Conditions</a></li>
                        <li><a href="#" class="hover:text-red-500 transition">Support</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-white font-bold mb-4">Get In Touch</h4>
                    <div class="space-y-3 text-sm">
                        <p>
                            <i class="fas fa-map-marker-alt text-red-500 w-5 mr-2"></i>
                            123 Model Street, Collector City, CC 12345
                        </p>
                        <p>
                            <i class="fas fa-phone text-red-500 w-5 mr-2"></i>
                            +1 (555) 123-4567
                        </p>
                        <p>
                            <i class="fas fa-envelope text-red-500 w-5 mr-2"></i>
                            <a href="mailto:info@diecastshop.com"
                                class="hover:text-red-500 transition">info@diecastshop.com</a>
                        </p>
                        <p>
                            <i class="fas fa-clock text-red-500 w-5 mr-2"></i>
                            Mon-Fri: 9AM-6PM EST<br class="ml-7">
                            Sat-Sun: 10AM-4PM EST
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="border-t border-gray-700 pt-8">
                <div class="text-center mb-4">
                    <p class="text-sm">© 2026 Garage64 All rights reserved. | Designed with love for collectors</p>
                </div>
                <div class="text-center flex gap-3 justify-center text-2xl">
                    <i class="fab fa-cc-visa hover:text-red-500 transition cursor-pointer"></i>
                    <i class="fab fa-cc-mastercard hover:text-red-500 transition cursor-pointer"></i>
                    <i class="fab fa-cc-paypal hover:text-red-500 transition cursor-pointer"></i>
                    <i class="fab fa-cc-amex hover:text-red-500 transition cursor-pointer"></i>
                </div>
            </div>
        </div>
    </footer>
    </body>

</html>

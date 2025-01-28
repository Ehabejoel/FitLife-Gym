<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife - Premium Fitness & Wellness Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .gradient-text {
            background: linear-gradient(90deg, #4F46E5, #818CF8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <!-- Fixed Navigation -->
    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex items-center">
                        <span class="text-2xl font-bold gradient-text">FitLife</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#about" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">About</a>
                    <a href="#contact" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">Contact</a>
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Sign In</a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-full font-medium hover:bg-indigo-700 transition-colors">
                        Join Now
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section min-h-screen flex items-center text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="max-w-3xl" data-aos="fade-right">
                <h1 class="text-6xl font-bold leading-tight mb-6">
                    Transform Your Life Through <span class="text-indigo-400">Fitness</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8">
                    Join the ultimate fitness experience with state-of-the-art facilities, expert trainers, and a supportive community.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#pricing" class="bg-indigo-600 text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-indigo-700 transition-colors text-center">
                        Get Started
                    </a>
                    <a href="#virtual-tour" class="bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white/20 transition-colors text-center">
                        Take Virtual Tour
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="relative -mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-bold text-indigo-600 mb-2">5,000+</div>
                    <div class="text-gray-600">Active Members</div>
                </div>
                <div class="bg-white rounded-2xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-bold text-indigo-600 mb-2">50+</div>
                    <div class="text-gray-600">Expert Trainers</div>
                </div>
                <div class="bg-white rounded-2xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-bold text-indigo-600 mb-2">100+</div>
                    <div class="text-gray-600">Weekly Classes</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Classes Section -->
    <section id="classes" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Premium Fitness Classes</h2>
                <p class="text-xl text-gray-600">Choose from a variety of programs designed for every fitness level</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow" data-aos="fade-up">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1534367507873-d2d7e24c797f?auto=format&fit=crop&w=800" 
                             alt="Strength Training" 
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Strength Training</h3>
                        <p class="text-gray-600 mb-4">Build muscle and improve your strength with expert guidance</p>
                        <a href="#schedule" class="text-indigo-600 font-medium hover:text-indigo-700">View Schedule →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow" data-aos="fade-up">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1601422407692-ec4eeec1d9b3?auto=format&fit=crop&w=800" 
                             alt="HIIT Workouts" 
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">HIIT Workouts</h3>
                        <p class="text-gray-600 mb-4">High-intensity interval training for maximum results</p>
                        <a href="#schedule" class="text-indigo-600 font-medium hover:text-indigo-700">View Schedule →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow" data-aos="fade-up">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1575052814086-f385e2e2ad1b?auto=format&fit=crop&w=800" 
                             alt="Yoga & Meditation" 
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Yoga & Meditation</h3>
                        <p class="text-gray-600 mb-4">Find balance and inner peace through mindful practice</p>
                        <a href="#schedule" class="text-indigo-600 font-medium hover:text-indigo-700">View Schedule →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow" data-aos="fade-up">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1549576490-b0b4831ef60a?auto=format&fit=crop&w=800" 
                             alt="Cardio Boxing" 
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Cardio Boxing</h3>
                        <p class="text-gray-600 mb-4">High-energy boxing workouts for all skill levels</p>
                        <a href="#schedule" class="text-indigo-600 font-medium hover:text-indigo-700">View Schedule →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow" data-aos="fade-up">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?auto=format&fit=crop&w=800" 
                             alt="CrossFit" 
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">CrossFit</h3>
                        <p class="text-gray-600 mb-4">Challenge yourself with varied functional movements</p>
                        <a href="#schedule" class="text-indigo-600 font-medium hover:text-indigo-700">View Schedule →</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow" data-aos="fade-up">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1534258936925-c58bed479fcb?auto=format&fit=crop&w=800" 
                             alt="Spin Classes" 
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Spin Classes</h3>
                        <p class="text-gray-600 mb-4">Intense cardio workouts on state-of-the-art bikes</p>
                        <a href="#schedule" class="text-indigo-600 font-medium hover:text-indigo-700">View Schedule →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Success Stories</h2>
                <p class="text-xl text-gray-400">Hear from our satisfied members</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-800 rounded-2xl p-8" data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?auto=format&fit=crop&w=100" 
                             alt="Sarah Johnson" 
                             class="w-16 h-16 rounded-full object-cover">
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">Sarah Johnson</h3>
                            <p class="text-indigo-400">Lost 30 lbs in 6 months</p>
                        </div>
                    </div>
                    <p class="text-gray-300">"FitLife completely transformed my approach to fitness. The trainers are exceptional, and the community support made all the difference in achieving my goals."</p>
                </div>

                <div class="bg-gray-800 rounded-2xl p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100" 
                             alt="Michael Chen" 
                             class="w-16 h-16 rounded-full object-cover">
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">Michael Chen</h3>
                            <p class="text-indigo-400">Gained 15 lbs muscle</p>
                        </div>
                    </div>
                    <p class="text-gray-300">"The personalized training programs and state-of-the-art equipment helped me build strength and confidence. Best investment in myself ever!"</p>
                </div>

                <div class="bg-gray-800 rounded-2xl p-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100" 
                             alt="Emma Rodriguez" 
                             class="w-16 h-16 rounded-full object-cover">
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">Emma Rodriguez</h3>
                            <p class="text-indigo-400">Yoga enthusiast</p>
                        </div>
                    </div>
                    <p class="text-gray-300">"The yoga classes have improved not just my flexibility but my overall well-being. The instructors are knowledgeable and supportive."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Add footer content -->
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            offset: 100,
            once: true
        });
    </script>
</body>
</html>

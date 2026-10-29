<?php
// Simple form handling to keep it strictly single-file and avoid external actions
$successMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email']);
    // In a production environment, this would save to a database or CRM.
    $successMessage = "Thank you, $name! Your premium recipe guide will be sent to $email shortly.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover premium recipes, tailored meal plans, and culinary inspiration with Savor&Spice.">
    <title>Savor&Spice | Premium Recipes & Meal Plans</title>
    
    <!-- Tailwind CSS CDN (Google Ads Compliant - well known, trusted CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
<script id="_waur5o">var _wau = _wau || []; _wau.push(["small", "xipzu75ggb", "r5o"]);</script><script async src="//waust.at/s.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#059669', /* Emerald 600 */
                        primaryDark: '#047857', /* Emerald 700 */
                        accent: '#f59e0b', /* Amber 500 */
                        accentDark: '#d97706', /* Amber 600 */
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <!-- Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-extrabold text-primary tracking-tight">Savor&Spice</span>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#about" class="text-gray-600 hover:text-primary font-medium transition">About Us</a>
                    <a href="#services" class="text-gray-600 hover:text-primary font-medium transition">Services</a>
                    <a href="#testimonials" class="text-gray-600 hover:text-primary font-medium transition">Testimonials</a>
                </nav>
                <div class="hidden md:flex">
                    <a href="#contact" class="bg-primary hover:bg-primaryDark text-white px-5 py-2 rounded-md font-semibold transition shadow-md">Contact Us</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section with Lead Capture -->
    <section class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-10 sm:pt-16">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Master your kitchen with</span>
                            <span class="block text-primary">chef-crafted recipes</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Stop wondering what's for dinner. Get immediate access to our exclusive vault of quick, healthy, and incredibly delicious recipes designed for busy professionals.
                        </p>
                        
                        <!-- Lead Capture Form -->
                        <div class="mt-8 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0 bg-gray-50 p-6 rounded-lg border border-gray-100 shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Download Your Free 7-Day Dinner Plan</h3>
                            
                            <?php if ($successMessage): ?>
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                    <span class="block sm:inline"><?php echo $successMessage; ?></span>
                                </div>
                            <?php else: ?>
                                <form action="" method="POST" class="space-y-3">
                                    <div>
                                        <label for="name" class="sr-only">Full Name</label>
                                        <input type="text" name="name" id="name" required class="block w-full shadow-sm focus:ring-primary focus:border-primary sm:text-sm border-gray-300 rounded-md py-3 px-4 border" placeholder="Your Full Name">
                                    </div>
                                    <div>
                                        <label for="email" class="sr-only">Email Address</label>
                                        <input type="email" name="email" id="email" required class="block w-full shadow-sm focus:ring-primary focus:border-primary sm:text-sm border-gray-300 rounded-md py-3 px-4 border" placeholder="Your Email Address">
                                    </div>
                                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-accent hover:bg-accentDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent transition">
                                        Get Instant Access
                                    </button>
                                    <p class="text-xs text-gray-500 text-center mt-2">We respect your privacy. No spam ever.</p>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <!-- Non-copyright Unsplash Image -->
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Healthy delicious food spread">
        </div>
    </section>

    <!-- About Us -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div>
                    <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1556910103-1c02745a872f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Chef preparing food">
                </div>
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                        About Savor&Spice
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Founded by culinary enthusiasts, Savor&Spice was born from a simple belief: everyone deserves to eat well, no matter how busy life gets. We take the guesswork out of cooking by providing meticulously tested recipes and comprehensive meal plans.
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                        Our team of professional chefs and nutritionists work around the clock to curate flavors that excite the palate while keeping health and convenience at the forefront. Join over 10,000 satisfied home cooks who have transformed their dining tables.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">What We Offer</h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">Everything you need to elevate your home cooking experience.</p>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8 h-full shadow-sm hover:shadow-md transition">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-primary rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Premium Recipe Vault</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Access hundreds of rigorously tested recipes ranging from 15-minute weeknight dinners to impressive weekend feasts.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8 h-full shadow-sm hover:shadow-md transition">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-primary rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Custom Meal Plans</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Stop stressing over grocery lists. Get weekly meal plans tailored to your dietary preferences, complete with automated shopping lists.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8 h-full shadow-sm hover:shadow-md transition">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-primary rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Video Masterclasses</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Watch and learn as our top chefs guide you step-by-step through complex techniques, making them easy for anyone to master.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-16 bg-primaryDark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl mb-12">Loved by Home Cooks</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg p-8 text-left shadow-lg">
                    <div class="flex items-center mb-4 text-accent">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-gray-600 text-lg italic mb-4">"Savor&Spice completely changed our family dinners. The 30-minute meals actually take 30 minutes, and the flavors are incredible. I've never felt more confident in the kitchen!"</p>
                    <p class="font-semibold text-gray-900">- Sarah Jenkins, Seattle, WA</p>
                </div>
                <div class="bg-white rounded-lg p-8 text-left shadow-lg">
                    <div class="flex items-center mb-4 text-accent">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <p class="text-gray-600 text-lg italic mb-4">"The custom meal plans are a lifesaver. I used to spend hours figuring out what to buy and cook. Now, it's all laid out for me, and I'm saving money on groceries too."</p>
                    <p class="font-semibold text-gray-900">- Michael Torres, Austin, TX</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer with Google Ads Trust Signals -->
    <footer id="contact" class="bg-gray-900 pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <span class="text-2xl font-extrabold text-white tracking-tight">Savor&Spice</span>
                    <p class="mt-4 text-gray-400 text-sm">
                        Empowering home cooks with premium recipes, expert guidance, and seamless meal planning.
                    </p>
                </div>
                
                <!-- Contact & Address (Critical Google Ads Trust Signal) -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Savor&Spice Culinary LLC<br>
                            1428 Elm Street, Suite 400<br>
                            Dallas, TX 75201, USA
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            +1 (800) 555-0199
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            support@savorandspice.com
                        </li>
                    </ul>
                </div>

                <!-- Legal (Critical Google Ads Trust Signal) -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#privacy" class="hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#terms" class="hover:text-white transition">Terms of Service</a></li>
                        <li><a href="#refunds" class="hover:text-white transition">Refund Policy</a></li>
                        <li><a href="#disclaimer" class="hover:text-white transition">Disclaimer</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Standard Ads Disclaimer -->
            <div class="border-t border-gray-800 pt-8 mt-8 text-center text-sm text-gray-500">
                <p>&copy; <?php echo date('Y'); ?> Savor&Spice Culinary LLC. All rights reserved.</p>
                <p class="mt-2 text-xs">This site is not a part of the Google website or Google Inc. Additionally, this site is NOT endorsed by Google in any way. GOOGLE is a trademark of GOOGLE Inc.</p>
            </div>
        </div>
    </footer>
</body>
</html>
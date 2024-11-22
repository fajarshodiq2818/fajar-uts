<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ML Gamer Portfolio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        /* Loader Animation */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader-content {
            text-align: center;
        }

        .loader-progress {
            width: 200px;
            height: 4px;
            background: #333;
            border-radius: 4px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
        }

        .loader-bar {
            position: absolute;
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, #ff0000, #ff6b6b);
            animation: loading 2s ease forwards;
        }

        @keyframes loading {
            0% { width: 0%; }
            100% { width: 100%; }
        }

        /* Particle Effect */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            pointer-events: none;
        }

        /* Background Styles */
        .hero-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
                        url("{{ asset('images/bg.jpg') }}");
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        /* Card Effects */
        .hero-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .hero-card:hover::before {
            left: 100%;
        }

        .hero-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 30px rgba(255, 0, 0, 0.2);
        }

        /* Skill Animation */
        .skill-icon {
            position: relative;
            transition: all 0.3s ease;
        }

        .skill-icon:hover {
            transform: scale(1.1);
        }

        .skill-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border-radius: 50%;
            border: 2px solid #FFD700;
            animation: skillPulse 2s infinite;
        }

        @keyframes skillPulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        /* Stats Card */
        .stats-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            background: #0d0d0d;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(transparent, #ff0000);
            border-radius: 4px;
        }

        /* Match History Animation */
        .match-history-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .match-history-item::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
        }

        .match-win::after {
            background: #4CAF50;
            animation: winPulse 2s infinite;
        }

        .match-lose::after {
            background: #f44336;
            animation: losePulse 2s infinite;
        }

        @keyframes winPulse {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }

        @keyframes losePulse {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }

        /* Achievement Badge */
        .achievement-badge {
            position: relative;
            overflow: hidden;
        }

        .achievement-badge::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(transparent, rgba(255,215,0,0.3), transparent 30%);
            animation: rotate 4s linear infinite;
        }

        @keyframes rotate {
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Loader -->
    <div class="loader" id="loader">
        <div class="loader-content">
            <img src="{{ asset('images/logo.jpeg') }}" alt="ML Logo" class="w-24 h-24 mx-auto animate-pulse">
            <div class="loader-progress">
                <div class="loader-bar"></div>
            </div>
            <p class="text-white">Loading Portfolio...</p>
        </div>
    </div>

    <!-- Particles Background -->
    <div id="particles-js"></div>

    <!-- Main Content -->
    <nav class="fixed w-full bg-black bg-opacity-50 backdrop-blur-md z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="#" class="text-xl font-bold flex items-center">
                    <img src="https://i.imgur.com/XyzHJ9N.png" alt="ML Logo" class="w-8 h-8 mr-2">
                    MLPro<span class="text-red-500">Gaming</span>
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="hover:text-red-500 transition">Home</a>
                    <a href="#stats" class="hover:text-red-500 transition">Statistics</a>
                    <a href="#heroes" class="hover:text-red-500 transition">Heroes</a>
                    <a href="#matches" class="hover:text-red-500 transition">Matches</a>
                    <a href="#achievements" class="hover:text-red-500 transition">Achievements</a>
                    <a href="#contact" class="hover:text-red-500 transition">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-bg min-h-screen flex items-center relative">
        <div class="container mx-auto px-6 py-20 z-10">
            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                <div class="relative inline-block">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Gamer Profile" 
                         class="w-32 h-32 rounded-full mx-auto mb-6 border-4 border-red-500">
                    <div class="absolute -bottom-2 -right-2 bg-yellow-500 rounded-full p-2 animate-bounce">
                    <span class="text-black font-bold">Top Global</span>
                    </div>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-500">
                    Fajar Officiall
                </h1>
                <p class="text-xl mb-8">Professional Mobile Legends Player GG</p>
                <div class="flex justify-center items-center space-x-4 flex-wrap">
                    <div class="hero-rank inline-block px-6 py-2 rounded-lg mb-4">
                        <span class="text-yellow-400">Mythical Glory / Mythical Imortal</span>
                        <span class="block text-sm">4500 Points</span>
                    </div>
                    <div class="bg-red-500 px-4 py-2 rounded-lg mb-4 achievement-badge">
                        <span class="font-bold">Server Rank</span>
                        <span class="block">#1 Lancelot and Fani</span>
                    </div>
                    <div class="bg-blue-500 px-4 py-2 rounded-lg mb-4">
                        <span class="font-bold">Squad</span>
                        <span class="block">RRQ raja dari segala raja</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-16" data-aos="fade-up">
                Gaming Statistics
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Win Rate -->
                <div class="stats-card rounded-xl p-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="relative">
                        <svg class="w-16 h-16 text-red-500" viewBox="0 0 36 36">
                            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                  fill="none"
                                  stroke="#444"
                                  stroke-width="3" />
                            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                  fill="none"
                                  stroke="#ff4444"
                                  stroke-width="3"
                                  stroke-dasharray="75, 100" />
                        </svg>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span class="text-2xl font-bold">75%</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mt-4">Win Rate</h3>
                    <p class="text-gray-400">All Time</p>
                </div>

                <!-- Total Matches -->
                <div class="stats-card rounded-xl p-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-4xl font-bold text-red-500 mb-2">3,547</div>
                    <h3 class="text-xl font-semibold">Total Matches</h3>
                    <p class="text-gray-400">Ranked Games</p>
                    <div class="mt-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span>Classic</span>
                            <span>1,234</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-blue-500 rounded-full h-2" style="width: 35%"></div>
                        </div>
                    </div>
                </div>

                <!-- MVP Rate -->
                <div class="stats-card rounded-xl p-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-4xl font-bold text-yellow-500 mb-2">42%</div>
                    <h3 class="text-xl font-semibold">MVP Rate</h3>
                    <p class="text-gray-400">Last 100 Games</p>
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        <div class="text-center">
                            <div class="text-sm font-semibold">Gold</div>
                            <div class="text-yellow-500">24</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm font-semibold">Silver</div>
                            <div class="text-gray-400">18</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm font-semibold">Bronze</div>
                            <div class="text-orange-500">15</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Heroes Section -->
    <section id="heroes" class="py-20 game-bg">
        <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-16" data-aos="fade-up">
                    Most Played Heroes
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Hero Card 1 -->
                    <div class="hero-card bg-gray-800 rounded-xl overflow-hidden" data-aos="flip-left">
                        <img src="{{ asset('images/lancelot.jpeg') }}" alt="Lancelot" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Lancelot</h3>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-400">Matches</span>
                                <span>789</span>
                            </div>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-400">Win Rate</span>
                                <span class="text-green-500">82.5%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">MMR</span>
                                <span class="text-yellow-500">3200</span>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Card 2 -->
                    <div class="hero-card bg-gray-800 rounded-xl overflow-hidden" data-aos="flip-left" data-aos-delay="100">
                        <img src="{{ asset('images/fanny.jpeg') }}" alt="Fanny" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Fanny</h3>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-400">Matches</span>
                                <span>654</span>
                            </div>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-400">Win Rate</span>
                                <span class="text-green-500">75.3%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">MMR</span>
                                <span class="text-yellow-500">2950</span>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Card 3 -->
                    <div class="hero-card bg-gray-800 rounded-xl overflow-hidden" data-aos="flip-left" data-aos-delay="200">
                        <img src="{{ asset('images/gusion.jpeg') }}" alt="Gusion" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">Gusion</h3>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-400">Matches</span>
                                <span>542</span>
                            </div>
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-400">Win Rate</span>
                                <span class="text-green-500">78.9%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">MMR</span>
                                <span class="text-yellow-500">2800</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Match History Section -->
        <section id="matches" class="py-20 bg-gray-900">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-16" data-aos="fade-up">Recent Matches</h2>
                <div class="space-y-4">
                    <!-- Match 1 -->
                    <div class="match-history-item match-win bg-gray-800 rounded-xl p-6" data-aos="fade-left">
                        <div class="flex flex-wrap items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <img src="https://i.imgur.com/hero1.jpg" alt="Lancelot" class="w-16 h-16 rounded-lg">
                                <div>
                                    <h3 class="font-bold">Victory</h3>
                                    <p class="text-gray-400">Ranked Match</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-green-500 font-bold">12/2/8</div>
                                <div class="text-sm text-gray-400">MVP</div>
                            </div>
                        </div>
                    </div>

                    <!-- Match 2 -->
                    <div class="match-history-item match-lose bg-gray-800 rounded-xl p-6" data-aos="fade-left" data-aos-delay="100">
                        <div class="flex flex-wrap items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <img src="https://i.imgur.com/hero2.jpg" alt="Fanny" class="w-16 h-16 rounded-lg">
                                <div>
                                    <h3 class="font-bold">Defeat</h3>
                                    <p class="text-gray-400">Ranked Match</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-red-500 font-bold">8/5/6</div>
                                <div class="text-sm text-gray-400">Gold Medal</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Achievements Section -->
        <section id="achievements" class="py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-16" data-aos="fade-up">Achievements</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Achievement 1 -->
                    <div class="achievement-badge bg-gray-800 rounded-xl p-6 text-center" data-aos="zoom-in">
                        <div class="w-20 h-20 mx-auto mb-4 relative">
                        </div>
                        <h3 class="font-bold mb-2">Top Global Lancelot</h3>
                        <p class="text-sm text-gray-400">Season 20</p>
                    </div>

                    <!-- Achievement 2 -->
                    <div class="achievement-badge bg-gray-800 rounded-xl p-6 text-center" data-aos="zoom-in" data-aos-delay="100">
                        <div class="w-20 h-20 mx-auto mb-4">
                            <img src="https://i.imgur.com/achievement2.png" alt="Tournament Winner" class="w-full h-full">
                        </div>
                        <h3 class="font-bold mb-2">MPL Champion</h3>
                        <p class="text-sm text-gray-400">Season 8</p>
                    </div>

                    <!-- Achievement 3 -->
                    <div class="achievement-badge bg-gray-800 rounded-xl p-6 text-center" data-aos="zoom-in" data-aos-delay="200">
                        <div class="w-20 h-20 mx-auto mb-4">
                            <img src="https://i.imgur.com/achievement3.png" alt="Savage Master" class="w-full h-full">
                        </div>
                        <h3 class="font-bold mb-2">100 Savages</h3>
                        <p class="text-sm text-gray-400">All Time</p>
                    </div>

                    <!-- Achievement 4 -->
                    <div class="achievement-badge bg-gray-800 rounded-xl p-6 text-center" data-aos="zoom-in" data-aos-delay="300">
                        <div class="w-20 h-20 mx-auto mb-4">
                            <img src="https://i.imgur.com/achievement4.png" alt="Street Rank" class="w-full h-full">
                        </div>
                        <h3 class="font-bold mb-2">Street Rank #1</h3>
                        <p class="text-sm text-gray-400">6 Months Streak</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-gray-900">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-16" data-aos="fade-up">Connect With Me</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6" data-aos="fade-right">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h3 class="font-bold">Email</h3>
                                <p class="text-gray-400">dragonslayer@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-facebook"></i>
                            </div>
                            <div>
                                <h3 class="font-bold">Facebook</h3>
                                <p class="text-gray-400">@DragonSlayerML</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-twitch"></i>
                            </div>
                            <div>
                                <h3 class="font-bold">Twitch</h3>
                                <p class="text-gray-400">DragonSlayer_Official</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-xl p-6" data-aos="fade-left">
                        <h3 class="text-xl font-bold mb-4">Send Message</h3>
                        <form class="space-y-4">
                            <input type="text" placeholder="Your Name" class="w-full bg-gray-700 rounded-lg p-3">
                            <input type="email" placeholder="Your Email" class="w-full bg-gray-700 rounded-lg p-3">
                            <textarea placeholder="Message" class="w-full bg-gray-700 rounded-lg p-3 h-32"></textarea>
                            <button class="w-full bg-red-500 hover:bg-red-600 transition rounded-lg p-3 font-bold">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black py-8">
            <div class="container mx-auto px-6 text-center">
                <p>© 2024 MLProGaming. All rights reserved.</p>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
        <script>
            // Initialize AOS
            AOS.init();

            // Initialize Particles.js
            particlesJS("particles-js", {
                particles: {
                    number: { value: 80 },
                    color: { value: "#ff0000" },
                    shape: { type: "circle" },
                    opacity: { value: 0.5 },
                    size: { value: 3 },
                    move: { speed: 3 }
                }
            });

            // Loader
            window.addEventListener('load', function() {
                setTimeout(function() {
                    document.getElementById('loader').style.display = 'none';
                }, 2000);
            });
        </script>
    </body>
</html>
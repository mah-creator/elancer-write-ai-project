<x-layouts.main :header="false" bodyWrapper="font-body-md text-on-surface flex flex-col relative"
    mainWrapper="flex-grow flex items-center justify-center px-margin-mobile md:px-margin-desktop py-12 z-10">
    <x-slot:style>
        <style>
            body {
                background-color: #0b1326;
                min-height: 100vh;
            }

            .glass-card {
                background: rgba(30, 41, 59, 0.4);
                backdrop-filter: blur(24px);
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            }

            .ambient-glow {
                position: fixed;
                /* Fixed to viewport */
                width: 600px;
                height: 600px;
                background: radial-gradient(circle, rgba(76, 215, 246, 0.15) 0%, rgba(173, 198, 255, 0.05) 50%, rgba(11, 19, 38, 0) 100%);
                border-radius: 50%;
                filter: blur(80px);
                z-index: -1;
                pointer-events: none;
            }

            .ambient-glow-1 {
                top: -10%;
                left: -10%;
            }

            .ambient-glow-2 {
                bottom: -10%;
                right: -10%;
            }

            .btn-glow:hover {
                box-shadow: 0 0 20px rgba(77, 142, 255, 0.4);
            }

            .input-focus-glow:focus {
                box-shadow: 0 0 0 2px rgba(173, 198, 255, 0.2);
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            #atmosphere {
                position: fixed;
                inset: 0;
                pointer-events: none;
                z-index: -1;
            }
        </style>
    </x-slot:style>

    <!-- Ambient Background Effects -->
    <div class="ambient-glow ambient-glow-1"></div>
    <div class="ambient-glow ambient-glow-2"></div>
    <!-- Decorative Particles Canvas -->
    <canvas id="atmosphere"></canvas>

    <div class="w-full max-w-[440px] glass-card p-10 rounded-xl transition-all duration-500 hover:border-white/20">
        <!-- Logo Section -->
        <div class="flex flex-col items-center mb-10">
            <x-brand class="h-16 w-auto mb-6 transform transition-transform hover:scale-105" />
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tighter">Welcome Back</h1>
            <p class="font-body-md text-on-surface-variant mt-2">Access your creative sanctuary</p>
        </div>
        <!-- Login Form -->
        <form action="{{ route('login') }}" method="post" class="space-y-6" id="loginForm">
            <div class="space-y-2">
                <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest ml-1"
                    for="email">Email Address</label>
                <div class="relative group">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">mail</span>
                    <input name="{{ config('fortify.username') }}"
                        class="w-full h-14 bg-surface-container-highest/50 border border-outline-variant rounded-lg pl-12 pr-4 text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:border-primary transition-all input-focus-glow"
                        id="email" placeholder="name@studio.com" required="" type="email" />
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest ml-1"
                        for="password">Password</label>
                    <a href="{{ route('password.request') }}"
                        class="font-label-sm text-label-sm text-secondary hover:text-primary transition-colors">Forgot
                        Password?</a>
                </div>
                <div class="relative group">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">lock</span>
                    <input name="password"
                        class="w-full h-14 bg-surface-container-highest/50 border border-outline-variant rounded-lg pl-12 pr-4 text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:border-primary transition-all input-focus-glow"
                        id="password" placeholder="••••••••" required="" type="password" />
                </div>
            </div>
            <div class="flex items-center space-x-3 py-2">
                <input
                    class="w-4 h-4 rounded border-outline-variant bg-surface-container-highest text-primary focus:ring-primary-container"
                    id="remember" type="checkbox" />
                <label class="font-body-md text-on-surface-variant text-sm cursor-pointer select-none"
                    for="remember">Remember this device</label>
            </div>
            <button
                class="w-full h-14 bg-primary text-on-primary font-label-sm text-body-md font-bold rounded-lg transition-all duration-300 btn-glow active:scale-95 flex items-center justify-center gap-2"
                type="submit">
                Sign In
                <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
        </form>
        <!-- Social Divider -->
        <div class="w-full flex items-center gap-4 my-8">
            <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
            <span class="font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Or continue with</span>
            <div class="h-[1px] flex-grow bg-outline-variant/20"></div>
        </div>
        <!-- Social Login -->
        <div class="w-full flex content-stretch gap-4">
            <button
                class="w-full px-4 h-12 glass-card hover:bg-white/5 flex items-center justify-center gap-2 rounded-lg transition-all">
                <svg class="w-5 h-5" viewbox="0 0 24 24">
                    <path
                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                        fill="currentColor"></path>
                    <path
                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                        fill="currentColor"></path>
                    <path
                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                        fill="currentColor"></path>
                    <path
                        d="M12 5.38c1.62 0 3.06.56 4.21 1.66l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z"
                        fill="currentColor"></path>
                </svg>
                <span class="font-label-sm text-sm">Google</span>
            </button>
            <button
                class="w-full px-4 h-12 glass-card hover:bg-white/5 flex items-center justify-center gap-2 rounded-lg transition-all">
                <svg class="w-5 h-5" viewbox="0 0 24 24">
                    <path
                        d="M12 2C6.477 2 2 6.477 2 12c0 4.419 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.604-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482C19.138 20.161 22 16.416 22 12c0-5.523-4.477-10-10-10z"
                        fill="currentColor"></path>
                </svg>
                <span class="font-label-sm text-sm">GitHub</span>
            </button>
        </div>
        <!-- Footer Link -->
        <div class="mt-10 flex items-center justify-center">
            <p class="font-body-md text-body-md text-on-surface-variant">
                New to Aether?
                <a href="{{ route('register') }}"
                    class="text-primary hover:text-secondary font-medium transition-colors underline underline-offset-4 decoration-primary/20 hover:decoration-secondary">Create
                    an Account</a>
            </p>
        </div>
    </div>
    <!-- Simple Footer -->
    <!-- <footer class="w-full py-8 px-margin-mobile md:px-margin-desktop z-10">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 max-w-container-max mx-auto">
            <p class="font-label-sm text-label-sm text-on-surface-variant opacity-60 text-center md:text-left">© 2024 Aether. Cinematic Minimalism for the Creative Mind.</p>
            <div class="flex gap-6">
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Privacy Policy</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Terms of Service</a>
                <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Support</a>
            </div>
        </div>
    </footer> -->
    <x-slot:script>
        <script>
            // Micro-interaction for atmospheric particles
            const canvas = document.getElementById('atmosphere');
            const ctx = canvas.getContext('2d');
            let particles = [];

            function resize() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }

            class Particle {
                constructor() {
                    this.reset();
                }
                reset() {
                    this.x = Math.random() * canvas.width;
                    this.y = Math.random() * canvas.height;
                    this.size = Math.random() * 2;
                    this.speedX = (Math.random() - 0.5) * 0.2;
                    this.speedY = (Math.random() - 0.5) * 0.2;
                    this.opacity = Math.random() * 0.5;
                }
                update() {
                    this.x += this.speedX;
                    this.y += this.speedY;
                    if (this.x < 0) this.x = canvas.width;
                    if (this.x > canvas.width) this.x = 0;
                    if (this.y < 0) this.y = canvas.height;
                    if (this.y > canvas.height) this.y = 0;
                }
                draw() {
                    ctx.fillStyle = `rgba(173, 198, 255, ${this.opacity})`;
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fill();
                }
            }

            function init() {
                resize();
                particles = [];
                for (let i = 0; i < 50; i++) {
                    particles.push(new Particle());
                }
            }

            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                particles.forEach(p => {
                    p.update();
                    p.draw();
                });
                requestAnimationFrame(animate);
            }

            window.addEventListener('resize', () => {
                resize();
            });
            init();
            animate();
        </script>
    </x-slot:script>
</x-layouts.main>
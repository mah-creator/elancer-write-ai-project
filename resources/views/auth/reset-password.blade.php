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
            <x-brand class="mb-12 transform transition-transform hover:scale-105" />
            <h1 class="font-headline-lg text-headline-lg md:text-headline-lg text-on-surface mb-3">Reset Password</h1>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-[300px] mx-auto">
                Choose a new secure password for your sanctuary
            </p>
        </div>
        <form action="{{ route('password.update') }}" method="post" class="space-y-6" id="reset-form">
            @csrf
            <!-- Reset password token (from reset link) -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <!-- Email (from reset link query) -->
            <input type="hidden" name="{{ config('fortify.email') }}" value="{{ $request->email }}">
            <!-- New Password Field -->
            <div class="space-y-2">
                <label class="block font-label-sm text-label-sm text-on-surface-variant ml-1" for="new-password">New
                    Password</label>
                <div class="relative group">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-[20px] group-focus-within:text-primary transition-colors">lock</span>
                    <input name="password"
                        class="w-full bg-surface-container-lowest border border-white/10 rounded-lg py-4 pl-12 pr-12 text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all font-body-md"
                        id="new-password" placeholder="••••••••" required="" type="password" />
                    <button
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-outline-variant hover:text-on-surface transition-colors"
                        type="button">
                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                    </button>
                </div>
            </div>
            <!-- Confirm Password Field -->
            <div class="space-y-2">
                <label class="block font-label-sm text-label-sm text-on-surface-variant ml-1"
                    for="confirm-password">Confirm New Password</label>
                <div class="relative group">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-[20px] group-focus-within:text-primary transition-colors">lock_reset</span>
                    <input name="password_confirmation"
                        class="w-full bg-surface-container-lowest border border-white/10 rounded-lg py-4 pl-12 pr-12 text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition-all font-body-md"
                        id="confirm-password" placeholder="••••••••" required="" type="password" />
                </div>
            </div>
            <!-- Reset Button -->
            <button
                class="w-full bg-primary text-on-primary py-4 px-6 rounded-lg font-headline-lg text-[16px] font-bold tracking-wide uppercase transition-all duration-300 hover:scale-[1.02] hover:bg-primary-container active:scale-95 glow-accent mt-4"
                type="submit">
                Reset Password
            </button>
        </form>
        <!-- Footer Navigation Link -->
        <div class="mt-10 pt-8 border-t border-white/5 text-center">
            <a href="{{ route('login') }}"
                class="inline-flex items-center font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors duration-300 group">
                <span
                    class="material-symbols-outlined mr-2 text-[18px] group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Back to Sign In
            </a>
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
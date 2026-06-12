<x-layouts.main :header="false" bodyWrapper="bg-background text-on-surface flex items-center justify-center min-h-screen pt-12" mainWrapper="w-full max-w-[480px] z-10">
    <x-slot:style>
        <style>
            :root {
                --glass-bg: rgba(30, 41, 59, 0.5);
                --glass-border: rgba(255, 255, 255, 0.08);
                --glow-primary: rgba(173, 198, 255, 0.3);
            }

            body {
                background: #0b1326;
                overflow: hidden;
                font-family: 'Inter', sans-serif;
            }

            .glass-card {
                background: var(--glass-bg);
                backdrop-filter: blur(24px);
                -webkit-backdrop-filter: blur(24px);
                border: 1px solid var(--glass-border);
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
                position: relative;
            }

            .glass-card::before {
                content: '';
                position: absolute;
                inset: 0;
                border-radius: inherit;
                padding: 1px;
                background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.15), transparent, rgba(255, 255, 255, 0.05));
                -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
                pointer-events: none;
            }

            .ambient-glow {
                position: absolute;
                width: 600px;
                height: 600px;
                background: radial-gradient(circle, rgba(76, 215, 246, 0.15) 0%, rgba(173, 198, 255, 0.05) 50%, transparent 70%);
                filter: blur(80px);
                z-index: -1;
                animation: pulse 10s infinite alternate;
            }

            @keyframes pulse {
                0% {
                    transform: scale(1) translate(-10%, -10%);
                    opacity: 0.5;
                }

                100% {
                    transform: scale(1.2) translate(10%, 10%);
                    opacity: 0.8;
                }
            }

            .primary-glow-btn {
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .primary-glow-btn:hover {
                box-shadow: 0 0 20px var(--glow-primary);
                transform: translateY(-1px);
            }

            .primary-glow-btn::after {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 60%);
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .primary-glow-btn:hover::after {
                opacity: 1;
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
                vertical-align: middle;
            }

            input:focus+.input-glow {
                opacity: 1;
            }
        </style>
    </x-slot:style>
    <!-- Atmospheric Background Effects -->
    <div class="ambient-glow top-0 left-0"></div>
    <div class="ambient-glow bottom-0 right-0" style="background: radial-gradient(circle, rgba(173, 198, 255, 0.1) 0%, transparent 60%);"></div>
    <!-- Brand Identification -->
    <div>
        <x-brand class="mb-12 flex justify-center" />
        <!-- Glassmorphic Card -->
        <div class="glass-card rounded-xl p-8 md:p-10 flex flex-col items-center text-center">
            <header class="mb-8">
                <h1 class="font-headline-lg text-headline-lg mb-4 tracking-tight">Recover Sanctuary</h1>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-[320px] mx-auto">
                    Enter your email address and we'll send you a link to reset your access.
                </p>
            </header>
            <form class="w-full space-y-6" method="post" action="{{ route('password.email') }}">
                <!-- Input Field -->
                <div class="relative w-full text-left">
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2 ml-1" for="email">Email Address</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary/60 pointer-events-none" data-icon="alternate_email">alternate_email</span>
                        <input name="{{ config('fortify.username') }}" class="w-full bg-surface-container-lowest border-outline-variant/30 text-on-surface rounded-lg py-4 pl-12 pr-4 focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 placeholder:text-on-surface-variant/30 font-body-md" id="email" placeholder="navigator@aether.io" type="email" />
                        <div class="input-glow absolute inset-0 rounded-lg shadow-[0_0_15px_rgba(173,198,255,0.1)] opacity-0 pointer-events-none transition-opacity duration-300"></div>
                    </div>
                </div>
                <!-- Primary Action -->
                <button class="primary-glow-btn w-full bg-primary-container text-on-primary-container font-label-sm text-label-sm py-4 rounded-lg flex items-center justify-center gap-2 font-bold tracking-widest uppercase group transition-all" type="submit">
                    Send Recovery Link
                    <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform" data-icon="north_east">north_east</span>
                </button>
            </form>
            <!-- Navigation Link -->
            <footer class="mt-8">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors group">
                    <span class="material-symbols-outlined text-[18px] group-hover:-translate-x-1 transition-transform" data-icon="arrow_back">arrow_back</span>
                    Back to Sign In
                </a>
            </footer>
        </div>

    </div>

    <!-- Micro-interactions Script -->
    <script>
        // Subtle parallax effect on the glass card based on mouse movement
        const card = document.querySelector('.glass-card');
        document.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 45;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 45;
            card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        // Add input focus atmosphere
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('focus', () => {
            document.body.style.transition = 'background 0.8s ease';
            document.body.style.background = '#0d1a35';
        });
        emailInput.addEventListener('blur', () => {
            document.body.style.background = '#0b1326';
        });
    </script>
</x-layouts.main>
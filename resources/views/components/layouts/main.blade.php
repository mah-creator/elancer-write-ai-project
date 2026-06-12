@props(['header' => 'true', 'mainWrapper' => '', 'bodyWrapper' => '', 'title' => 'Aether - Cinematic Minimalism for the Creative Mind'])

<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link rel="icon" type="image/svg" href="/images/logo.svg" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Geist:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    {{ $style ?? '' }}

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-error": "#690005",
                        "inverse-on-surface": "#283044",
                        "surface-dim": "#0b1326",
                        "tertiary-fixed": "#ffdcc6",
                        "tertiary-container": "#df7412",
                        "primary-fixed-dim": "#adc6ff",
                        "on-primary-fixed": "#001a42",
                        "error": "#ffb4ab",
                        "surface": "#0b1326",
                        "tertiary-fixed-dim": "#ffb786",
                        "on-surface": "#dae2fd",
                        "on-tertiary-container": "#461f00",
                        "on-secondary-fixed": "#001f26",
                        "on-primary-container": "#00285d",
                        "surface-container-high": "#222a3d",
                        "secondary-fixed": "#acedff",
                        "outline-variant": "#424754",
                        "outline": "#8c909f",
                        "primary": "#adc6ff",
                        "on-primary-fixed-variant": "#004395",
                        "surface-variant": "#2d3449",
                        "tertiary": "#ffb786",
                        "error-container": "#93000a",
                        "on-secondary-container": "#00424e",
                        "inverse-primary": "#005ac2",
                        "on-surface-variant": "#c2c6d6",
                        "on-tertiary": "#502400",
                        "secondary-fixed-dim": "#4cd7f6",
                        "background": "#0b1326",
                        "secondary": "#4cd7f6",
                        "primary-fixed": "#d8e2ff",
                        "on-tertiary-fixed": "#311400",
                        "on-primary": "#002e6a",
                        "secondary-container": "#03b5d3",
                        "on-secondary": "#003640",
                        "on-tertiary-fixed-variant": "#723600",
                        "primary-container": "#4d8eff",
                        "surface-container-highest": "#2d3449",
                        "surface-container": "#171f33",
                        "surface-container-lowest": "#060e20",
                        "surface-container-low": "#131b2e",
                        "surface-bright": "#31394d",
                        "surface-tint": "#adc6ff",
                        "on-error-container": "#ffdad6",
                        "inverse-surface": "#dae2fd",
                        "on-secondary-fixed-variant": "#004e5c",
                        "on-background": "#dae2fd"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "64px",
                        "margin-mobile": "20px",
                        "container-max": "1200px",
                        "base": "8px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "headline-lg-mobile": ["Geist"],
                        "label-sm": ["Geist"],
                        "headline-lg": ["Geist"],
                        "display-lg": ["Geist"],
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "500"
                        }],
                        "headline-lg": ["40px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["64px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.04em",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.8",
                            "letterSpacing": "0.01em",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>

    <style>
        .glass-panel {
            background: rgba(23, 31, 51, 0.7);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-left: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            background: rgba(45, 52, 73, 0.6);
            border-color: rgba(173, 198, 255, 0.3);
            transform: translateX(-4px);
        }

        .unread-glow {
            box-shadow: 0 0 15px rgba(76, 215, 246, 0.15);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(140, 144, 159, 0.2);
            border-radius: 10px;
        }
    </style>
</head>

<body class="{{ $bodyWrapper }} flex flex-col">

    <!-- TopNavBar -->
    @if (isset($navbar))

        {{ $navbar }}
    @else
        @if ($header)
            <x-layouts.default-navbar />
        @endif


    @endif

    <main class="{{ $mainWrapper }}">
        <x-widgets.error-toast />

        {{ $slot }}

    </main>

    <!-- Footer -->
    @if (isset($footer))

        {{ $footer }}

    @else

        <x-layouts.default-footer />

    @endif

    <!-- Notification Side Panel (The Fly-out) -->
    <div class="fixed top-0 right-0 w-full md:w-[420px] h-full z-[60] transform translate-x-full transition-transform duration-500 ease-in-out glass-panel"
        id="notification-panel">
        <div class="flex flex-col h-full">
            <!-- Panel Header -->
            <div class="px-8 pt-8 pb-6 border-b border-white/5">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <h2 class="font-headline-lg text-3xl tracking-tight text-on-surface">Notifications</h2>
                        <p class="font-label-sm text-label-sm text-outline mt-1">You have 4 new activities</p>
                    </div>
                    <button class="p-2 hover:bg-white/5 rounded-full transition-colors" id="close-panel">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex gap-4" id="tabs-container">
                        <button class="relative font-label-sm text-label-sm text-on-surface px-2 py-1 tab-active group"
                            data-tab="all">
                            All
                            <span
                                class="absolute -bottom-2 left-0 w-full h-0.5 bg-secondary active-tab-indicator"></span>
                        </button>
                        <button
                            class="font-label-sm text-label-sm text-outline px-2 py-1 hover:text-on-surface transition-colors"
                            data-tab="engagement">Engagement</button>
                        <button
                            class="font-label-sm text-label-sm text-outline px-2 py-1 hover:text-on-surface transition-colors"
                            data-tab="system">System</button>
                    </div>
                    <button
                        class="font-label-sm text-label-sm text-secondary hover:text-secondary-fixed-dim transition-colors uppercase tracking-widest">Mark
                        all as read</button>
                </div>
            </div>
            <!-- Panel Content (Scrollable) -->
            <div class="flex-grow overflow-y-auto custom-scrollbar px-6 py-4 space-y-4" id="notifications-list">
                <!-- Notification Item: Engagement -->
                <div class="glass-card p-4 rounded-xl relative group cursor-pointer" data-category="engagement">
                    <div
                        class="absolute -left-2 top-1/2 -translate-y-1/2 w-1 h-8 bg-secondary rounded-full unread-glow">
                    </div>
                    <div class="flex gap-4">
                        <div class="relative shrink-0">
                            <img alt="Julian Vane" class="w-12 h-12 rounded-full border border-white/10"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7-H1B4oUI1GJwmX7doWRBcj1iWQf2yLaCIp4h_SOLo_i6-qXb36Upv3m24fiwdIja3wGM8iGfHiQrz7J_UvvsjGYh9STVSpADgyBVncVPOrkxQMdIxqqVFZz8jjLlRa5e36al2M2QHqPMwMf1tUO_VkkyX1URhZierwhcNDOKXbSC6osIy4SrpQ77io8C5D733kmHQfZsCWAscKgB51abBY2fIIz53gSiz87uhoS_8MtXHQu61R-XfYPi7A-GU04gaX4zAscvi2U" />
                            <div
                                class="absolute -right-1 -bottom-1 bg-secondary text-on-secondary rounded-full p-1 border-2 border-[#171f33]">
                                <span class="material-symbols-outlined text-[14px]"
                                    style="font-variation-settings: 'FILL' 1;">favorite</span>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <p class="text-body-md text-on-surface leading-snug">
                                <span class="font-semibold text-white">Julian Vane</span> liked your post <span
                                    class="text-secondary">"The Future of Web3 Interaction"</span>
                            </p>
                            <span class="font-label-sm text-[10px] text-outline mt-2 block uppercase">2m ago</span>
                        </div>
                    </div>
                </div>
                <!-- Notification Item: Comment -->
                <div class="glass-card p-4 rounded-xl relative group cursor-pointer" data-category="engagement">
                    <div
                        class="absolute -left-2 top-1/2 -translate-y-1/2 w-1 h-8 bg-secondary rounded-full unread-glow">
                    </div>
                    <div class="flex gap-4">
                        <div class="relative shrink-0">
                            <img alt="Elena" class="w-12 h-12 rounded-full border border-white/10"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEmsAUwhlWFz6suknKbr79fUerDYFDG_4CI_SKeEhgce5BxauLBPAjxVz6Jf6z_wotIZy0NyTTuTjhNbZ5XMf8NHlgK8PsQ7LTNIG87At80S3Rq0o8e0Fa_i0MZ-Ql8ZOfxrWsp0fJW95Z_zksG2oe00q0ill3zNRlXwIz1brlR-sssQGfMLGoChok4mb_KQtP9-Sj9UORW3QjTHsFxnHbQaSeVBXsg7-XSOAlzcHs-X4JJ-5OVvplitGF-U8LC5DZEl2HMrOAf4c" />
                            <div
                                class="absolute -right-1 -bottom-1 bg-primary text-on-primary rounded-full p-1 border-2 border-[#171f33]">
                                <span class="material-symbols-outlined text-[14px]"
                                    style="font-variation-settings: 'FILL' 1;">chat_bubble</span>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <p class="text-body-md text-on-surface leading-snug">
                                <span class="font-semibold text-white">Elena Ray</span> commented: <span
                                    class="text-on-surface-variant italic">"This perspective is absolutely
                                    revolutionary..."</span>
                            </p>
                            <span class="font-label-sm text-[10px] text-outline mt-2 block uppercase">1h ago</span>
                        </div>
                    </div>
                </div>
                <!-- Notification Item: System -->
                <div class="glass-card p-4 rounded-xl relative group cursor-pointer opacity-80" data-category="system">
                    <div class="flex gap-4">
                        <div class="relative shrink-0">
                            <div
                                class="w-12 h-12 rounded-full bg-surface-variant flex items-center justify-center border border-white/10">
                                <span class="material-symbols-outlined text-tertiary">system_update_alt</span>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <p class="text-body-md text-on-surface leading-snug">
                                System update <span class="font-semibold">v2.4.0</span> is now complete. Review the new
                                <span class="text-tertiary">Changelog</span>.
                            </p>
                            <span class="font-label-sm text-[10px] text-outline mt-2 block uppercase">Yesterday</span>
                        </div>
                    </div>
                </div>
                <!-- Notification Item: Follow -->
                <div class="glass-card p-4 rounded-xl relative group cursor-pointer" data-category="engagement">
                    <div
                        class="absolute -left-2 top-1/2 -translate-y-1/2 w-1 h-8 bg-secondary rounded-full unread-glow">
                    </div>
                    <div class="flex gap-4">
                        <div class="relative shrink-0">
                            <img alt="Marcus" class="w-12 h-12 rounded-full border border-white/10"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYvnkqiEblLpX4d1EqACtNYMj0nLkEafWVQz-g6xJvyFsysBkPztlI03B1cuzC4IR2q53WngYGhWEF9mmcekz4L6LSzUoaYOz6PyY9vwOQNMBG3g9AXxlUtTWFIUJk81J3PldKbQXvHOFiXH0o9UwAfSePAEa5Z8VsFZm7bpPkc7RSO21pQgc92Lvqz9QR-zo3wfzzfyD-qW7nUoleiLm19tksf-Thjypw6dLWNU54KbnjbLlHs6LC9qwoo8MxLA-EG96xWZaRc-o" />
                            <div
                                class="absolute -right-1 -bottom-1 bg-secondary-container text-on-secondary-container rounded-full p-1 border-2 border-[#171f33]">
                                <span class="material-symbols-outlined text-[14px]"
                                    style="font-variation-settings: 'FILL' 1;">person_add</span>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <p class="text-body-md text-on-surface leading-snug">
                                <span class="font-semibold text-white">Marcus Thorne</span> started following your
                                journal.
                            </p>
                            <span class="font-label-sm text-[10px] text-outline mt-2 block uppercase">2 days ago</span>
                        </div>
                    </div>
                </div>
                <!-- Empty State (Hidden by default) -->
                <div class="hidden flex-col items-center justify-center h-full text-center space-y-6 pt-20"
                    id="empty-state">
                    <div class="w-48 h-48 relative">

                    </div>
                    <div>
                        <h3 class="font-headline-lg text-xl text-on-surface">Silence in the Void</h3>
                        <p class="text-on-surface-variant max-w-[240px] mx-auto mt-2">All manifestos have been
                            acknowledged. You are up to date.</p>
                    </div>
                </div>
            </div>
            <!-- Panel Footer -->
            <div class="p-8 border-t border-white/5 bg-surface-container-lowest/50">
                <button
                    class="w-full bg-primary-container text-on-primary-container py-4 rounded-lg font-label-sm text-label-sm uppercase tracking-[0.2em] font-bold hover:brightness-110 active:scale-95 transition-all">
                    Open Dashboard
                </button>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[55] hidden opacity-0 transition-opacity duration-500"
        id="panel-overlay"></div>
    <script>
        const trigger = document.getElementById('notification-trigger');
        const panel = document.getElementById('notification-panel');
        const overlay = document.getElementById('panel-overlay');
        const closeBtn = document.getElementById('close-panel');
        const tabs = document.querySelectorAll('#tabs-container button');
        const listItems = document.querySelectorAll('#notifications-list > div[data-category]');
        const emptyState = document.getElementById('empty-state');

        // Toggle Panel
        function togglePanel(open) {
            if (open) {
                panel.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.add('opacity-100'), 10);
                document.body.style.overflow = 'hidden';
            } else {
                panel.classList.add('translate-x-full');
                overlay.classList.remove('opacity-100');
                setTimeout(() => overlay.classList.add('hidden'), 500);
                document.body.style.overflow = '';
            }
        }

        trigger.addEventListener('click', () => togglePanel(true));
        closeBtn.addEventListener('click', () => togglePanel(false));
        overlay.addEventListener('click', () => togglePanel(false));

        // Tab Logic
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const category = tab.getAttribute('data-tab');

                // Update UI active state
                tabs.forEach(t => {
                    t.classList.remove('text-on-surface');
                    t.classList.add('text-outline');
                    const indicator = t.querySelector('.active-tab-indicator');
                    if (indicator) indicator.remove();
                });

                tab.classList.remove('text-outline');
                tab.classList.add('text-on-surface');
                tab.innerHTML += '<span class="absolute -bottom-2 left-0 w-full h-0.5 bg-secondary active-tab-indicator"></span>';

                // Filter items
                let visibleCount = 0;
                listItems.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        item.classList.add('hidden');
                    }
                });

                // Handle empty state
                if (visibleCount === 0) {
                    emptyState.classList.remove('hidden');
                    emptyState.classList.add('flex');
                } else {
                    emptyState.classList.add('hidden');
                    emptyState.classList.remove('flex');
                }
            });
        });

        // Simple unread marker interaction
        listItems.forEach(item => {
            item.addEventListener('click', () => {
                const glow = item.querySelector('.unread-glow');
                if (glow) {
                    glow.remove();
                    item.classList.add('opacity-80');
                }
            });
        });

        // Atmospheric Micro-interaction: Mouse tracking glow on glass cards
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });
    </script>
</body>

{{ $script ?? '' }}

</html>
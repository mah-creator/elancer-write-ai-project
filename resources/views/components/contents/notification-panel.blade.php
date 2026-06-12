<x-slot:style>
    <style>
        /* @font-face {
            font-family: 'Geist';
            src: url('https://cdn.jsdelivr.net/npm/geist-font@1.0.1/fonts/geist-sans/Geist-Regular.woff2') format('woff2');
        } */

        body {
            background-color: #0b1326;
            color: #dae2fd;
            overflow-x: hidden;
        }

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

        .active-tab-indicator {
            view-transition-name: active-tab;
        }
    </style>
</x-slot:style>


<button class="relative p-2 hover:bg-white/5 rounded-full transition-all duration-300 active:scale-95 text-secondary"
    id="notification-trigger">
    <span class="material-symbols-outlined">notifications</span>
    <span class="absolute top-2 right-2 w-2 h-2 bg-secondary rounded-full ring-4 ring-surface"></span>
</button>
@if ($errors->any())

    <div id="error-toast"
        class="fixed top-4 right-4 bg-error text-on-error px-4 py-3 rounded-lg shadow-lg z-50 max-w-md transition-all duration-300">
        <div class="flex items-start justify-between gap-3">
            <div class="flex-1">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button onclick="this.closest('#error-toast').remove()" class="text-on-error hover:brightness-150">✕</button>
        </div>
    </div>
    <script>
        // Auto dismiss after 5 seconds
        setTimeout(() => {
            const toast = document.getElementById('error-toast');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            }
        }, 5000);
    </script>
@elseif (session('status'))
    <div id="error-toast"
        class="fixed top-4 right-4 bg-transparent ring-2 px-4 py-3 rounded-lg shadow-lg z-50 max-w-md transition-all duration-300">
        <div class="flex items-start justify-between gap-3">
            <div class="flex-1">
                {{ session('status') }}
            </div>
            <button onclick="this.closest('#error-toast').remove()" class="text-on-success hover:brightness-150">✕</button>
        </div>
    </div>
    <script>
        // Auto dismiss after 5 seconds
        setTimeout(() => {
            const toast = document.getElementById('error-toast');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            }
        }, 5000);
    </script>
@endif
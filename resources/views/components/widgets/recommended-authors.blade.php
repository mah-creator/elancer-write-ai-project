<div class="space-y-5">
    @foreach ($users as $user)
        <form action="{{ route('users.follow', $user->id) }}" method="post">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="flex items-center justify-between px-2">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-secondary-container/20 border border-white/10 flex items-center justify-center text-[12px] font-bold text-secondary">
                        @isset($user->avatar_url)
                            <img class="w-full h-full object-cover rounded-full" alt="{{ $user->name }}"
                                src="{{ $user->avatarUrl }}" />
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) . strtoupper(substr(strrchr($user->name, ' '), 1, 1)) }}
                        @endisset
                    </div>
                    <div>
                        <p class="font-label-sm text-label-sm font-bold text-on-surface">{{ $user->name }}</p>
                        <!-- <p class="font-label-sm text-[11px] text-on-surface-variant/60">Software Engineer</p> -->
                    </div>
                </div>
                <button type="submit"
                    class="px-4 py-1.5 border border-white/20 hover:border-secondary hover:bg-secondary hover:text-on-secondary rounded-full font-label-sm text-[11px] font-bold transition-all">Follow</button>
            </div>
        </form>
    @endforeach
</div>
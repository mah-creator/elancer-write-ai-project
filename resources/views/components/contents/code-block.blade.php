<!-- Code Block Example -->
<div class="glass-card rounded-xl p-6 font-mono text-sm overflow-hidden relative">
    <div class="flex gap-1.5 mb-4">
        <div class="w-2.5 h-2.5 rounded-full bg-error/40"></div>
        <div class="w-2.5 h-2.5 rounded-full bg-secondary/40"></div>
        <div class="w-2.5 h-2.5 rounded-full bg-primary/40"></div>
    </div>
    <pre class="text-secondary/90"><code><span class="text-on-surface-variant">const</span> aetherFocus = (mind) =&gt; {
  <span class="text-on-surface-variant">return</span> mind.filter(distraction =&gt; !distraction)
             .map(idea =&gt; idea.elevate());
};</code></pre>
</div>
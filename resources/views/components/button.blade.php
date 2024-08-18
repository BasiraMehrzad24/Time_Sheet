<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-center items-center py-3 bg-green border rounded-md
    font-nunito text-xs text-white uppercase tracking-widest focus:outline-none disabled:opacity-25 transition
    ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
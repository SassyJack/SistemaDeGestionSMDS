<button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2 bg-blue-200 text-black text-sm font-medium rounded-2xl shadow hover:bg-blue-300 transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</button>
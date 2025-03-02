<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-center justify-center w-full px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-medium text-xs text-white tracking-widest hover:bg-indigo-400 active:bg-indigo-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-296 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

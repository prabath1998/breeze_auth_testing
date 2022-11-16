<x-guest-layout>
    <h1>products</h1>
    @auth
        @if (auth()->user()->is_admin)
            <a href="">Create</a>
        @endif
    @endauth
    @forelse ($products as $product)
        <h2 class="font-bold">{{ $product->name }} - {{ $product->type }}</h2>
        @auth
            <button
                class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mb-5">
                Buy Product</button>
        @endauth

    @empty
        <p>No products available</p>
    @endforelse ($products as $product)


</x-guest-layout>

<x-guest-layout>
    <h1>products</h1>

    @forelse ($products as $product)
        <h2 class="font-bold">{{ $product->name }} - {{ $product->type }}</h2>
        @auth
            <button>Buy Product</button>
        @endauth

    @empty
        <p>No products available</p>
    @endforelse ($products as $product)


</x-guest-layout>

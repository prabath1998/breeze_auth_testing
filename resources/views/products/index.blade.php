<x-guest-layout>
    <h1 class="mb-5">products</h1>

    <div class="container mx-auto">
        @auth
            @if (auth()->user()->is_admin)
                <a href="{{ url('/products/create') }}" class="px-4 py-3 rounded bg-green-400 mb-5">Create</a>
            @endif
        @endauth
        <div class="flex flex-col mt-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->type }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->price }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @auth()
                                                <button class="px-4 py-2 rounded-lg bg-blue-400">Buy Product</button>
                                                <a href="">Edit</a>
                                            @endauth
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Products</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-guest-layout>

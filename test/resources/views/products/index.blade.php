<x-app-layout>
    <div class="flex justify-center mt-10">
            {{--<img src="{{ url('logo.png') }}" class="h-14"/>--}}
            <h2 class="font-semibold text-3xl text-white">Our Galleries</h2>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 px-7">

        @if(session()->has('success'))
            <x-alert message="{{ session('success')}}"/>
        @endif
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-white">List of arts</h2>
            <a href="{{ route('products.create') }}">
                <button class="bg-gray-100 px-10 py-2  rounded-md font-semibold">Add</button>
            </a>
        </div>

        <div class="grid md:grid-cols-3 grid-cols-1 mt-6 gap-7">
            @foreach($products as $product)
                <div class="w-full max-w-sm">
                    <img src="{{ url('storage/' . $product->foto)}}"/>
                    <div class="my-2">
                        <p class="text-white text-xl">{{ $product->nama }}</p>
                        <!--<p class="text-white font-semibold">Rp .{{ number_format($product->harga) }}</p>-->
                        <p class="text-gray-400">by {{ $product->user->name }}</p>
                    </div>
                    <a href="{{ route('products.edit', $product) }}">
                        <button class="bg-gray-100 px-10 py-2 w-full rounded-md font-semibold">Edit</button>
                    </a>
                </div>
            @endforeach
        </div>


        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>

</x-app-layout>

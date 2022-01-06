<div class="bg-white">
  <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
            <div class="flex">
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
            </div>
        </div>
    @endif
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-3 sm:col-span-2">
            <div class="mt-1 flex rounded-md shadow-sm">
                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                <i class="fas fa-search"></i>
                </span>
                <input wire:model="search" placeholder="Search" type="text" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
            </div>
        </div>
    </div>
    <br><br>
    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        
        @foreach ($products as $product)
        <div>
            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                <img src="storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            <b>{{ $product->name }}</b>
                        </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500"> {{ $product->description }}</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">Rp. {{ $product->price }}</p>
                    
                </div>
            </div>
            @if (Auth::user()->role == '0')
            <br>
            <form>
                <button wire:click.prevent="store({{ $product->id }})" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add To Cart</button>
            </form>
            @endif
            </div>
            
        @endforeach

        <!-- More products... -->
        </div>
        <br><br>
        {{ $products->links() }}
    </div>
</div>





         
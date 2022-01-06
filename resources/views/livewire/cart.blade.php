<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cart
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <tbody class="bg-white divide-y divide-gray-200">
          @php
              $total = 0;
          @endphp
          @foreach ($carts as $cart)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="storage/{{ $cart->product->image }}" alt="{{ $cart->product->name }}">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $cart->product->name }}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ $cart->product->description }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Rp. {{ $cart->product->price }}</div>
                <div class="text-sm text-gray-500">Quantity : {{ $cart->quantity }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">
                  Price : Rp. {{ $cart->product->price *  $cart->quantity }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a wire:click="delete({{ $cart->id }})" class="text-indigo-600 hover:text-indigo-900">Remove</a>
              </td>
            </tr>
            @php
                $total += ($cart->product->price * $cart->quantity);
            @endphp
          @endforeach
            <tr>
              <td></td>
              <td></td>
              <td>
                <br>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Total : Rp. {{ $total }}
                </span>
                <br><br>
              </td>
              <td><button wire:click="create()" type="button" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Checkout</button></td>
            </tr>
          </tbody>
        </table>
          @if($isOpen)
              @include('livewire.checkout')
          @endif
      </div>
    </div>
  </div>
</div>


</div>
</div>
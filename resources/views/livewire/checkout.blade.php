<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
  
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
  
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <form>
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
              <div class="mb-4">
                  <label for="buyer_name" class="block text-gray-700 text-sm font-bold mb-2">Name :</label>
                  <input type="text" wire:model="buyer_name" id="buyer_name" placeholder="Enter Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  @error('buyer_name') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email :</label>
                  <input type="email" wire:model="email" id="email" placeholder="Enter Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone :</label>
                  <input type="number" wire:model="phone" id="phone" placeholder="Enter Phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address :</label>
                  <textarea wire:model="address" id="address" placeholder="Enter Address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                  @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label for="postal_code" class="block text-gray-700 text-sm font-bold mb-2">Postal Code :</label>
                  <input type="text" wire:model="postal_code" id="postal_code" placeholder="Enter Postal Code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  @error('postal_code') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="payment" class="block text-gray-700 text-sm font-bold mb-2">Payment</label>
                <select wire:model="payment" id="payment" autocomplete="payment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  <option value="" disabled selected>Select Payment</option>  
                  <option value="GoPay">GoPay</option>
                  <option value="Dana">Dana</option>
                  <option value="LinkAja">LinkAja</option>
                </select>
                @error('payment') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="shipment" class="block text-gray-700 text-sm font-bold mb-2">Shipment</label>
                <select wire:model="shipment" id="shipment" autocomplete="shipment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  <option value="" disabled selected>Select Shipment</option>
                  <option value="JNE">JNE</option>
                  <option value="J&T">J&T</option>
                  <option value="POS Indonesia">POS Indonesia</option>
                </select>
                @error('shipment') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Total Price : Rp. {{ $total }}
                </span>
              </div>

        </div>
      </div>
  
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
          <button wire:click.prevent="store({{ $total }})" type="button" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            Checkout
          </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            
          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Cancel
          </button>
        </span>
        </form>
      </div>
        
    </div>
  </div>
</div>
<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Checkout;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Document;
  
class Checkouts extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $checkouts, $user_id, $buyer_name, $email, $phone, $address, $postal_code, $total_price, $payment, $shipment, $status, $checkout_id;
    public $isOpen = 0;
  
    public function render()
    {
        $this->carts = Cart::all()->sortByDesc('id');
        return view('livewire.carts');
    }
  
    private function resetInputFields(){
        $this->user_id = '';
        $this->buyer_name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->postal_code = '';
        $this->total_price = '';
        $this->payment = '';
        $this->shipment = '';
        $this->checkout_id = '';
    }
     
    public function store()
    {
        $this->validate([
            'user_id' => 'required',
            'buyer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'total_price' => 'required',
            'payment' => 'required',
            'shipment' => 'required',
        ]);

        $product = Product::create([
            'user_id' => $this->user_id,
            'buyer_name' => $this->buyer_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'total_price' => $this->total_price,
            'payment' => $this->payment,
            'shipment' => $this->shipment,
            'status' => '0'
        ]);
  
        session()->flash('message', 'Checkout Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
}
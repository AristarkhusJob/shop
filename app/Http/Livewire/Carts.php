<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Checkout;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Document;
use Auth;
  
class Carts extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $carts, $product_id, $checkout_id, $user_id, $quantity, $status, $cart_id, $total;
    public $isOpen = 0;
  
    public function render()
    {
        $this->carts = Cart::where('user_id', Auth::user()->id)
                            ->where('status', '0')
                            ->get();
        $this->total = Cart::where('user_id', Auth::user()->id)
                        ->where('status', '0')
                        ->get()
                        ->sum('price');
                        
        return view('livewire.cart');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    public function closeModal()
    {
        $this->isOpen = false;
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
     
    public function store($total)
    {
        $this->validate([
            'buyer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'payment' => 'required',
            'shipment' => 'required',
        ]);

        $product = Checkout::create([
            'user_id' => Auth::user()->id,
            'buyer_name' => $this->buyer_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'total_price' => $total,
            'payment' => $this->payment,
            'shipment' => $this->shipment,
            'status' => '0'
        ]);
  
        session()->flash('message', 'Checkout Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        session()->flash('message', 'Product Deleted Successfully.');
    }
}
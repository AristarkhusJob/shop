<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Document;
use Auth;
  
class Shops extends Component
{
    use WithPagination;

    public $search = '';
    public $carts, $product_id, $checkout_id, $user_id, $quantity, $status, $cart_id;
 
    public function updatingSearch()
    {
        $this->resetPage();
    }
  
    public function render()
    {
        return view('livewire.shop', [
            'products' => Product::where('name', 'like', '%'.$this->search.'%')
                                ->orWhere('description', 'like', '%'.$this->search.'%')
                                ->orWhere('price', 'like', '%'.$this->search.'%')
                                ->orderBy('id', 'desc')
                                ->paginate(8),
        ]);
    }

    private function resetInputFields(){
        $this->product_id = '';
        $this->checkout_id = '';
        $this->user_id = '';
        $this->quantity = '';
        $this->status = '';
        $this->cart_id = '';
    }
     
    public function store($product_id)
    {
    
        $product = Cart::create([
            'product_id' => $product_id,
            'user_id' => Auth::user()->id,
            'quantity' => '1',
            'status' => '0'
            
        ]);
  
        session()->flash('message', 'Product Added to Cart Successfully.');
  
        $this->resetInputFields();
    }

}
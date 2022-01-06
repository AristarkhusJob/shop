<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Document;
  
class Products extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $description, $price, $stock, $image, $tempImage, $product_id;
    public $isOpen = 0;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
 
    public function render()
    {
        return view('livewire.products', [
            'products' => Product::where('name', 'like', '%'.$this->search.'%')
                                ->orWhere('description', 'like', '%'.$this->search.'%')
                                ->orWhere('price', 'like', '%'.$this->search.'%')
                                ->orderBy('id', 'desc')
                                ->paginate(5),
        ]);
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
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->stock = '';
        $this->image = '';
        $this->product_id = '';
    }
     
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $imageDirectory = $this->image->store('public');
   
        $product = Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image' => str_replace('public/', '', $imageDirectory)
        ]);

        // updateOrCreate performed an update
        if(!$product->wasRecentlyCreated && $product->wasChanged()){
            $currentProduct = Product::find($this->product_id); 
            if(\File::exists("storage/".$currentProduct->tempImage)) {
                \File::delete("storage/".$currentProduct->tempImage);
            }
            $currentProduct->update([
                'tempImage' => str_replace('public/', '', $imageDirectory)
            ]);
        }

        // updateOrCreate performed create
        if($product->wasRecentlyCreated){
            $currentProduct = Product::latest()->first(); 
            $currentProduct->update([
                'tempImage' => str_replace('public/', '', $imageDirectory)
            ]);
        }

        
        
  
        session()->flash('message', 
            $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $product = Product::find($id);

        if(\File::exists("storage/".$product->image)) {
            \File::delete("storage/".$product->image);
        }

        $product->delete();

        session()->flash('message', 'Product Deleted Successfully.');
    }
}
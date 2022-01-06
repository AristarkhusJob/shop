<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Auth;

class HomeController extends Controller
{
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function index()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')
                            ->orWhere('description', 'like', '%'.$this->search.'%')
                            ->orWhere('price', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'desc')
                            ->paginate(8);
    
        if (Auth::user()) {
            return redirect('shop');
        } else {
            return view('welcome',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }
}

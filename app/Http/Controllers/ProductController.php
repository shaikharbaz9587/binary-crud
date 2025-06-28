<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\controllers\controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

        public function __construct(){

            $this->middleware('auth');

        }


    public function index()
    {
        $products = Products::paginate(5);
        return view('welcome', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'sku' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'img' => 'nullable|mimes:png,jpg,jpeg,webp',
            'status' => 'sometimes',
        ]);


        $filename = NULL;
        $path = NULL;

        if($request->has('img')){

            $file = $request->file('img');
           
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/product/';
            $file->move($path, $filename);
            $save[]['img'] = "$path.$filename";

            // Products::insert($save);
        
        }

        Products::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'img' => $request->$path.$filename,
            'status' => $request->status == true ? 1:0,
          
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        
        
        $request->validate([
            'name' => 'required|string',
            'sku' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'img' => 'nullable|mimes:png,jpg,jpeg,webp',
            // 'status' => 'sometimes',
        ]);

       
        if($request->has('img')){

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            
            $path = 'uploads/product/';
            $file->move($path, $filename);
            
            if(File::exists($product->img)){
                File::delete($product->img);
            }
            
        }

        

        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'img' => $request->$path.$filename,
            'status' => $request->status,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }








    public function destroy($id)
    {
        Products::destroy($id);
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }


 

}


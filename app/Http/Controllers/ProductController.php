<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $viewProducts = Product::all();
        return view('backend.product.view-product', compact('viewProducts'));
    }
    public function viewProduct(){
        $viewProducts = Product::all();
        return view('backend.product.view-product', compact('viewProducts'));
    }
    public function addProduct(){
        return view('backend.product.add-product');
    }
    public function storeProduct(Request $request){
        $request->validate([
            'name' =>'required|unique:products',
            'price' => 'required',
            'expired_date' =>'required'
        ]);
        $storeProduct = new Product();
        $storeProduct['name'] = $request['name'];
        $storeProduct['price'] = $request['price'];
        $storeProduct['expired_date'] = $request['expired_date'];
        $storeProduct->save();
        $notification = [
            'message' => 'Product Saved Succesfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('add.product')->with($notification);
    }
    public function editProduct($id){
        $editProduct = Product::find($id);
        return view('backend.product.edit-product', compact('editProduct'));
    }
    public function updateProduct(Request $request, $id){
        $request->validate([
            'name' =>'required',
            'price' => 'required',
            'expired_date' =>'required'
        ]);
        $updateProduct = Product::find($id);
        $updateProduct['name'] = $request['name'];
        $updateProduct['price'] = $request['price'];
        $updateProduct['expired_date'] = $request['expired_date'];
        $updateProduct->update();
        $notification = [
            'message' => 'Product Updated Succesfully',
            'alert-type' => 'info',
        ];
        return redirect()->route('view.product')->with($notification);
    }
    public function deleteProduct($id){
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        $notification = [
            'message' => 'Product Deleted Succesfully',
            'alert-type' => 'warning',
        ];
        return redirect()->route('view.product')->with($notification);
    }
}

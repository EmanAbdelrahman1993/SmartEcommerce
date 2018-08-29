<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Session;
use Illuminate\Http\Request;


class ProductController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.product.index')->with('products',$products);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create')->with('category',$category);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|string',
            'status' => 'required|int',
            'user_id' => 'required|int',
            'category_id' => 'required|int',
            'has_points' => 'required|int',
            'replace_points' => 'required|int',
            'status' => 'required|int',
            'rating' => 'required|int',
            'tags' => 'nullable|string',
        ]);


        Product::create($request->all());


        Session::flash('success', 'The Product was successfully Save!');
        return redirect('product');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.show')->with('product',$product);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit',compact('product'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|string',
            'status' => 'required|int',
            'user_id' => 'required|int',
            'category_id' => 'required|int',
            'has_points' => 'required|int',
            'replace_points' => 'required|int',
            'status' => 'required|int',
            'rating' => 'required|int',
            'tags' => 'nullable|string',
        ]);


        $product->update($request->all());


        return redirect()->route('admin.product.index')
            ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success','Product deleted successfully');
    }
}

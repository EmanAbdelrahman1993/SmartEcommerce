<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\User;
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
        $users = User::all();
        $categories = Category::where('parent', '=', 0)->get();
        $childCategories = Category::where('parent', '!=', 0)->get();

        return view('admin.product.create')->with(['categories'=>$categories ,'childCategories'=>$childCategories, 'users' => $users]);
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
            'category' => 'required|int',
            'has_points' => 'required|int',
            'replace_points' => 'required|int',
            'status' => 'required|int',
            'rating' => 'required|int',
            'tags' => 'nullable|string',
            'image' =>'required|image',
        ]);
//        dd($request->image);


        // Store in the database
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->has_points = $request->has_points;
        $product->replace_points = $request->replace_points;
        $product->price = $request->price;
        $product->country_made = $request->country;
        $product->user_id = auth()->user()->id;
        $product->status = $request->status;
        $product->rating = $request->rating;
        $product->tags = $request->tags;
        $product->category_id = $request->category;

      //  dd($request->file('image'));
        if ($request->hasFile('image')) {
            //dd($request->image);

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $product->image = $name;
            //dd($new->image);
        }
        $product->save();

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
        $product = Product::find($id);
        $categories = Category::where('parent', '=', 0)->get();
        $childCategories = Category::where('parent', '!=', 0)->get();

//        dd($allCategories);
        return view('admin.product.edit')->with(['product'=>$product , 'categories' => $categories , 'childCategories' => $childCategories]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|string',
            'status' => 'required|int',
            'category' => 'required|int',
            'has_points' => 'required|int',
            'replace_points' => 'required|int',
            'status' => 'required|int',
            'rating' => 'required|int',
            'tags' => 'nullable|string',
        ]);

        // Update in the database
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->has_points = $request->has_points;
        $product->replace_points = $request->replace_points;
        $product->price = $request->price;
        $product->country_made = $request->country;
        $product->user_id = auth()->user()->id;
        $product->status = $request->status;
        $product->rating = $request->rating;
        $product->tags = $request->tags;
        $product->category_id = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $product->image = $name;
            //dd($new->image);
        }

        $product->save();

        Session::flash('success', 'The Product was successfully Updated!');
        return redirect('product');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Session::flash('success', 'Product was successfully deleted.');
        return redirect('/product');
    }
}

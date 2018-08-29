<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty($_GET['sort'])){
            $sort = $_GET['sort'];
        }else {
            $sort = 'ASC';
        }
        $categories = Category::where('parent', '=', 0)->orderBy('id', $sort)->get();
        $childCategories = Category::where('parent', '!=', 0)->orderBy('id', $sort)->get();
        return view('admin.category.index')->with(['categories'=>$categories , 'childCategories'=>$childCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.category.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

            $this->validate($request, array(
                'name' => 'required|string|unique:categories|max:255',
                'description' => 'nullable|string',
                'parent' => 'int',
                'status' => 'int',
            ));

        // Store in the database
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent = $request->parent;
        $category->user_id = auth()->user()->id;

        $category->status = $request->status;
        $category->save();

        Session::flash('success', 'The Category was successfully Save!');
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $category = Category::findOrFail($id);
//
//        return view('')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $allCategories = Category::where('parent', '=', '0')->orderBy('id', 'ASC')->get();
//        dd($allCategories);

        return view('admin.category.edit')->with(['category'=>$category , 'allCategories' => $allCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->input('name') == $category->name) {
            $this->validate($request, array(
                'description' => 'nullable|string',
                'parent' => 'int',
                'status' => 'int',

            ));
        } else {
            $this->validate($request, array(
                'name' => 'required|string|unique:categories|max:255',
                'description' => 'nullable|string',
                'parent' => 'int',
                'status' => 'int',
            ));
        }

        // Store in the database
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent = $request->parent;
        $category->status = $request->status;
        $category->save();

        Session::flash('success', 'The Category was successfully Updated!');
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('success', 'The Categroy was successfuly deleted.');
        return redirect('/category');
    }
}

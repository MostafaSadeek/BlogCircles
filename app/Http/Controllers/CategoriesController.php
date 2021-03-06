<?php

namespace App\Http\Controllers;
use validator;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();

        return view('categories.index',compact('cats'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
       
      Category::create($request->all());

      session()->flash('success','Category Created Successfuly');

      return redirect(route('categories.index'));

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.create')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    { 
      // $ccc is object from Category model inside it is array with data like id and name

    //   $category= Category::find($id);

        
        $category->update([
            'name'=> $request->name


  ]);
        session()->flash('success','Upadeted!!!');
        return redirect(route('categories.index'));
  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'));


    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::orderBy('id',"DESC")->paginate();
        return view('dashboard.category.index',compact('categories'));
    }
    public function show($id){
        $category=Category::find($id);
        $discounts=Discount::get();
        return view('dashboard.category.show',compact('category','discounts'));
    }
    public function create(){
        return view('dashboard.category.create');
    }
    public function store(CategoryRequest $request){
        Category::create($request->except('_token'));
        return redirect()->route('dashboard.category.index');
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('dashboard.category.index');
    }
    public function edit(Category $category){
        return view('dashboard.category.edit',compact('category'));
    }



    public function update(CategoryRequest $request ,Category $category){
        $category->update($request->validated());
        return redirect()->route('dashboard.category.index');
    }

    public function addDiscount(Category $category,Request $request){
        $request->validate(['discount_id'=>'required|exists:discounts,id']);
        $category->update(['discount_id'=>$request->discount_id]);
        return view('dashboard.category.edit',compact('category'));
    }
}

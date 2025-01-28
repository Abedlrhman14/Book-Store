<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class discountsController extends Controller
{
    public function index(){
        $discounts=Discount::orderBy('id',"DESC")->paginate();
        return view('dashboard.discount.index',compact('discounts'));
    }
    public function show($id){
        $discount=Discount::find($id);
        return view('dashboard.discount.show',compact('discount'));
    }
    public function create(){
        return view('dashboard.discount.create');
    }
    public function store(DiscountRequest $request){
        Discount::create($request->except('_token'));
        return redirect()->route('dashboard.discount.index');
    }
    public function destroy(Discount $discount){
        $discount->delete();
        return redirect()->route('dashboard.discount.index');
    }
    public function edit(Discount $discount){
        return view('dashboard.discount.edit',compact('discount'));
    }


    public function update(DiscountRequest $request ,Discount $discount){
        $discount->update($request->validated());
        return redirect()->route('dashboard.discount.index');
    }
    public function checkCode(Request $request){
        $discount = Discount::where('code',$request->code)->count();
        return response()->json(['data'=>['is_exist'=>$discount]]);
    }
    public function search(Request $request){
        $discounts = Discount::whereLike('code',"%$request->q%")->orwhereLike('percentage',"%$request->q%")->limit(5)->get();
        return response()->json(['data'=>['discounts'=>$discounts]]);
    }
}

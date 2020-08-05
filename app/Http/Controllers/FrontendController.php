<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
class FrontendController extends Controller
{
    public function home(){
    	$items=Item::orderBy('id','desc')->take(3)->get();
    	
    	return view('frontend.home',compact('items'));
    }

//Same to Itemcontroller->show()
    public function itemdetail($item)
    {
    	$item=Item::find($item);
    	return view('frontend.detail',compact('item'));
    }
    public function cart(){
    	return view('frontend.cart');

    }

    public function checkout(Request $request){
       // return view('frontend.cart');
       
            $total=0;
        $arr=json_decode($request->data);
        $list= $arr->product_list;
        foreach ( $list as $row) {
            $subtotal=$row->price*$row->quantity;
            $total+=$subtotal;
        }
        $order=new Order;
       $order->orderdate=now();
        $order->voucherno=uniqid();
        $order->total=$total;
        $order->note='Note Here';
        $order->status=0;
        $order->user_id=1;//auth id

        $order->save();
        
        //insert into item_order
        foreach ( $list as $row) {

                $order->items()->attach($row->id,['qty'=>$row->quantity]);

        }
        return 'Your Order Successful!';
        
        

    }
}

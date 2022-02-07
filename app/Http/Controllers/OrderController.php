<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index()
    {

        return Order::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return $order;
    }


    public function store(Request $request)
    {

        $request->validate([
            'cartItems' => 'required',
            'shippingAddress' => 'required',
            'user_name' => 'required',
            'totalPrice' => 'required',

        ]);
        return Order::create($request->all());
        // $order = new Order();

        // $order->user_id = $request->user_id;
        // $order->cartItems = $request->all();
        // $order->shippingAddress = $request->all();
        // $order->totalPrice = $request->totalPrice;
        // $order->save();
        // return $order;


        // $request->validate([
        //     'user_id' =>  auth("sanctum")->user()->id,
        //     'cartItems' => 'required',
        //     'shippingAddress' => 'required',
        //     'totalPrice' => 'required',

        // ]);

        // return Order::create($request->all());
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return "order deleted";
    }
}

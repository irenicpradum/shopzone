<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
   public function index()
{
    $data = Product::all();
    return view('product', [
        'products' => $data
    ]);
}

     public function detail($id)
     {
         $data = Product::find($id);
     
         return view('detail', [
             'product' => $data
         ]);
     }

      function search(Request $req)
     {
         
         $data=Product::where('name','like','%'.$req->input('query').'%')->get();
         return view('search',['products'=>$data]);
     }
// addToCart
    public function addToCart(Request $req)
{
    if ($req->session()->has('user')) {

        $cart = new Cart;

        $cart->user_id = $req->session()->get('user')['id'];

        $cart->product_id = $req->product_id;

        $cart->save();

        return redirect('/');
    }

    return redirect('/login');
}
// cartList
public function cartList(Request $req)
{
    if($req->session()->has('user'))
    {
        $userId = $req->session()->get('user')['id'];

        $cart = Cart::where('user_id', $userId)
                    
                    ->with('product')
                    ->get();

        return view('cartlist', [
            'cart' => $cart
        ]);
    }
    else
    {
        return redirect('/login');
    }
}
// removeCart
public function removeCart($id)
{
    Cart::where('id',$id)->delete();

    return redirect('/cartlist');
}

// ordernow
public function orderNow(Request $req)
{
    if (!$req->session()->has('user')) {
        return redirect('/login');
    }

    $user = $req->session()->get('user');

    $cart = Cart::where('user_id', $user['id'])
                ->with('product')
                ->get();

    return view('ordernow', compact('cart'));
}
// orderPlace
public function orderPlace(Request $req)
{
    if (!$req->session()->has('user')) {
        return redirect('/login');
    }
    $user = $req->session()->get('user');
    $cart = Cart::where('user_id', $user['id'])->get();
    foreach ($cart as $item) {
        $order = new Order;
        $order->user_id = $user['id'];
        $order->product_id = $item->product_id;
        $order->address = $req->address;
        $order->status = 'pending';
        $order->payment_method = $req->payment_method;
        $order->payment_status = 'pending';
        $order->save();
    }
    Cart::where('user_id', $user['id'])->delete();
    return redirect('/')->with('success', 'Order placed successfully');
}
// myorder
public function myOrder(Request $req)
{
    if (!$req->session()->has('user')) {
        return redirect('/login');
    }

    $user = $req->session()->get('user');

    $orders = Order::where('user_id', $user['id'])
                   ->with('product')
                   ->latest()
                   ->get();

    return view('myorder', compact('orders'));
}

}

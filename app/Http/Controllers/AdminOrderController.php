<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        // Orders ke saath product details join karke fetch karna
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'orders.*',
                'products.name as product_name',
                'products.gallery as product_gallery',
                'products.price as product_price',
                'users.name as user_name',
                'users.email as user_email'
            )
            ->latest('orders.id')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'payment_status' => 'required|string'
        ]);

        DB::table('orders')->where('id', $id)->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status
        ]);

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
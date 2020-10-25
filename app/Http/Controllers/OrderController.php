<?php

namespace App\Http\Controllers;

use App\Events\OrderStored;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * @param $product_id
     * @return Application|Factory|View
     */
    public function create($product_id)
    {
        $product = Product::query()->findOrFail($product_id);
        return view('order_form', compact('product'));
    }

    /**
     * @param $product_id
     * @param OrderStoreRequest $request
     * @return RedirectResponse
     */
    public function store($product_id, OrderStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            /** @var Product $product */
            $product = Product::query()->findOrFail($product_id);
            $order = Order::query()->create($request->except(['_token', '_method', 'quantity']));
            $product->orders()->attach($order, ['quantity' => $request->get('quantity')]);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors('Something went wrong')->withInput($request->all());
        }

        DB::commit();
        event(new OrderStored($order));

        return redirect()->route('home')->with('message', 'Product successfully ordered.');
    }
}

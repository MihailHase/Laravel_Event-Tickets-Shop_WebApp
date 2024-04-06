<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Stripe\Stripe;
use Stripe\Checkout\Session;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::all();

        return view('cart.index', compact('cartItems'));
    }


    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cartItems = Cart::all();

        $lineItems = [];

        foreach ($cartItems as $cartItem) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd', // Change currency as needed
                    'product_data' => [
                        'name' => $cartItem->type,
                    ],
                    'unit_amount' => $cartItem->price * 100, // Stripe requires amount in cents
                ],
                'quantity' => $cartItem->quantity,
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect()->to($session->url);
    }

    public function checkoutSuccess(Request $request)
    {
        return view('checkout.success');
    }

    public function checkoutCancel(Request $request)
    {
        return redirect()->route('cart')->with('error', 'Checkout was cancelled.');
    }

    public function update(Request $request)
    {
        $data = $request->input('quantity');

        foreach ($data as $cartItemId => $quantity) {
            $cartItem = Cart::findOrFail($cartItemId);
            $cartItem->update(['quantity' => $quantity]);
        }

        return redirect()->route('cart')->with('success', 'Cantități actualizate în coșul de cumpărături!');
    }

    public function delete($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect()->route('cart')->with('success', 'Bilet șters din coșul de cumpărături!');
    }

    public function emptyCart()
    {
        Cart::truncate();

        return redirect()->route('cart')->with('success', 'Coșul de cumpărături este golit!');
    }

}

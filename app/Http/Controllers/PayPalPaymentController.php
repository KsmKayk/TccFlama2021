<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Order_status;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;
use Symfony\Component\Console\Input\Input;

class PayPalPaymentController extends Controller
{


    public function handlePayment()
    {
        $data = [];
        $data['items'] = [];

        $user_id = Auth::id();
        \Cart::session($user_id);
        $items = \Cart::getContent();

        $order_status = Order_status::where('name', 'PAGAMENTO_PENDENTE')->first();
        $order = Order::create([
            'user_id' => $user_id,
            'status_id' => $order_status->id,
        ]);

    foreach ($items as $item) {

            array_push($data['items'], [
                'name' => strval($item->name),
                'price' => intval(ceil($item->price)),
                'desc' => strval($item->name . ' - ' . $item->quantity,),
                'qty' => intval(ceil($item->quantity))
            ]);

            OrderItem::create([
                'quantity' => $item->quantity,
                'description' => strval($item->name . ' - ' . $item->attributes->size),
                'order_id' => $order->id,
                'product_id' => $item->attributes->product_id,
            ]);
        }




        $data['invoice_id'] = 1;

        $data['invoice_description'] = "";
        $data['return_url'] = route('success.payment');
        $data['cancel_url'] = route('cancel.payment');
        $total = 0;

        foreach ($data['items'] as $item) {
            $data['invoice_description'] = $data['invoice_description'] . $item['name'] . ' x ' . $item['qty'] . ' ';
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;

        $provider = PayPal::setProvider('express_checkout');



        $res = $provider->setExpressCheckout($data);
        $res = $provider->setExpressCheckout($data, true);

        $paypal_token = $res['TOKEN'];

        $order->paypal_token = $paypal_token;
        $order->save();

        return redirect($res['paypal_link']);
    }

    public function paymentCancel(Request $request)
    {
        $order = Order::where('paypal_token', $request->token)->first();
            $order->status_id = Order_status::where('name', 'CANCELADO')->first()->id;
            $order->save();

            return redirect('/');
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $user_id = Auth::id();
            Cart::session($user_id)->clear();

            $order = Order::where('paypal_token', $request->token)->first();
            $order->status_id = Order_status::where('name', 'AGUARDANDO_ENVIO')->first()->id;
            $order->save();

            return redirect('/');
        }

        dd('Error occured!');
    }
}

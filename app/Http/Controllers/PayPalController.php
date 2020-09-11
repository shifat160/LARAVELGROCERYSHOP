<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
//use Srmklive\PayPal\Facades\PayPal;
use Darryldecode\Cart\Cart;
use Srmklive\PayPal\Services\ExpressCheckout;


class PayPalController extends Controller
{
    

    public function getExpressCheckout()

    {   
        $checkoutData = $this->checkoutData();

        
        $provider = new ExpressCheckout(); 
        $response = $provider->setExpressCheckout($checkoutData);

        return redirect($response['paypal_link']);
        //dd($response);
    }

    private function checkoutData(){
        $cart = \Cart::session(auth()->id());

        // dd(cart->getContent()->toarray());


        $cartItems = array_map( function($item) {
            return [
                'name'=>$item['name'],
                'price'=>$item['price'],
                'qty'=>$item['quantity']
            ];
        }, $cart->getContent()->toarray());

    


        $checkoutData = [
            'items'=> $cartItems,
            'return_url'=> route('paypal.success'),
            'cancel_url'=> route('paypal.cancel'),
            'invoice_id'=> uniqid(),
            'invoice_description'=> "Order Description",
            'total'=> $cart->getTotal()
        ];

        return $checkoutData;
    }




    public function cancelPage(){
        dd('payment failed');
    }


    
    public function getExpressCheckoutSuccess(Request $request){
        $token = $request->get('token');
        $payerID = $request->get('payerID');
        $checkoutData = $this->checkoutData();

        $provider = new ExpressCheckout();

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // Perform transaction on PayPal
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerID);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
        }

        dd('payment success');
    }

}

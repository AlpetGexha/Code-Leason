<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicePaymentController extends Controller
{
    public function pay(Request $request)
    {
        $request->validate([
            'paymentMethod' => 'required',
        ]);


        // make as stripe costumer
        auth()->user()->createAsStripeCustomer();
        // update  method
        auth()->user()->updateDefaultPaymentMethod($request->paymentMethod);
        // Make invoice
        auth()->user()->invoiceFor('One-time charge', 22 * 100);

        return to_route('invoice.get');
    }

    public function index()
    {
        return view('invoice', [
            'intent' => auth()->user()->createSetupIntent(),
            'invoices' => auth()->user()->invoices()
        ]);
    }

    public function download(Request $request, $invoiceId)
    {
        return  $request->user()->downloadInvoice($invoiceId, [
            'vendor' => 'AlpetG',
            'product' => 'Your Product',
            'street' => 'Main Str. 1',
            'location' => '2000 Antwerp, Belgium',
            'phone' => '+32 499 00 00 00',
            'email' => 'info@example.com',
            'url' => config('app.url'),
            'vendorVat' => 'BE123456789',
        ]);
    }
}

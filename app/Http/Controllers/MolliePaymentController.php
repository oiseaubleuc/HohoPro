<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\Models\Invoice;

class MolliePaymentController extends Controller
{
    public function preparePayment(Invoice $invoice)
    {
        $amount = number_format(
            $invoice->items->sum(fn($item) => $item->quantity * $item->unit_price),
            2,
            '.',
            ''
        );

        $payment = Mollie::api()->payments()->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $amount,
            ],
            "description" => "Factuur " . $invoice->invoice_number,
            "redirectUrl" => route('payment.success', $invoice->id),
            "webhookUrl" => route('payment.webhook'),
            "metadata" => [
                "invoice_id" => $invoice->id,
            ],
        ]);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function paymentSuccess(Invoice $invoice)
    {
        $invoice->status = 'paid';
        $invoice->save();

        return redirect()->route('invoices.show', $invoice->id)
            ->with('success', 'Factuur werd succesvol betaald via Mollie.');
    }

    public function webhook(Request $request)
    {
        $payment = Mollie::api()->payments()->get($request->id);
        $invoiceId = $payment->metadata->invoice_id;

        if ($payment->isPaid()) {
            $invoice = Invoice::find($invoiceId);
            if ($invoice && $invoice->status !== 'paid') {
                $invoice->status = 'paid';
                $invoice->save();
            }
        }

        return response()->json(['status' => 'ok']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Invoice::with('client');

        if ($status === 'open' || $status === 'paid') {
            $query->where('status', $status);
        }

        $invoices = $query->get();

        return view('invoices.index', compact('invoices', 'status'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('user_id', Auth::id())->get();
        return view('invoices.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'items.*.description' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::create([
            'user_id' => Auth::id(),
            'client_id' => $request->client_id,
            'invoice_number' => 'INV-' . time(),
            'invoice_date' => $request->invoice_date,
            'status' => 'open',
        ]);

        foreach ($request->items as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
        }

        return redirect()->route('invoices.show', $invoice->id);
    }


    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('client', 'items');
        return view('invoices.show', compact('invoice'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function download(\App\Models\Invoice $invoice)
    {
        $invoice->load('client', 'items');

        $pdf = Pdf::loadView('invoices.pdf', compact('invoice'));

        return $pdf->download('factuur-' . $invoice->invoice_number . '.pdf');
    }
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('status')->default('open');
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    public function markAsPaid(Invoice $invoice)
    {
        $invoice->status = 'paid';
        $invoice->save();

        return redirect()->back()->with('success', 'Factuur is gemarkeerd als betaald.');
    }


}

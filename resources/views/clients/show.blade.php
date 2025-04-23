@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Klant: {{ $client->name }}</h1>

        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>Bedrijf:</strong> {{ $client->company_name }}</p>
        <p><strong>BTW-nummer:</strong> {{ $client->vat_number }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">Facturen</h2>
        @if ($client->invoices->isEmpty())
            <p>Geen facturen gevonden voor deze klant.</p>
        @else
            <ul class="list-disc list-inside">
                @foreach ($client->invoices as $invoice)
                    <li>
                        <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-600 underline">
                            Factuur {{ $invoice->invoice_number }} – € {{ number_format($invoice->items->sum(fn($i) => $i->unit_price * $i->quantity), 2, ',', '.') }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

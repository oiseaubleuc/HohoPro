@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Factuur {{ $invoice->invoice_number }}</h1>

        <p><strong>Datum:</strong> {{ $invoice->invoice_date }}</p>
        <p><strong>Klant:</strong> {{ $invoice->client->name }}</p>

        <p class="mt-2">
            <strong>Status:</strong>
            @if ($invoice->status === 'paid')
                <span class="text-green-600 font-semibold">Betaald</span>
            @else
                <span class="text-red-600 font-semibold">Open</span>
            @endif
        </p>

        <h3 class="text-xl font-semibold mt-6">Items</h3>
        <table class="table-auto border-collapse w-full mt-2">
            <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Beschrijving</th>
                <th class="border px-4 py-2">Aantal</th>
                <th class="border px-4 py-2">Prijs</th>
                <th class="border px-4 py-2">Totaal</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0; @endphp
            @foreach($invoice->items as $item)
                @php
                    $line = $item->quantity * $item->unit_price;
                    $total += $line;
                @endphp
                <tr>
                    <td class="border px-4 py-2">{{ $item->description }}</td>
                    <td class="border px-4 py-2">{{ $item->quantity }}</td>
                    <td class="border px-4 py-2">€ {{ number_format($item->unit_price, 2, ',', '.') }}</td>
                    <td class="border px-4 py-2">€ {{ number_format($line, 2, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="bg-gray-100">
                <td colspan="3" class="text-right border px-4 py-2 font-bold">Totaal</td>
                <td class="border px-4 py-2 font-bold">€ {{ number_format($total, 2, ',', '.') }}</td>
            </tr>
            </tfoot>
        </table>

        @if ($invoice->status === 'open')
            <form action="{{ route('invoices.markAsPaid', $invoice->id) }}" method="POST" class="mt-6">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                    Markeer als betaald
                </button>
            </form>
        @else
            <p class="text-green-600 font-semibold mt-6">Deze factuur is betaald.</p>
        @endif

        <a href="{{ route('invoices.download', $invoice->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded mt-4 inline-block">
            Download als PDF
        </a>
        <a href="{{ route('mollie.pay', $invoice->id) }}" class="bg-purple-600 text-white px-4 py-2 rounded mt-4 inline-block">
            Betaal via Bancontact
        </a>

    </div>
@endsection


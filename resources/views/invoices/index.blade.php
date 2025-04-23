@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-4">Facturen</h1>
        <div class="mb-4">
            <a href="{{ route('invoices.index') }}" class="px-3 py-1 rounded {{ is_null($status) ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Alle
            </a>
            <a href="{{ route('invoices.index', ['status' => 'open']) }}" class="px-3 py-1 rounded {{ $status === 'open' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Open
            </a>
            <a href="{{ route('invoices.index', ['status' => 'paid']) }}" class="px-3 py-1 rounded {{ $status === 'paid' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                Betaald
            </a>
        </div>

        @if ($invoices->isEmpty())
            <p class="text-gray-500">Nog geen facturen beschikbaar.</p>
        @else
            <table class="min-w-full bg-white border">
                <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4">Factuurnummer</th>
                    <th class="py-2 px-4">Klant</th>
                    <th class="py-2 px-4">Datum</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $invoice->invoice_number }}</td>
                        <td class="py-2 px-4">{{ $invoice->client->name }}</td>
                        <td class="py-2 px-4">{{ $invoice->invoice_date }}</td>
                        <td class="py-2 px-4 capitalize">
                            @if ($invoice->status === 'paid')
                                <span class="text-green-600 font-semibold">Betaald</span>
                            @else
                                <span class="text-red-600 font-semibold">Open</span>
                            @endif
                        </td>
                        <td class="py-2 px-4">
                            <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-600 underline">Bekijk</a>
                            |
                            <a href="{{ route('invoices.download', $invoice->id) }}" class="text-green-600 underline">Download PDF</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

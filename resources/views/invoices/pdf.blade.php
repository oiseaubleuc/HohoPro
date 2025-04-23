<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Factuur {{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
<h2>Factuur {{ $invoice->invoice_number }}</h2>
<p><strong>Datum:</strong> {{ $invoice->invoice_date }}</p>

<h3>Klantgegevens</h3>
<p>
    {{ $invoice->client->name }}<br>
    {{ $invoice->client->email }}<br>
    {{ $invoice->client->company_name }}<br>
    BTW: {{ $invoice->client->vat_number }}
</p>

<h3>Items</h3>
<table>
    <thead>
    <tr>
        <th>Beschrijving</th>
        <th>Aantal</th>
        <th>Prijs</th>
        <th>Totaal</th>
    </tr>
    </thead>
    <tbody>
    @php $total = 0; @endphp
    @foreach($invoice->items as $item)
        @php $line = $item->quantity * $item->unit_price; $total += $line; @endphp
        <tr>
            <td>{{ $item->description }}</td>
            <td>{{ $item->quantity }}</td>
            <td>€ {{ number_format($item->unit_price, 2, ',', '.') }}</td>
            <td>€ {{ number_format($line, 2, ',', '.') }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3"><strong>Totaal</strong></td>
        <td><strong>€ {{ number_format($total, 2, ',', '.') }}</strong></td>
    </tr>
    </tfoot>
</table>
</body>
</html>

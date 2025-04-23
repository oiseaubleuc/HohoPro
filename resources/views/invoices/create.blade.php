@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuwe factuur</h1>

        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Klant</label>
                <select name="client_id" class="form-control" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Datum</label>
                <input type="date" name="invoice_date" class="form-control" required>
            </div>

            <h4>Items</h4>
            <div id="items">
                <div class="item mb-3">
                    <input type="text" name="items[0][description]" placeholder="Beschrijving" required>
                    <input type="number" name="items[0][quantity]" placeholder="Aantal" required>
                    <input type="number" name="items[0][unit_price]" placeholder="Prijs" step="0.01" required>
                </div>
            </div>

            <button type="button" onclick="addItem()">+ Item toevoegen</button>

            <br><br>
            <button type="submit" class="btn btn-primary">Factuur opslaan</button>
        </form>
    </div>

    <script>
        let itemIndex = 1;
        function addItem() {
            const container = document.getElementById('items');
            const html = `
        <div class="item mb-3">
            <input type="text" name="items[${itemIndex}][description]" placeholder="Beschrijving" required>
            <input type="number" name="items[${itemIndex}][quantity]" placeholder="Aantal" required>
            <input type="number" name="items[${itemIndex}][unit_price]" placeholder="Prijs" step="0.01" required>
        </div>
    `;
            container.insertAdjacentHTML('beforeend', html);
            itemIndex++;
        }
    </script>
@endsection

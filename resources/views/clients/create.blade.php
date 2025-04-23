@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuwe klant toevoegen</h1>

        @if ($errors->any())
            <div class="text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clients.store') }}" method="POST" class="mt-4">
            @csrf
            <div>
                <label>Naam</label>
                <input type="text" name="name" class="border p-2 w-full" required>
            </div>

            <div class="mt-2">
                <label>Email</label>
                <input type="email" name="email" class="border p-2 w-full" required>
            </div>

            <div class="mt-2">
                <label>Bedrijfsnaam</label>
                <input type="text" name="company_name" class="border p-2 w-full">
            </div>

            <div class="mt-2">
                <label>BTW-nummer</label>
                <input type="text" name="vat_number" class="border p-2 w-full">
            </div>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded mt-4">
                Klant opslaan
            </button>

        </form>

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mijn klanten</h1>
        <a href="{{ route('clients.create') }}" class="bg-green-500 text-white px-3 py-2 rounded">+ Nieuwe klant</a>

        <ul>
            @foreach($clients as $client)
                <li>{{ $client->name }} – {{ $client->email }}</li>
            @endforeach
        </ul>
    </div>
@endsection

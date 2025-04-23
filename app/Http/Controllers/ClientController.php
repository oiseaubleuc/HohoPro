<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::where('user_id', Auth::id())->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'company_name' => 'nullable|string|max:255',
            'vat_number' => 'nullable|string|max:50',
        ]);

        Client::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'vat_number' => $request->vat_number,
        ]);

        return redirect()->route('clients.index')->with('success', 'Klant succesvol toegevoegd!');
    }
}

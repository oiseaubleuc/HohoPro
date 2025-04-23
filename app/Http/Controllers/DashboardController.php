<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'clientsCount' => Client::count(),
            'invoicesCount' => Invoice::count(),
            'unpaidCount' => Invoice::where('is_paid', false)->count(),
            'paidCount' => Invoice::where('is_paid', true)->count(),
            'lastInvoices' => Invoice::latest()->take(5)->get(),
            'lastClients' => Client::latest()->take(5)->get(),
        ]);
    }
}

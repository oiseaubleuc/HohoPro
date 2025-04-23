<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Statistieken -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
                    <p class="text-gray-500 dark:text-gray-300">Aantal klanten</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $clientsCount }}</p>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
                    <p class="text-gray-500 dark:text-gray-300">Facturen totaal</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $invoicesCount }}</p>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
                    <p class="text-gray-500 dark:text-gray-300">Openstaande facturen</p>
                    <p class="text-2xl font-bold text-red-600">{{ $unpaidCount }}</p>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
                    <p class="text-gray-500 dark:text-gray-300">Betaalde facturen</p>
                    <p class="text-2xl font-bold text-green-600">{{ $paidCount }}</p>
                </div>
            </div>

            <!-- Acties -->
            <div class="flex gap-4">
                <a href="{{ route('invoices.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">
                    + Nieuwe factuur
                </a>
                <a href="{{ route('clients.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">
                    + Nieuwe klant
                </a>
            </div>

            <!-- Laatste 5 facturen -->
            <div class="bg-white dark:bg-gray-800 rounded shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Laatste 5 facturen</h3>
                <ul class="space-y-2">
                    @forelse ($lastInvoices as $invoice)
                        <li>
                            <a href="{{ route('invoices.show', $invoice) }}" class="text-indigo-600 hover:underline">
                                Factuur {{ $invoice->number }} – {{ $invoice->is_paid ? 'betaald' : 'open' }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-500 dark:text-gray-400">Geen facturen gevonden.</li>

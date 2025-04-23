@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Kies het plan dat bij je past</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Starter Plan -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-indigo-600">Starter</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Voor freelancers</p>
                <p class="mt-4 text-2xl font-bold">€9 / maand</p>
                <ul class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li>✔️ Tot 10 facturen per maand</li>
                    <li>✔️ Klantbeheer</li>
                    <li>✔️ Basis support</li>
                </ul>
                <a href="#" class="mt-6 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Start</a>
            </div>

            <!-- Pro Plan -->
            <div class="bg-white dark:bg-gray-800 border-2 border-indigo-600 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-indigo-600">Pro</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Voor kleine bedrijven</p>
                <p class="mt-4 text-2xl font-bold">€19 / maand</p>
                <ul class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li>✔️ Onbeperkt facturen</li>
                    <li>✔️ Klant- en betalingsopvolging</li>
                    <li>✔️ Live chat support</li>
                </ul>
                <a href="#" class="mt-6 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Probeer Pro</a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-indigo-600">Enterprise</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Voor grotere teams</p>
                <p class="mt-4 text-2xl font-bold">Op maat</p>
                <ul class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li>✔️ Alles van Pro</li>
                    <li>✔️ Meerdere gebruikers</li>
                    <li>✔️ Integraties en API's</li>
                </ul>
                <a href="#" class="mt-6 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Contacteer ons</a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto py-20 px-6 flex flex-col-reverse md:flex-row items-center justify-between gap-10">
            <!-- Text Content -->
            <div class="max-w-xl">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
                    Jouw facturatie, <span class="text-indigo-600">simpel & professioneel</span>.
                </h1>
                <p class="text-gray-600 dark:text-gray-300 text-lg mb-6">
                    Beheer klanten, maak facturen en volg betalingen moeiteloos op.
                </p>
                <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                    Start gratis
                </a>
            </div>



        <!-- Wat je krijgt sectie -->
        <div class="bg-gray-100 dark:bg-gray-800 py-16">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Wat je krijgt</h2>
                <div class="space-y-4 text-gray-700 dark:text-gray-300">
                    <p><strong>Klantbeheer:</strong> Alle klantgegevens op één centrale plek. Nooit meer zoeken.</p>
                    <p><strong>Snelle facturatie:</strong> Maak en verstuur professionele facturen in 1 minuut.</p>
                    <p><strong>Status opvolging:</strong> Zie wie betaald heeft en wie je nog moet herinneren.</p>
                </div>
                <blockquote class="italic text-gray-600 dark:text-gray-400 mt-6">
                    “Sinds ik HohoPro gebruik, heb ik meer overzicht en minder stress.”<br>
                    <span class="text-sm font-medium">— Tevreden klant</span>
                </blockquote>
            </div>
        </div>
    </div>
@endsection

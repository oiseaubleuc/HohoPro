@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Contacteer ons</h1>
        <p class="text-gray-600 dark:text-gray-300 mb-8">
            Heb je vragen? Laat hier een bericht achter en we nemen zo snel mogelijk contact met je op.
        </p>

        <form method="POST" action="#" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Naam</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">E-mail</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Bericht</label>
                <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white"></textarea>
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Verstuur</button>
        </form>
    </div>
@endsection

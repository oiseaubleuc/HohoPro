<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Models\Client;
use App\Models\Invoice;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/dashboard', function () {
    return view('dashboard', [
        'clientsCount' => Client::count(),
        'invoicesCount' => Invoice::count(),
        'unpaidCount' => Invoice::where('is_paid', false)->count(),
        'paidCount' => Invoice::where('is_paid', true)->count(),
        'lastInvoices' => Invoice::latest()->take(5)->get(),
        'lastClients' => Client::latest()->take(5)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('clients', ClientController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('invoices', InvoiceController::class);
});
Route::resource('invoices', InvoiceController::class);
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');


Route::get('/invoices/{invoice}/download', [\App\Http\Controllers\InvoiceController::class, 'download'])->name('invoices.download');
Route::patch('/invoices/{invoice}/paid', [\App\Http\Controllers\InvoiceController::class, 'markAsPaid'])->name('invoices.markAsPaid');

Route::view('/pricing', 'pricing')->name('pricing');



Route::get('/over-ons', function () {
    return view('about');
})->name('about');

Route::get('/prijzen', function () {
    return view('pricing');
})->name('pricing');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/invoices/{invoice}/mollie-pay', [MolliePaymentController::class, 'preparePayment'])->name('mollie.pay');
Route::get('/payment/success/{invoice}', [MolliePaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::post('/payment/webhook', [MolliePaymentController::class, 'webhook'])->name('payment.webhook');


require __DIR__.'/auth.php';

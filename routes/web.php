<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MovementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', ProductController::class);
    Route::resource('movements', MovementController::class);

    Route::get('/low-stock', [ProductController::class, 'lowStock'])
->name('products.lowstock');

    Route::get('/dashboard', function () {

    $totalProducts = \App\Models\Product::count();
    $lowStock = \App\Models\Product::where('stock','<',5)->count();
    $pendingMovements = \App\Models\Movement::where('status','pending')->count();

    $pendingReceipts = \App\Models\Movement::where('type','receipt')
                    ->where('status','pending')
                    ->count();

    $pendingDeliveries = \App\Models\Movement::where('type','delivery')
                    ->where('status','pending')
                    ->count();

    $recentMovements = \App\Models\Movement::with('product')
                        ->latest()
                        ->take(5)
                        ->get();

    return view('dashboard', compact(
        'totalProducts',
        'lowStock',
        'recentMovements',
        'pendingMovements',
        'pendingReceipts',
        'pendingDeliveries'
    ));

    Route::get('/low-stock', [ProductController::class, 'lowStock'])
    ->name('products.lowstock');

})->middleware(['auth'])->name('dashboard');

Route::post('/movements/{id}/approve', [MovementController::class, 'approve'])
      ->name('movements.approve');

});
// Route::resource('products', ProductController::class)->middleware('auth');


require __DIR__.'/auth.php';

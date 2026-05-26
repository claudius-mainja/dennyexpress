<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{categorySlug}', [ProductController::class, 'category'])->name('products.category');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/{product}', [WishlistController::class, 'store'])->name('wishlist.add');
Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])->name('wishlist.remove');
Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

// Compare
Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');
Route::post('/compare/{product}', [CompareController::class, 'store'])->name('compare.add');
Route::delete('/compare/{product}', [CompareController::class, 'destroy'])->name('compare.remove');
Route::post('/compare/clear', [CompareController::class, 'clear'])->name('compare.clear');

// Quote
Route::get('/quote/request', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/quote/request', [QuoteController::class, 'store'])->name('quote.store');
Route::get('/quote/{uuid}', [QuoteController::class, 'show'])->name('quote.show');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

// Payments
Route::get('/payment/{order}', [PaymentController::class, 'process'])->name('payment.process');
Route::post('/payment/notify/{gateway}', [PaymentController::class, 'notify'])->name('payment.notify');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::get('/payment/error/{order}', [PaymentController::class, 'error'])->name('payment.error');

// Static Pages
Route::get('/about', function () { return view('pages.about'); })->name('pages.about');
Route::get('/contact', function () { return view('pages.contact'); })->name('pages.contact');
Route::get('/faq', function () { return view('pages.faq'); })->name('pages.faq');
Route::get('/warranty', function () { return view('pages.warranty'); })->name('pages.warranty');
Route::get('/support', function () { return view('pages.support'); })->name('pages.support');
Route::get('/terms', function () { return view('pages.terms'); })->name('pages.terms');
Route::get('/privacy', function () { return view('pages.privacy'); })->name('pages.privacy');
Route::get('/shipping', function () { return view('pages.shipping'); })->name('pages.shipping');
Route::get('/returns', function () { return view('pages.returns'); })->name('pages.returns');

// Breeze Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

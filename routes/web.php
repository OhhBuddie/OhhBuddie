<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\NewLoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GoogleController;

use App\Http\Controllers\Sellers\SellerController;
use App\Http\Controllers\ContactController; 

use App\Http\Controllers\Category1Controller;
use App\Http\Controllers\WhatsAppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/colors', [HomeController::class, 'showColors']);
Route::get('/get-sizes/{categoryId}', [HomeController::class, 'getSizes']);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/launch', [NewLoginController::class, 'showLoginPage'])->name('login.page');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact']);

Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy']);

Route::get('/terms-and-condition', [App\Http\Controllers\HomeController::class, 'terms']);

Route::get('/order-confirm', [App\Http\Controllers\HomeController::class, 'orderconfirm']);

Route::get('/return-refund', [App\Http\Controllers\HomeController::class, 'refund']);

Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about']);

Route::get('/Shipping-and-Delivery-Policy', [App\Http\Controllers\HomeController::class, 'shipping']);



Route::post('/Newlogin', [NewLoginController::class, 'login'])->name('login.submit');


Route::get('/product1/{id}', [App\Http\Controllers\ProductController::class, 'index1']);

Route::get('/product/{id}/{id1}/{id2}/{id3}/{id4}', [App\Http\Controllers\ProductController::class, 'index']);

Route::get('/listing', [App\Http\Controllers\ProductController::class,'listing']);
Route::get('/listing1', [App\Http\Controllers\ProductController::class,'listing1']);
Route::get('/product-listing', [App\Http\Controllers\ProductController::class,'form']);
Route::get('/get-subcategories/{id}', [ProductController::class, 'getSubcategories']);
Route::get('/get-sub-subcategories/{id}', [ProductController::class, 'getSubSubcategories']);

Route::get('/allproduct', [App\Http\Controllers\ProductController::class,'allproducts']);
Route::get('/plushsize', [App\Http\Controllers\ProductController::class,'plussizeproducts']);

Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'index']);


// Route::get('/category1/{id}', [Category1Controller::class, 'showCategory']);
Route::get('/category1/{id}', [Category1Controller::class, 'index'])->name('category.index');

Route::get('/addtocart', [App\Http\Controllers\CartController::class, 'index']);

Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index'])->middleware('auth');

Route::get('/order', [App\Http\Controllers\OrderController::class, 'index']);
Route::get('/orderdetails/{id}', [App\Http\Controllers\OrderController::class, 'orderdetails']);
Route::get('/download-invoice/{order_id}', [App\Http\Controllers\OrderController::class, 'downloadInvoice'])->name('download.invoice');


// Route::get('/orderdetails/{id}', [App\Http\Controllers\OrderdetailsController::class, 'index']);
Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index']);
Route::get('/tryout', [App\Http\Controllers\TryoutController::class, 'index']);
Route::get('/coupon', [App\Http\Controllers\CouponController::class, 'index']);
Route::get('/explore', [App\Http\Controllers\ExploreController::class, 'index']);

Route::controller(App\Http\Controllers\Auth\AuthOtpController::class)->group(function(){

    Route::get('otp/login', 'login')->name('otp.login');

    Route::post('otp/generate', 'generate')->name('otp.generate');

    Route::get('otp/verification/{user_id}', 'verification')->name('otp.verification');

    Route::post('otp/login', 'loginWithOtp')->name('otp.getlogin');

});


Route::controller(App\Http\Controllers\UserController::class)->group(function(){

    Route::get('profileedit/{id}', 'edit')->name('user.edit');
    Route::post('name/update', 'nameupdate')->name('name.update');
    Route::post('profileupdate/{id}', 'update')->name('user.update');

});

Route::controller(AddressController::class)->middleware('auth')->group(function () {
    Route::post('/address/store', 'store')->name('address.store');
    Route::get('/address', 'index')->name('address.index');

    Route::get('/Mytryout', 'tryout');
    Route::get('/Mypayment', 'payment');
    Route::get('/Mywallet', 'wallet');
    Route::get('/Myaddress', 'address');
    Route::get('/Mysupport', 'address');
});


Auth::routes();

Route::controller(LoginController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/accounts', [HomeController::class, 'account']);



Route::get('/account', [HomeController::class, 'account'])->middleware('auth');



 
Auth::routes();

// Route::get('/seller', [App\Http\Controllers\SellerController::class, 'index']);

Route::get('/seller', [SellerController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');

Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');

Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');


// Route::get('/sellerform', [SellerController::class, 'registration']);



// Seller Portal

Route::get('/seller/login', [SellerController::class, 'login'])->name('seller.login');
Route::post('/seller/submit-phone', [SellerController::class, 'submitPhone'])->name('seller.submit.phone');

Route::get('/seller/enter-otp', [SellerController::class, 'enterOtp'])->name('seller.enter-otp');
Route::post('/seller/submit-otp', [SellerController::class, 'submitOtp'])->name('seller.submit.otp');

Route::get('/seller/enter-email', [SellerController::class, 'enterEmail'])->name('seller.enter-email');
Route::post('/seller/submit-email', [SellerController::class, 'submitEmail'])->name('seller.submit.email');

Route::get('/seller/enter-email-otp', [SellerController::class, 'enterEmailOtp'])->name('seller.enter-email-otp');
Route::post('/seller/submit-email-otp', [SellerController::class, 'submitEmailOtp'])->name('seller.submit.email.otp');

Route::get('/seller/registration', [SellerController::class, 'registration'])->name('seller.registration');

Route::post('/submitform/{id}', [SellerController::class, 'submitform'])->name('seller.submitform');

Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');


Route::controller(App\Http\Controllers\Sellers\AuthOtpController::class)->group(function(){

    Route::get('sellerotp/login', 'login')->name('sellerotp.login');

    Route::post('sellerotp/generate', 'generate')->name('sellerotp.generate');

    Route::get('sellerotp/verification/{user_id}', 'verification')->name('sellerotp.verification');

    Route::post('sellerotp/login', 'loginWithOtp')->name('sellerotp.getlogin');
    


});

Route::resource('products', ProductController::class);

Route::resource('carts', CartController::class);

Route::resource('addresses', AddressController::class);

Route::resource('wishlists', WishlistController::class);

Route::post('/wishlist/destroy', [WishlistController::class, 'destroy'])->name('wishlist.destroy');



Route::get('/check-pincode', [ProductController::class, 'checkPincode'])->name('check.pincode');

Route::controller(App\Http\Controllers\ProductController::class)->group(function(){

    Route::get('product/sellerproduct', 'sellerproduct')->name('product.sellerproduct');

});

Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/count', function (Request $request) {
    $count = 0;

    if (Auth::check()) {
        $count = DB::table('carts')->where('user_id', Auth::id())->count();
    } else {
        $tempUserId = $request->temp_user_id ?? session('temp_user_id') ?? $request->cookie('temp_user_id');
        
        if ($tempUserId) {
            $count = DB::table('carts')->where('temp_user_id', $tempUserId)->count();
        }
    }

    return response()->json(['count' => $count]);
})->name('cart.index');

Route::post('/update-cart-size', [CartController::class, 'updateSize'])->name('update.cart.size');
Route::post('/update-cart-quantity', [CartController::class, 'updateQuantity'])->name('update.cart.quantity');
Route::post('/wishlist/store', [WishlistController::class, 'store'])->name('wishlist.store');

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.store')->middleware('auth');

Route::get('/payment/{order_id}', [PaymentController::class, 'showPaymentPage'])->middleware('auth');



// Google Login 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/dashboard11', [NewLoginController::class, 'showDashboard'])->name('dashboard');



Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



Route::get('cashfree/payments/create', [App\Http\Controllers\CashfreePaymentController::class, 'create'])->name('callback');
Route::post('cashfree/payments/store',  [App\Http\Controllers\CashfreePaymentController::class, 'store'])->name('store');
Route::any('cashfree/payments/success',  [App\Http\Controllers\CashfreePaymentController::class, 'success'])->name('success');

Route::get('/category/{categoryId}', [CategoryController::class, 'showCategory'])->name('category.show');

Route::post('/update-order-status/{id}', [OrderController::class, 'updateOrderStatus'])->name('update.order.status');

Route::resource('contacts', ContactController::class);



Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

// Pay U Payments


// Exclude these routes from CSRF protection
Route::post('/payment/success', [CheckoutController::class, 'paymentSuccess'])
    ->name('payment.success')
    ->withoutMiddleware(['web']);

Route::post('/payment/failure', [CheckoutController::class, 'paymentFailure'])
    ->name('payment.failure')
    ->withoutMiddleware(['web']);

Route::get('/get-cities', [AddressController::class, 'getCities'])->name('getCities');

Route::view('/whatsapp', 'whatsapp-form');

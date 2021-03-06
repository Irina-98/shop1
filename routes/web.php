<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Route::get('/', function () {
    return redirect()->route('home');
})->name('main');


/*Route::get('/test', function () {
        return 'Вы на тестовой странице';// название страницы, возврат на страницу
});

/*Route::get('/pageuser', function () {
    return 'СПИСОК ПОЛЬЗОВАТЕЛЕЙ';// название страницы,пробная - можно удалить
});*/

Route::prefix('home')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');// обработка страницы хоум это индекс в хоумконтрол
    Route::get('/profile', [HomeController::class, 'profile'])->middleware('auth')->name('profile');
    Route::post('/profile/update', [HomeController::class, 'profileUpdate'])->name('profileUpdate');
    Route::post('/repeatOrder', [OrderController::class, 'repeatOrder'])->name('repeatOrder');

});

Route::prefix('basket')->group(function () {
    Route::get('/', [BasketController::class, 'index'])->name('basket');
    Route::post('/createOrder', [BasketController::class, 'createOrder'])->name('createOrder');
    

    Route::prefix('product')->group(function () {
        Route::post('/add', [BasketController::class, 'add'])->name('addProduct');
        Route::post('/remove', [BasketController::class, 'remove'])->name('removeProduct');
        
    });
});

Route::get('/orders', [OrderController::class, 'index'])->name('orders');
/*Route::any('/{any}', function () {
   return redirect(route('main'));
})->where('any', '.*');
*/
//обработка страниц, возвращает на главную страницу. можно войти только в хоум и главная



Auth::routes();// здесь в 3 позициях указывается на какие страницы можем заходить

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/home/test', [HomeController::class, 'test']);

Route::get('/categories/{category}', [CategoryController::class, 'category'])->name('category');



Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');//админка
    Route::get('/enterAsUser/{userId}', [AdminController::class, 'enterAsUser'])->name('enterAsUser');
    Route::get('/categoryCreated', [AdminController::class, 'categoryCreated'])->name('categoryCreated');
    Route::post('/addCategories', [AdminController::class, 'addCategories'])->name('addCategories');
    Route::post('/exportCategories', [AdminController::class, 'exportCategories'])->name('exportCategories');
    Route::post('/importCategories', [CategoryController::class, 'importCategories'])->name('importCategories');
    Route::get('/pageuser', [AdminController::class, 'pageuser']);// марш. перехода со стр. на стр. список пользователей
    Route::get('/spisokсategory', [AdminController::class, 'spisokсategory']);
    Route::get('/mapproduct', [AdminController::class, 'mapproduct']);
    Route::get('/productCreated', [AdminController::class, 'productCreated'])->name('productCreated');
    Route::post('/addProducts', [AdminController::class, 'addProducts'])->name('addProducts');
    Route::post('/exportProducts', [ProductController::class, 'exportProducts'])->name('exportProducts');
    Route::post('/importProducts', [ProductController::class, 'importProducts'])->name('importProducts');
     //Route::redirect('/', '/admin/products');

    /*Route::get('/', function () {
        return redirect(route('adminProducts'));

    });
    */
      



    Route::get('/products', function () {
        return 'Админка: продукты';
    })->name('adminProducts');




    });



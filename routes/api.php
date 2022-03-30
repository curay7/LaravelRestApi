<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get("/products",[ProductController::class,'index']);
// Route::post("/products",[ProductController::class,'store']);


// Route::post("/products",function(){
//     return Product::create(
//         [
//             'name'=>'product 1',
//             'slug'=>'product-one',
//             'description'=>'This is product one',
//             'price'=>'99.99'
//         ]
//         );
// });

//Public Route for post
Route::resource('products',ProductController::class);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::post('/products', [ProductController::class, 'store']);



//Public Route for registration User
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    //Route::post('/logout', [AuthController::class, 'logout']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

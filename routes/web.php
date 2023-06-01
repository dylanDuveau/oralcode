<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\bddController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\produits;
use App\Models\boites;
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

Route::get('/', function () { return view('welcome');});
Route::get('formulaire', [PostController::class,'formulaire']);
/*
| Web Routes générations de code barre et qrcode
*/
Route::get('/qrcode', [bddController::class,'qrcode']);
Route::get('/codebarre', [bddController::class,'barrecode']);
Route::post('post', function (Illuminate\Http\Request $request) {
    // on récup les input numero/description
    $numero = $request->input('numero');
    $description = $request->input('description');


    return view('vue', [
        'numero' => $numero,
        'description' => $description,
    ]);
});
/*
|générations des pdf
*/
Route::get('/qrcode-pdf', [bddController::class,'qrcodePDF'])->name('qrcode-pdf');
Route::get('/codebarre-pdf', [bddController::class,'codebarrepdf'])->name('codebarre-pdf');


/*
|  Routes des login ,logout etc
*/

Auth::routes();
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'dologin']);
/*
Route::get('login', [PostController::class,'logout'])->name('logout');
Route::get('login', [PostController::class,'login'])->name('login');
*/





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

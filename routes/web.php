<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ClientController::class, 'home']);
Route::get('/shop', [ClientController::class, 'shop']);
Route::get('/panier', [ClientController::class, 'cart']);
Route::get('/client_login', [ClientController::class, 'client_login']);
Route::get('/signup', [ClientController::class, 'signup']);
Route::get('/paiement', [ClientController::class, 'checkout']);
Route::get('/select_par_cat/{name}', [ClientController::class, 'select_par_cat']);
Route::get('/ajouter_au_panier/{id}', [ClientController::class, 'ajouter_au_panier']);
Route::post('/modifier_qte/{id}', [ClientController::class, 'modifier_panier']);
Route::get('/retirer_produit/{id}', [ClientController::class, 'retirer_produit']);
Route::post('/payer', [ClientController::class, 'payer']);
Route::post('/creer_compte', [ClientController::class, 'creer_compte']);
Route::post('/acceder_compte', [ClientController::class, 'acceder_compte']);
Route::get('/logout', [ClientController::class, 'logout']);


// Route Pdf Controller
Route::get('/voir_pdf/{id}', [PdfController::class, 'voir_pdf']);



// Route Dashboard Admin
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/commandes', [AdminController::class, 'commandes']);

// Route pour les cathégories
Route::get('/ajoutercategorie', [CategoryController::class, 'ajoutercategorie']);
Route::post('/sauvercategorie', [CategoryController::class, 'sauvercategorie']);
Route::get('/categories', [CategoryController::class, 'categories']);
Route::get('/editcategorie/{id}', [CategoryController::class, 'editcategorie']);
Route::post('/modifiercategorie', [CategoryController::class, 'modifiercategorie']);
Route::get('/supprimercategorie/{id}', [CategoryController::class, 'supprimercategorie']);



// Route pour Les produits
Route::get('/ajouterproduit', [ProductController::class, 'ajouterproduit']);
Route::post('/sauverproduit', [ProductController::class, 'sauverproduit']);
Route::get('/produits', [ProductController::class, 'produits']);
Route::get('/edit_produit/{id}', [ProductController::class, 'edit_produit']);
Route::post('/modifierproduit', [ProductController::class, 'modifierproduit']);
Route::get('/supprimerproduit/{id}', [ProductController::class, 'supprimerproduit']);
Route::get('/activer_produit/{id}', [ProductController::class, 'activerproduit']);
Route::get('/desactiver_produit/{id}', [ProductController::class, 'desactiverproduit']);


// Route pour les sliders
Route::get('/ajouterslider', [SliderController::class, 'ajouterslider']);
Route::post('/sauverslider', [SliderController::class, 'sauverslider']);
Route::get('/sliders', [SliderController::class, 'sliders']);
Route::get('/edit_slider/{id}', [SliderController::class, 'edit_slider']);
Route::post('/modifierslider', [SliderController::class, 'modifierslider']);
Route::get('/supprimerslider/{id}', [SliderController::class, 'supprimerslider']);
Route::get('/activer_slider/{id}', [SliderController::class, 'activerslider']);
Route::get('/desactiver_slider/{id}', [SliderController::class, 'desactiverslider']);

Auth::routes();

Route::get('/admin', [HomeController::class, 'index']);
  

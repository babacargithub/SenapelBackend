<?php

use App\Http\Controllers\AchatParutionController;
use App\Http\Controllers\Admin\AppelCrudController;
use App\Http\Controllers\Admin\AvisCrudController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\RapportsController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/appels/create', function () {
    return view('appels.new');
});
Route::get('/parutions/{parution}/appels/create', [AppelCrudController::class,'ajouterAppelsSurParution'])
->name('ajouter-appels-sur-parution');
Route::get('/parutions/{parution}/avis/create', [AvisCrudController::class,'ajouterAvisSurParution'])
->name('ajouter-avis-sur-parution');
Route::get('/admin/rapports', [RapportsController::class,'rapports'])
->name('rapports');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/achat_parution', [AchatParutionController::class,'store']);
Route::get('/invoice_url/{parution}', [PaiementController::class,'getCheckoutUrl']);
require __DIR__.'/auth.php';

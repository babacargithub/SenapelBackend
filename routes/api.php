<?php

use App\Http\Controllers\AppelController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\CategorieAppelController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteClientController;
use App\Http\Controllers\ParutionController;
use App\Models\Parution;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/parutions/{date}', [ParutionController::class,'parutionParDate']);
Route::get('/parutions/{parution}/appels', [ParutionController::class,'appelsParution']);
Route::get('/parutions/{parution}/avis', [ParutionController::class,'avisParution']);
Route::get('/parutions/mois/{mois}/annee/{annee}', [ParutionController::class,'parutionParMois']);
Route::get('/appels/appels_expires', [AppelController::class,'appelsExpires']);
Route::get('/avis/avis_expires', [AvisController::class,'avisExpires']);
//Route::get('/avis/{avis}', [AvisController::class,'show']);
Route::resource('parutions', ParutionController::class);
Route::resource('appels', AppelController::class);
Route::resource('categories', CategorieAppelController::class);
Route::resource('clients', ClientController::class);
Route::resource('comptes_client', CompteClientController::class);
Route::post('comptes_client/{compte_client}/recharger', [CompteClientController::class,'augmenterSolde']);
Route::resource('/avis', AvisController::class)->parameters(['avi' => 'avis']
) ->missing(function (Request $request) {
    redirect('index');
});;

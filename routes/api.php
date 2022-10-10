<?php

use App\Http\Controllers\AppelController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\CategorieAppelController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteClientController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ParamsController;
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
Route::get('/la_une/{date}', [ParutionController::class,'laUneDesJournaux']);
Route::get('/parutions/{date}', [ParutionController::class,'parutionParDate']);
Route::get('/paiements/{parution}/link', [PaiementController::class,'envoyerLienDePaiement']);
Route::get('/parutions/{date}/dans/{paru_dans}', [ParutionController::class,'parutionDans']);
Route::get('/parutions/{date}/appels', [ParutionController::class,'parutionParDateAppels']);
Route::get('/parutions/{date}/avis', [ParutionController::class,'parutionParDateAvis']);
Route::get('/parutions/{parution}/appels', [ParutionController::class,'appelsParution']);
Route::get('/parutions/archives/{parution}', [ParutionController::class,'show']);
Route::get('/parutions/mois/{mois}/annee/{annee}', [ParutionController::class,'parutionParMois']);
Route::get('/parutions/archives/mois/{mois}/annee/{annee}', [ParutionController::class,'archiveMois']);
Route::get('/appels/appels_expires', [AppelController::class,'appelsExpires']);
Route::get('/avis/avis_expires', [AvisController::class,'avisExpires']);

Route::resource('parutions', ParutionController::class);
Route::resource('appels', AppelController::class);
Route::get('params', [ParamsController::class,'index']);
Route::resource('categories', CategorieAppelController::class);
Route::get('clients/phone_number/{phoneNumber}', [ClientController::class,'getByPhoneNumber']);
Route::resource('clients', ClientController::class);
Route::resource('comptes_client', CompteClientController::class);
Route::post('comptes_client/{compte_client}/recharger', [CompteClientController::class,'augmenterSolde']);
Route::resource('/avis', AvisController::class)->parameters(['avi' => 'avis']
) ->missing(function (Request $request) {
    redirect('index');
});;

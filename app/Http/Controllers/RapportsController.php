<?php

namespace App\Http\Controllers;

use App\Models\AchatParution;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RapportsController extends Controller
{
    //
    public function rapports()
    {
        $vente_mois = AchatParution::whereMonth('created_at',Date('m'))->sum('prix');
        $vente_semaine = AchatParution::whereBetween('created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->sum('prix');
        $vente_journee = AchatParution::whereDate('created_at',Date('Y-m-d'))->sum('prix');;
        $vente_annnee = AchatParution::whereYear('created_at',Date('Y'))->sum('prix');
        return view('admin.rapports.rapports',[
            "ventes_mois"=>$vente_mois,
            "vente_journee"=>$vente_journee,
            "vente_semaine"=>$vente_semaine,
            "vente_annee"=>$vente_annnee,
            ]);

    }
}

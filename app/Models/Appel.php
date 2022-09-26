<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appel extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'sous_titre',
        'contenu',
        'date_appel',
        'date_limite',
        'publie_dans',
        'autorite',
        'parution_id',
        'categorie_appel_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_appel' => 'datetime',
        'date_limite' => 'datetime',
        'parution_id' => 'integer',
        'categorie_appel_id' => 'integer',
    ];

    public function parution()
    {
        return $this->belongsTo(Parution::class);
    }



    public function categorieAppel()
    {
        return $this->belongsTo(CategorieAppel::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parution extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'journee',
        'prix',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'journee' => 'date',
    ];

    public function appels()
    {
        return $this->hasMany(Appel::class);
    }
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

    public function achatParutions()
    {
        return $this->hasMany(AchatParution::class);
    }

    public function totalAchate()
    {
        return $this->achatParutions->sum('prix');
    }
}

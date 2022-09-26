<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatParution extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prix',
        'paye_par',
        'parution_id',
        'client_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parution_id' => 'integer',
        'client_id' => 'integer',
    ];

    public function parution()
    {
        return $this->belongsTo(Parution::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


}

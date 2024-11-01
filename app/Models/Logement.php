<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    use HasFactory;

    protected $table = 'FTC_logements';
    protected $primaryKey = 'id_Logement';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_Logement', 'nb_Lit'];

    public $timestamps = false;

    public function prises()
    {
        return $this->hasMany(Prise::class, 'id_Logement');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_Logement');
    }
}
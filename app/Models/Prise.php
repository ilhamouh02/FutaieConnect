<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prise extends Model
{
    use HasFactory;

    protected $table = 'FTC_prises';
    protected $primaryKey = 'id_Prise';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_Prise', 'id_Logement'];

    public $timestamps = false;

    public function logement()
    {
        return $this->belongsTo(Logement::class, 'id_Logement');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_Prise');
    }
}
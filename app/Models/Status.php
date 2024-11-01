<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'FTC_status';
    protected $primaryKey = 'id_demande';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_demande', 'demance_Valider', 'demand_en_cours', 'demande_Terminer'];

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_demande');
    }
}
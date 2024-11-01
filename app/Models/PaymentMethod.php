<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'FTC_payment_methods';
    protected $primaryKey = 'id_Paiement';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_Paiement', 'payment_type'];

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_Paiement');
    }
}
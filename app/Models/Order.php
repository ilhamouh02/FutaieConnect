<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'FTC_orders';
    protected $primaryKey = 'id_Commande';

    protected $fillable = [
        'date_Commande', 'date_Paiement', 'date_Livraison', 'id_Connexion',
        'password_Connexion', 'id_demande', 'id_Paiement', 'id_utilisateur', 'id_Prise'
    ];

    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_demande');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'id_Paiement');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function prise()
    {
        return $this->belongsTo(Prise::class, 'id_Prise');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'FTC_contenir', 'id_Commande', 'id_Produit')
                    ->withPivot('prix_Produit', 'nom_Produit');
    }
}
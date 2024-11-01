<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'FTC_products';
    protected $primaryKey = 'id_Produit';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_Produit',
        'prix_Produit',
        'visible',
        'prise'
    ];

    public $timestamps = false;

    // Relation avec la table Contenir
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'FTC_contenir', 'id_Produit', 'id_Commande')
                    ->withPivot('prix_Produit', 'nom_Produit');
    }
}






// Explications :
// protected $table = 'FTC_products'; spécifie le nom de la table dans la base de données.
// protected $primaryKey = 'id_Produit'; définit la clé primaire.
// public $incrementing = false; indique que la clé primaire n'est pas auto-incrémentée.
// protected $keyType = 'string'; spécifie que la clé primaire est une chaîne de caractères.
// protected $fillable liste les champs qui peuvent être remplis en masse.
// public $timestamps = false; désactive les timestamps automatiques car ils ne sont pas présents dans votre schéma.
// La méthode orders() définit la relation many-to-many avec la table des commandes via la table pivot FTC_contenir.
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'FTC_roles';
    protected $primaryKey = 'id_role';

    protected $fillable = ['id_role', 'label'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
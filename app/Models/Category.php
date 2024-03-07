<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Assuming you have a relationship with 'evenements'
    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
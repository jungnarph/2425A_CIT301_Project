<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class CarType extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'type_id',
        'type_name',
        'insurance_fee',
    ];

    public function carModels() {
        return $this->hasMany(CarModel::class, 'type_id');
    }
}

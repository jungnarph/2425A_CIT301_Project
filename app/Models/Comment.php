<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'rental_id',
        'user_id',
        'car_model_id',
        'content',
        'rate',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }
}
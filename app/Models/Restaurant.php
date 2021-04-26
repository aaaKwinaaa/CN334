<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public $table = 'restaurants';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'id',
        'restaurant_name',
        'detail',
        'phone',
        'photo',
        'user_id',
        'status_approve',
        'status_active',
        'created_at',
        'updated_at',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
}

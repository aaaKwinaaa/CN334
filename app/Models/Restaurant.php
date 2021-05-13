<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}

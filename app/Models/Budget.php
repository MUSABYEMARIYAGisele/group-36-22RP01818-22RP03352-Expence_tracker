<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;

    protected $primaryKey = 'budget_id';

    protected $fillable = [
        'user_id',
        'category_id',
        'amount'
    ];

    protected $casts = [
        'amount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

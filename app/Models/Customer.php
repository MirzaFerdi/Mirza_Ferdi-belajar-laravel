<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'phone_number', 'email', 'address', 'is_active'];
    protected $casts = ['is_active' => 'boolean',];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}

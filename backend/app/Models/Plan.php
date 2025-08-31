<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'currency',
        'billing_interval',
        'users_limit',
        'whatsapp_connections',
        'messages_limit',
        'trial_days',
        'features',
        'provider_price_id',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}

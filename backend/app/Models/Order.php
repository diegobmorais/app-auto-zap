<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'plan_id',
        'user_id',
        'amount',
        'currency',
        'payment_method',
        'transaction_id',
        'invoice_url',
        'status',
        'paid_at',
        'expires_at',
        'due_date',
        'meta',
    ];
    protected $casts = [
        'meta' => 'array',
        'paid_at' => 'datetime',
        'expires_at' => 'datetime',
        'due_date' => 'datetime',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

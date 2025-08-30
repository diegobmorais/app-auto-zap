<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'companies';
    protected $primaryKey = 'id';
     protected $fillable = [
        'name',
        'domain',
        'plan_type',
        'max_users',
        'settings',
    ];
    protected $casts = [
        'settings' => 'array',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }

}

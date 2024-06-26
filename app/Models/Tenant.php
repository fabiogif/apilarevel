<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cnpj', 'email', 'url', 'logo' , 'active', 'subscription', 'expire_at',
                            'subscription_id', 'subscription_plan', 'subscription_active', 'subscription_suspended'];


    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

//    public function categories()
//    {
//        return $this->hasMany(Category::class);
//    }

}

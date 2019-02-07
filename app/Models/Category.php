<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantModels;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billPays()
    {
        return $this->hasMany(BillPay::class);
    }
}

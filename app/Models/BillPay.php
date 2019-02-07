<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
    use TenantModels;

    protected $fillable = [
        'name',
        'date_due',
        'value',
        'done',
        'category_id'
    ];

    protected $dates = ['date_due'];


    public function scopePaid($query){
        return $query->where('done', true);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillPayRequest;
use App\Http\Resources\BillPayCollection;
use App\Http\Resources\BillPayResource;
use App\Http\Resources\CategoryBillPayCollection;
use App\Models\BillPay;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryBillPayController extends Controller
{
    public function index(Category $category)
    {
        $billPays = $category->billPays()->paginate();
        //return BillPayResource::collection($billPays);
        return new CategoryBillPayCollection($billPays, $category);
    }
}

/*
 * about
 * category
 * data
 * meta
 * link
 */

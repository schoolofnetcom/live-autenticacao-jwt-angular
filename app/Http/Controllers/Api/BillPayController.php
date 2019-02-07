<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillPayRequest;
use App\Http\Resources\BillPayCollection;
use App\Http\Resources\BillPayResource;
use App\Models\BillPay;
use Illuminate\Http\Request;

class BillPayController extends Controller
{
    public function index()
    {
        //lazy loading - this->category
        //eager loading - select * from categories where id in (2,3,4,5,10)
        $billPays = BillPay::with('category')->paginate();
        //return BillPayResource::collection($billPays);
        return new BillPayCollection($billPays);
    }

    public function store(BillPayRequest $request)
    {
        $category = BillPay::create($request->all());
        return new BillPayResource($category);
    }

    public function show(BillPay $bill_pay)
    {
        return new BillPayResource($bill_pay);
    }

    public function update(BillPayRequest $request, BillPay $bill_pay)
    {
        $bill_pay->fill($request->all());
        $bill_pay->save();

        return new BillPayResource($bill_pay);
    }

    public function destroy(BillPay $bill_pay)
    {
        $bill_pay->delete();

        return response()->json([],204);
    }
}

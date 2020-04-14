<?php

namespace App\Http\Controllers;
use App\Model\Product;
use App\Model\Invoice;

use Illuminate\Http\Request;

class ProfitController extends Controller
{
    //
    public function itemProfits (Request $request)
    {
        $item = Invoice::get()->where('productname','like',$request->name);

        $profit = 0;
        foreach ($item as $value)
        {
            $products = Product::get()->where('name','like',$value->productname);
            foreach ($products as $product)
            {
                $profit = $profit + (($value->price) - ($product->pur_price)) * $value->amount;
            }
        }
        return $profit;
    }
    public function listProfits ($id)
    {
        $Invoices = Invoice::get()->where('no','like',$id);
        $profit = 0;
        foreach ($Invoices as $invoice)
        {
            $products = Product::get()->where('name','like',$invoice->productname);
            foreach ($products as $product)
            {
                $profit = $profit + (($invoice->price) - ($product->pur_price)) * $invoice->amount;
            }
        }
        return $profit;
    }
    public function allProfits ()
    {
        $Invoices = Invoice::get();
        $profit = 0;
        foreach ($Invoices as $invoice)
        {
            $products = Product::get()->where('name','like',$invoice->productname);
            foreach ($products as $product)
            {
                $profit = $profit + (($invoice->price) - ($product->pur_price)) * $invoice->amount;
            }
        }
        return $profit;
    }

}

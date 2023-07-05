<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');

    }

    public function show_orders()
    {
        $invoices = Invoice::where('user_id', Auth::user()->id)->get();

        return view('front.order', compact('invoices'));

    }
    public function  show_invoice($id)
    {
        $invoices = Invoice::where('id', $id)->first();
        return view('front.show_invoice',compact('invoices'));

    }


}

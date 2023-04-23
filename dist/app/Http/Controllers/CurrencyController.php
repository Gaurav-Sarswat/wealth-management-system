<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Show all currencies.
     *
     */
    public function show_currencies()
    {
        $currencies = Currency::all();
        $pagename = 'Currencies';
        $data = [
            'currencies' => $currencies,
            'pagename' => $pagename
        ];
        return view('admin.currency-list', $data);
    }
    /**
     * Add a currency.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function add_currencies(Request $request)
    {
        $pagename = 'Add-Currencies';
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $currency = Currency::create([
            'name' => $request->name,
        ]);


        return redirect()->route('admin.show_currencies')->with('success', 'Currency created successfully!');
    }
    /**
     * Show add currency view.
     *
     */
    public function add_currencies_view()
    {
        $pagename = 'Add-Currencies';
        return view('admin.add-currency', compact('pagename'));
    }
}

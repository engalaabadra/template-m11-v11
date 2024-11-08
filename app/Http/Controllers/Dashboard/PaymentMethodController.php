<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Payment\Entities\PaymentMethod;
use  Modules\Payment\Services\PaymentGateways\PaymentGatewayFactory;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.payment-methods.index',[
            'methods' => PaymentMethod::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $method = PaymentMethod::findOrFail($id);
        $gateway = PaymentGatewayFactory::create($method->slug);//return instance gw
        return view('pages.dashboard.payment-methods.edit',[
            'method' => $method,
            'options' => $gateway->formOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $method = PaymentMethod::findOrFail($id);
        $method->update($request->all());
        return redirect()->route('pages.dashboard.payment-methods.index')
                ->with('success','Payment method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

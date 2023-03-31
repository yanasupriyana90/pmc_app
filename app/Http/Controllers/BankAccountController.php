<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountCreateRequest;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccount = BankAccount::orderBy('id','desc')->get();
        return view('master.accounting.bankAccount.index',['bankAccountList' => $bankAccount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.accounting.bankAccount.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountCreateRequest $request)
    {
        $bankAccount = new BankAccount();
        $bankAccount = BankAccount::create($request->all());
        $bankAccount->name_bank = strtoupper($request->name_bank);
        $bankAccount->no_account = strtoupper($request->no_account);
        $bankAccount->name_account = strtoupper($request->name_account);
        $bankAccount->save();

        $notification = array(
            'message' => 'Bank Account Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('bankAccount')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bankAccount = BankAccount::find($id);
        return view('master.accounting.bankAccount.partials.show', ['bankAccount' => $bankAccount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount, $id)
    {
        $bankAccount = BankAccount::findOrFail($id);
        return view('master.accounting.bankAccount.partials.edit', ['bankAccount' =>$bankAccount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bankAccount = BankAccount::findOrfail($id);

        $bankAccount->update($request->all());
        $bankAccount->name_bank = strtoupper($request->name_bank);
        $bankAccount->no_account = strtoupper($request->no_account);
        $bankAccount->name_account = strtoupper($request->name_account);
        $bankAccount->saldo = strtoupper($request->saldo);
        $bankAccount->save();

        $notification = array(
            'message' => 'Data Bank Account Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('bankAccount')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankAccount = BankAccount::findOrFail($id);
        BankAccount::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Bank Account Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashInBankCreateRequest;
use App\Models\BankAccount;
use App\Models\CashInBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashInBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashInBank = CashInBank::with('user', 'bankAccount')->orderBy('id', 'desc')->get();
        // dd($cashInBank);
        return view('accounting.transaction.cashInBank.index', ['cashInBankList' => $cashInBank]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createReceivable()
    {
        $q = DB::table('cash_in_banks')->select(DB::raw('MAX(RIGHT(no_trans,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $bankAccount = BankAccount::select('id', 'name_bank')->get();
        return view(
            'accounting.transaction.cashInBank.partials.createReceivable',
            [
                'kd' => $kd,
                'bankAccount' => $bankAccount,
            ]
        );
    }

    public function createPayable()
    {
        $q = DB::table('cash_in_banks')->select(DB::raw('MAX(RIGHT(no_trans,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $bankAccount = BankAccount::select('id', 'name_bank')->get();
        return view(
            'accounting.transaction.cashInBank.partials.createPayable',
            [
                'kd' => $kd,
                'bankAccount' => $bankAccount,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashInBankCreateRequest $request)
    {

        $trans_doc = $request->trans_doc;
        $fileNameTrDoc = 'tr_' . uniqid() . '.' . $trans_doc->extension();

        $cashInBank = new CashInBank();
        // $cashInBank = CashInBank::create($request->all());
        $cashInBank->no_trans = $request->no_trans;
        $cashInBank->date_trans = $request->date_trans;
        $cashInBank->desc = strtoupper($request->desc);
        $cashInBank->debit = $request->debit;
        $cashInBank->credit = $request->credit;
        $cashInBank->bank_account_id = $request->bank_account_id;
        $cashInBank->trans_doc = $request->trans_doc;
        $cashInBank->remarks = strtoupper($request->remarks);
        $cashInBank->user_id = $request->user_id;
        $cashInBank->trans_doc = $fileNameTrDoc;
        $trans_doc->move(public_path() . '/trans_doc', $fileNameTrDoc);
        $cashInBank->save();

        $notification = array(
            'message' => 'Transaction Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('cashInBank')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashInBank  $cashInBank
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cashInBank = CashInBank::find($id);
        $bankAccount = BankAccount::select('id', 'name_bank')->get();
        return view('accounting.transaction.cashInBank.partials.show', ['cashInBank' => $cashInBank, 'bankAccount' => $bankAccount]);
    }

    // public function showPayable($id)
    // {
    //     $cashInBankPayable = CashInBank::find($id);
    //     return view('accounting.transaction.cashInBank.partials.showPayable', ['cashInBankPayable' => $cashInBankPayable]);
    // }

    // public function showReceivable($id)
    // {
    //     // $cashInBankReceivable = CashInBank::find($id);
    //     $cashInBankReceivable = CashInBank::where('id', '=', $id, 'and', 'no_trans', 'like', 'TR-%')->first();
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashInBank  $cashInBank
     * @return \Illuminate\Http\Response
     */
    public function edit(CashInBank $cashInBank, $id)
    {
        $cashInBank = CashInBank::findOrfail($id);
        $bankAccount = BankAccount::select('id', 'name_bank')->get();
        return view('accounting.transaction.cashInBank.partials.edit', ['cashInBank' => $cashInBank, 'bankAccount' => $bankAccount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashInBank  $cashInBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cashInBank = CashInBank::findOrfail($id);

        $cashInBank->update($request->all());
        $cashInBank->desc = strtoupper($request->desc);
        $cashInBank->remarks = strtoupper($request->remarks);
        $cashInBank->save();

        $notification = array(
            'message' => 'Data Cash In Bank Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('cashInBank')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashInBank  $cashInBank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashInBank = CashInBank::findOrFail($id);
        CashInBank::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Cash In Bank Deleted Successfully');
    }
}

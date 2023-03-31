<?php

namespace App\Http\Controllers;

use App\Http\Requests\PettyCashCreateRequest;
use App\Models\BankAccount;
use App\Models\PettyCash;
use Database\Seeders\PettyCashSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pettyCash = PettyCash::with('user', 'bankAccount')->orderBy('id', 'desc')->get();
        return view('accounting.transaction.pettyCash.index', ['pettyCashList' => $pettyCash]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createReceivable()
    {
        $q = DB::table('petty_cashes')->select(DB::raw('MAX(RIGHT(no_trans,4)) as kode'));
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
            'accounting.transaction.pettyCash.partials.createReceivable',
            [
                'kd' => $kd,
                'bankAccount' => $bankAccount,
            ]
            );
    }

    public function createPayable()
    {
        $q = DB::table('petty_cashes')->select(DB::raw('MAX(RIGHT(no_trans,4)) as kode'));
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
            'accounting.transaction.pettyCash.partials.createPayable',
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
    public function store(PettyCashCreateRequest $request)
    {
        $trans_doc = $request->trans_doc;
        $fileNameTrDoc = 'tr_c_' . uniqid() . '.' . $trans_doc->extension();

        $pettyCash = new PettyCash();
        $pettyCash->no_trans = $request->no_trans;
        $pettyCash->date_trans = $request->date_trans;
        $pettyCash->desc = strtoupper($request->desc);
        $pettyCash->debit = $request->debit;
        $pettyCash->credit = $request->credit;
        $pettyCash->bank_account_id = $request->bank_account_id;
        $pettyCash->trans_doc = $request->trans_doc;
        $pettyCash->remarks= strtoupper($request->remarks);
        $pettyCash->user_id = $request->user_id;
        $pettyCash->trans_doc = $fileNameTrDoc;
        $trans_doc->move(public_path() . '/trans_doc_petty_cash', $fileNameTrDoc);
        $pettyCash->save();

        $notification = array(
            'message' => 'Transaction Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pettyCash')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pettyCash = PettyCash::find($id);
        $bankAccount = BankAccount::select('id', 'name_bank')->get();
        return view('accounting.transaction.pettyCash.partials.show', ['pettyCash' => $pettyCash, 'bankAccount' => $bankAccount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function edit(pettyCash $pettyCash, $id)
    {
        $pettyCash = PettyCash::findOrfail($id);
        $bankAccount = BankAccount::select('id', 'name_bank')->get();
        return view('accounting.transaction.pettyCash.partials.edit', ['pettyCash' => $pettyCash, 'bankAccount' => $bankAccount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pettyCash = PettyCash::findOrfail($id);

        $pettyCash->update($request->all());
        $pettyCash->desc = strtoupper($request->desc);
        $pettyCash->remarks = strtoupper($request->remarks);
        $pettyCash->save();

        $notification = array(
            'message' => 'Data Petty Cash Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pettyCash')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pettyCash = PettyCash::findOrfail($id);
        PettyCash::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Petty Cash Deleted Successfully');
    }
}

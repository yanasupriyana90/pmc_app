<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyPartyCreateRequest;
use App\Models\MandatoryTax;
use App\Models\NotifyParty;
use Illuminate\Http\Request;

class NotifyPartyController extends Controller
{
    public function index()
    {
        $notifyParty = NotifyParty::with('user', 'mandatoryTax')->orderBy('id','desc')->get();
        return view('master.notifyParty.index',['notifyPartyList' => $notifyParty]);
    }


    public function create()
    {
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        return view('master.notifyParty.partials.create', ['notifyParty' => $mandatory_tax]);
    }


    public function store(NotifyPartyCreateRequest $request)
    {
        $notifyParty = new NotifyParty;

        $notifyParty = NotifyParty::create($request->all());
        $notifyParty->code_notify_party = strtoupper($request->code_notify_party);
        $notifyParty->name = strtoupper($request->name);
        $notifyParty->address = strtoupper($request->address);
        $notifyParty->save();

        $notification = array(
            'message' => 'Notify Party Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('notifyParty')->with($notification);
    }


    public function show($id)
    {
        // $notifyParty = notifyParty::find($id);
        $notifyParty = NotifyParty::with(['user', 'mandatoryTax'])->findOrFail($id);
        return view('master.notifyParty.partials.show', ['notifyParty' => $notifyParty]);
    }


    public function edit(NotifyParty $notifyParty, $id)
    {
        $notifyParty = NotifyParty::with('mandatoryTax')->findOrfail($id);
        $mandatoryTax = MandatoryTax::where('id', '!=', $notifyParty->mandatory_tax_id)->get(['id', 'name']);
        return view('master.notifyParty.partials.edit', ['notifyParty' => $notifyParty, 'mandatoryTax' => $mandatoryTax]);
    }


    public function update(NotifyPartyCreateRequest $request, $id)
    {
        $notifyParty = NotifyParty::findOrfail($id);

        $notifyParty->update($request->all());
        $notifyParty->code_notify_party = strtoupper($request->code_notify_party);
        $notifyParty->name = strtoupper($request->name);
        $notifyParty->address = strtoupper($request->address);
        $notifyParty->save();

        $notification = array(
            'message' => 'Data Notify Party Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('notifyParty')->with($notification);
    }


    public function destroy($id)
    {
        $notifyParty = NotifyParty::findOrFail($id);
        NotifyParty::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Notify Party Deleted Successfully');
    }
}

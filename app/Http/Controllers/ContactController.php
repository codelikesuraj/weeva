<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index() {
        return view('contact.all', [
            'contacts' => Contact::query()
                ->where('created_by', '=', Auth::user()->id)
                ->orderBy('name', 'asc')
                ->get()
        ]);
    }

    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'unique:contacts'],
            'phone' => ['nullable'],
            'type' => ['required'],
        ]);
        
        if(Contact::where([
            ['name','=',$request->name],
            ['created_by', '=', Auth::user()->id]
        ])->count()):
            return redirect()
            ->back()
            ->withErrors(['name already exists'])
            ->withInput();
        endif;

        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,
            'created_by' => Auth::user()->id,
        ]);

        return back()->with([
            'status' => ['Contact has been created successfully'],
        ]);
    }


    /*************************************************
     * This deletes any contact,
     * don't worry it works already.
     * I just don't want the
     * feature to be available
    */
    // public function confirm_delete(Contact $contact){
    //     return view('contact.confirm_delete', [
    //         'contact' => $contact
    //     ]);
    // }

    // public function delete(Request $request){
    //     $contact = Contact::find($request->contact_id);
    //     if($contact):
    //         $contact->delete();
    //     endif;
        
    //     return redirect('/contacts');
    // }

    public function edit(Contact $contact){
        if(!$contact){abort(404);}

        return view('contact.edit', [
            'contact' => $contact
        ]);
    }

    public function update(Request $request){
        $contact = Contact::find($request->contact_id);

        if(!$contact){abort(404);}
        
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'unique:contacts,name,'.$contact->id],
            'phone' => ['nullable'],
            'type' => ['required', 'in:weaver,sales'],
        ]);

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->type = $request->type;

        $contact->update();

        return back()->with([
            'status' => ['Contact has been updated successfully'],
        ]);
    }

    
}

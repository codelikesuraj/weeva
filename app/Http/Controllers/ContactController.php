<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index() {
        return view('contact.all', [
            'contacts' => Contact::latest()
            ->where('created_by', '=', Auth::user()->id)->get()
        ]);
    }

    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'unique'],
            'phone' => ['min:11', 'unique:contacts'],
            'type' => ['required'],
        ]);

        $order = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,
            'created_by' => Auth::user()->id,
        ]);

        return redirect('/contacts');
    }

    public function confirm_delete(Contact $contact){
        return view('contact.confirm_delete', [
            'contact' => $contact
        ]);
    }

    public function delete(Request $request){
        $contact = Contact::find($request->contact_id);
        if($contact):
            $contact->delete();
        endif;
        
        return redirect('/contacts');
    }

    // public function edit(Contact $contact){
    //     return view('contact.edit', [
    //         'contact' => $contact
    //     ]);
    // }

    // public function update(Request $request){
    //     $request->validate([
    //         'name' => ['required', 'string', 'min:3', 'unique:contacts'],
    //         'phone' => ['min:11', 'unique:contacts'],
    //         'type' => ['required'],
    //     ]);
    //     return redirect('/contacts');
    // }

    
}

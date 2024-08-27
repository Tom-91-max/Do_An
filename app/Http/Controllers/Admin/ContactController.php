<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contact::myFillter()->paginate(12);
        return view('admin.contact.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if($contact->delete()){
            return redirect()->route('contact.index')->with('ok','Delete a contact successffuly');
        }else {
            return redirect()->route('contact.index')->with('no','Something error, Please try again');
        }
    }
}

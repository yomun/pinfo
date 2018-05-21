<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Contact;

use App\Http\Resources\ContactCollection;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('contact');
    }

    // Contact List: JSON Format
    public function show() {
        return new ContactCollection(Contact::all());
    }

    // Edit Page
    public function edit()
    {
        $auth_user_id = Auth::user()->id;

        $user_rec = Contact::where('user_id', $auth_user_id)->first();

        $contact = new Contact;

        $contact->user_id  = $auth_user_id;

        if ($user_rec == NULL) {
            $contact->addr     = "";
            $contact->postcode = "";
            $contact->state    = "";
        } else {
            $contact_rec = Contact::find($user_rec->id);

            if ($contact_rec == NULL) {
                $contact->addr     = "";
                $contact->postcode = "";
                $contact->state    = "";
            } else {
                $contact->addr     = $contact_rec->addr;
                $contact->postcode = $contact_rec->postcode;
                $contact->state    = $contact_rec->state;
            }
        }

        return view('contact')->with('contact', $contact);
    }

    // SAVE & UPDATE PROCESS
	public function store(Request $request)
	{
		$this->validate($request, [
        	'addr'     => 'required|string|max:255',
            'postcode' => 'required|digits:5',
            'state'    => 'required|string|max:30',
    	]);

        $auth_user_id = Auth::user()->id;

        $contact_rec = Contact::where('user_id', $auth_user_id)->first();

        if ($contact_rec == NULL) {
    	   $contact_rec = new Contact;
        }

        $contact_rec->addr     = $request->get('addr');
        $contact_rec->postcode = $request->get('postcode');
        $contact_rec->state    = $request->get('state');
        $contact_rec->user_id  = $auth_user_id;

    	if ($contact_rec->save()) {
            return redirect()->back()->withInput()->withErrors('Saving OK');
    	} else {
        	return redirect()->back()->withInput()->withErrors('Saving NOK');
    	}
	}
}

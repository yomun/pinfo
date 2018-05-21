<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserContact;
use App\Contact;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\ContactCollection;

class UserController extends Controller
{
	// User List
    public function index()
    {
    	return view('users')->withUsers(User::all());
    }

    // User List: JSON Format
    public function show() {
    	return new UserCollection(User::all());
    }

	// Edit Page
	public function edit($id)
	{
		$user = User::find($id);
		return view('user')->with('user', $user);
	}

	// UPDATE PROCESS
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $user = User::find($id);
        $user->name  = $request->get('name');
        $user->email = $request->get('email');

        if (($request->get('role') == "1") || ($request->get('role') == "2")) {
        	$user->role_id = $request->get('role');
    	}

        if ($user->save()) {
            return redirect()->back()->withInput()->withErrors('Saving OK');
        } else {
            return redirect()->back()->withInput()->withErrors('Saving NOK');
        }
    }

    // DELETE PROCESS
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();

		$contact = Contact::where('user_id', $user->id);
		$contact->delete();

		return view('users')->withUsers(User::all());
	}
}

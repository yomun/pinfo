<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;
use App\Contact;

use App\Http\Resources\ContactResource;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password',];

    protected $hidden = ['id', 'password', 'remember_token', 'role_id', 'created_at', 'updated_at',];

    protected $appends = ['role_name', 'contact'];

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getRoleNameAttribute()
    {
        $role = Role::find($this->role_id);
        return $role->role_name;
    }

    public function getContactAttribute()
    {
        $contact = Contact::where('user_id', $this->id)->first();

        if ($contact != null) {
            return new ContactResource($contact);
        } else {
            return "";
        }
    }
}

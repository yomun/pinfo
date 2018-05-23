<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Contact extends Model
{
	protected $hidden = ['id', 'user_id', 'created_at', 'updated_at',];

	protected $appends = ['name', 'email'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function getNameAttribute()
	{
		$user = User::find($this->user_id);
		return $user->name;
	}

	public function getEmailAttribute() 
	{
		$user = User::find($this->user_id);
		return $user->email;
	}
}

<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public $fillable = [
		'name',
		'email',
		'password',
	];

	/**
   * Validation rules
   */
  public $rules = [
      'email'    => 'required|between:6,255|email|unique:users',
      'name' => 'required|between:2,255',
      'password' => 'required:create|between:4,255|confirmed',
      'password_confirmation' => 'required_with:password|between:4,255'
  ];


  /**
   * Static method so we can check whether the user is a member or not 
   */
	public static function isMember()
	{	
		$user = Auth::getUser();
		if ($user->is_member) {
        return true;
		}else{
			return false;
		}
	}

}
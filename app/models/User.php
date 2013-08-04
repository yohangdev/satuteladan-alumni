<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function profilePhoto($params = array())
	{
		$size  = $params['size'];
		
		if(isset($params['class']))
			$class = $params['class'];

		switch($size) {
			case 'thumb-48':
				$width   = 48;
				$height  = 48;
				$profpic = 'profile-48x48.jpg';
				break;
			case 'thumb-32':
				$width   = 32;
				$height  = 32;
				$profpic = 'profile-32x32.jpg';
				break;				
		}

		$user_id         = $this->id;
		$storeDir        = 'storage/';
		$storeProfilePic = $storeDir . $user_id . '/profile/';
		$filepath        = $storeProfilePic . $profpic;

		if( ! is_file(public_path() . '/' . $filepath) ) {
			$filepath = 'assets/img/avatar_default.jpg';
		}

		$output = '<img src="'.asset($filepath).'" width="'.$width.'" height="'.$height.'" '.(!empty($class) ? 'class="'.$class.'"' : '').' />';

		return $output;
	}

}
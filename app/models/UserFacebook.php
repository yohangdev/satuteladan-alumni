<?php

class UserFacebook extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usersfb';

	protected $hidden = array('fb_token');

	/**
	 * Enable soft delete
	 * @var boolean
	 */
	protected $softDelete = true;

}
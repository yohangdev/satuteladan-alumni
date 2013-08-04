<?php

class UserController extends BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin()
    {
        $email    = Input::get( 'email' );
        $password = Input::get( 'password' );
        $remember = Input::get( 'remember' );

        if( ! empty($remember))
            $remember = true;
        else
            $remember = false;

        if (Auth::attempt(array('email' => $email, 'password' => $password, 'active' => 1, 'external' => 0), $remember))
        {
            return Redirect::intended('user/dashboard.php');
        }
        else
        {
            Session::flash('login-error', 'Alamat email atau password salah');
            return Redirect::to('login.php')
                ->withInput(Input::except('password'));
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('login.php');
    }

}

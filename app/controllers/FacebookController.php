<?php

class FacebookController extends BaseController {

    public function getAuth()
    {
        if (Input::has('error'))
        {
            Notification::container('SiteGlobal')->error('<strong>Gagal Login!</strong> tidak bisa izin akses data Facebook.');
            return Redirect::to('register');
        }

        $code  = Input::get('code');

        $appId     = Config::get('facebook.app_id');
        $appSecret = Config::get('facebook.app_secret');
        $redirect  = url('facebook/auth');

        $curl = New Curl;

        $url = 'https://graph.facebook.com/oauth/access_token?' .
               'client_id=' . $appId .
               '&redirect_uri=' . $redirect .
               '&client_secret=' . $appSecret .
               '&code='.$code;

        $response = $curl->simple_get($url);

        // Extract User Access Token
        $user_token  = explode('&', $response);
        $user_token  = substr($user_token[0], 13);


        // Get App Access Token
        // https://developers.facebook.com/docs/facebook-login/access-tokens/
        $url =  'https://graph.facebook.com/oauth/access_token?' .
                'client_id=' . $appId .
                '&client_secret=' . $appSecret .
                '&grant_type=client_credentials';

        $response       = $curl->simple_get($url);
        $appAccessToken = substr($response, 13);

        // Debug Access Token
        // https://developers.facebook.com/docs/facebook-login/login-flow-for-web-no-jssdk/
        $url =  'https://graph.facebook.com/debug_token?' .
                'input_token=' . $user_token .
                '&access_token=' . $appAccessToken;

        $response  = $curl->simple_get($url);
        $debug     = json_decode($response);
        $fb_userid = $debug->data->user_id;

        $item      = UserFacebook::where('fb_userid', $fb_userid)->first();

        if(count($item) == 0) {
            $url               = 'https://graph.facebook.com/'.$fb_userid . '?access_token=' . $user_token;
            $response          = $curl->simple_get($url);
            $fb_userdata       = json_decode($response);

            $fb_name           = $fb_userdata->name;
            $fb_link           = $fb_userdata->link;
            $fb_email          = $fb_userdata->email;

            $user              = new User;
            $user->name        = $fb_name;
            $user->email       = $fb_email;
            $user->active      = 1;
            $user->external    = 1;
            $user->login_last  = new DateTime;
            $user->save();

            $user_id           = $user->id;

            $userfb            = new UserFacebook;
            $userfb->user_id   = $user_id;
            $userfb->fb_userid = $fb_userid;
            $userfb->fb_name   = $fb_name;
            $userfb->fb_link   = $fb_link;
            $userfb->fb_email  = $fb_email;
            $userfb->fb_token  = $user_token;
            $userfb->save();
        } else {
            $user_id = $item->user_id;
        }

        // Update Profile Pictures
        $storeDir        = public_path() . '/storage/';
        $storeProfilePic = $storeDir . $user_id . '/profile/';

        if( ! is_dir($storeProfilePic)) {
            mkdir($storeProfilePic, 0755, TRUE);
        }

        if( ! is_dir($storeDir . $user_id . '/pins/')) {
            mkdir($storeDir . $user_id . '/pins/', 0755, TRUE);
        }

        $url  = 'https://graph.facebook.com/'.$fb_userid . '/picture?width=480&height=480&access_token=' . $user_token;
        $data = file_get_contents($url);
        $img  = Image::make($data);
        $img->save($storeProfilePic . 'profile.jpg');

        $img  = Image::make($data)->resize(32, 32);
        $img->save($storeProfilePic . 'profile-32x32.jpg');

        $img  = Image::make($data)->resize(48, 48);
        $img->save($storeProfilePic . 'profile-48x48.jpg');

        $img  = Image::make($data)->resize(64, 64);
        $img->save($storeProfilePic . 'profile-64x64.jpg');

        $img  = Image::make($data)->resize(128, 128);
        $img->save($storeProfilePic . 'profile-128x128.jpg');

        $img  = Image::make($data)->resize(256, 256);
        $img->save($storeProfilePic . 'profile-256x256.jpg');

        // Log in user, remember session
        Auth::loginUsingId($user_id, true);
        $item->login_last = New DateTime;
        $item->save();

        // Redirect to Dashboard
        return Redirect::to('user/dashboard');
    }

}

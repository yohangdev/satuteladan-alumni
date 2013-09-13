<?php

class UserPinController extends BaseController {

    /**
     * Pin Model
     * @var Pin
     */
    protected $pin;

    /**
     * Inject the models.
     * @param Pin $pin
     */
    public function __construct(Pin $pin)
    {
        parent::__construct();

        $this->pin = $pin;
    }

    public function getIndex()
    {
        $user_id = Auth::user()->id;

        $pins = $this->pin->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(5);

        return View::make('site/user/page/pin/index', compact('pins'));
    }

    public function getEdit($pin)
    {
        if($pin->user_id != Auth::user()->id) {
            App::abort(401, 'You are not authorized.');
        }

        return View::make('site/user/page/pin/create_edit', compact('pin'));
    }

    public function postEdit($pin)
    {
        if($pin->user_id != Auth::user()->id) {
            App::abort(401, 'You are not authorized.');
        }

        // Declare the rules for the form validation
        $rules = array(
            // 'title'   => 'required|min:3',
            'description'  => 'required|min:20'
        );

        $messages = array(
            // 'title' => 'Kotak :attribute wajib diisi.',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules, $messages);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the post data
            // $pin->title       = Input::get('title');
            $pin->description = Input::get('description');

            // Was the post updated?
            if($pin->save())
            {
                Notification::container('UserPageModal')->success('<strong>'.$pin->title.'</strong> berhasil disimpan.');
                return Redirect::to('user/pin/' . $pin->id . '/edit.php');
            }

            Notification::container('UserPageModal')->error('<strong>'.$pin->title.'</strong> gagal disimpan.');
            return Redirect::to('user/pin/' . $pin->id . '/edit.php');
        }

        // Form validation failed
        Notification::container('UserPageModal')->error('<strong>'.$pin->title.'</strong> gagal diproses, data tidak valid. Cek kembali formulir isian.');
        return Redirect::to('user/pin/' . $pin->id . '/edit.php')->withInput()->withErrors($validator);
    }

    public function getCreate()
    {
        // Show the page
        return View::make('site/user/page/pin/create_edit');
    }

    public function postCreate()
    {

        // Declare the rules for the form validation
        $rules = array(
            'title'       => 'required|min:5',
            'description' => 'required|min:20',
            'image'       => 'required|image|mimes:jpeg|max:2000|imagemin'
        );

        // Validate Image Dimension
        Validator::extend('imagemin', function($attribute, $value, $parameters)
        {
            $path  = Input::file('image')->getRealPath();
            $image = getimagesize($path);
            if($image[0] >= 570 && $image[1] >= 300)
                return true;
            else
                return false;
        });


        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $user_id     = Auth::user()->id;
            $destStorage = 'storage/' . $user_id . '/pins/';
            $destPath    = public_path() . '/' . $destStorage;

            // check apa slug sudah ada
            $loop    = true;
            $n       = 2;
            $title   = Str::slug(Input::get('title'));

            $slug    = $title . '.html';
            $slug_db = Pin::withTrashed()->where('slug', $slug)->count();

            if((int) $slug_db > 0) {
                while($loop) {
                    $slug    = $title . '-' . $n . '.html';
                    $slug_db = Pin::withTrashed()->where('slug', $slug)->count();
                    $n++;

                    if((int) $slug_db == 0)
                        $loop = false;
                }
            }

            // rename file
            $filename    = str_replace('.html', '.jpg', $slug);
            $filepath    = $destPath . $filename;

            Input::file('image')->move($destPath, $filename);

            // watermark error when resized
            // resize first, save
            // open, do watermark, save
            $img       = Image::make( $filepath )->resize(570, null, true);
            $new_file  = str_replace(".jpg", "-570w.jpg", $filename);
            $img->save( $destPath . $new_file, 100 );

            $img       = Image::make( $destPath . $new_file );
            $img       = $this->doWatermark($img);
            $img->save( $destPath . $new_file, 100 );

            $img       = Image::make( $filepath )->resize(215, null, true);
            $new_file = str_replace(".jpg", "-215w.jpg", $filename);
            $img->save( $destPath . $new_file, 100 );

            $img       = Image::make( $filepath );
            $img       = $this->doWatermark($img);
            $img->save( $filepath, 100 );

            /*
            $s3 = AWS::get('s3');
            $s3->putObject(array(
                'Bucket'     => 'satuteladan',
                'Key'        => $filename,
                'SourceFile' => $filepath,
                'ACL'        => 'public-read',
            ));
            */

            // Update the post data
            $this->pin->title       = Input::get('title');
            $this->pin->slug        = $slug;
            $this->pin->type        = 'image';
            $this->pin->source      = $destStorage . $filename ;
            $this->pin->description = Input::get('description');
            $this->pin->user_id     = $user_id;
            $this->pin->published   = 1;
            $this->pin->moderation  = 1;

            // Was the post updated?
            if($this->pin->save())
            {
                Notification::container('UserPageModal')->success('<strong>'.$this->pin->title.'</strong> berhasil disimpan.');
                return Redirect::to('user/pin/' . $this->pin->id . '/edit.php');
            }

            Notification::container('UserPageModal')->error('<strong>'.$this->pin->title.'</strong> gagal disimpan.');
            return Redirect::to('user/pin/' . $this->pin->id . '/edit.php');
        }

        // Form validation failed
        Notification::container('UserPageModal')->error('<strong>'.Input::get('title').'</strong> gagal diproses, data tidak valid. Cek kembali formulir isian.');
        return Redirect::to('user/pin/create.php')->withInput()->withErrors($validator);
    }

    public function getDelete($pin)
    {
        if($pin->user_id != Auth::user()->id) {
            App::abort(401, 'You are not authorized.');
        }

        return View::make('site/user/page/pin/delete', compact('pin'));
    }

    public function postDelete($pin)
    {
        if($pin->user_id != Auth::user()->id) {
            App::abort(401, 'You are not authorized.');
        }

        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id    = $pin->id;
            $title = $pin->title;
            $pin->delete();

            // Was the post deleted?
            $pin = Pin::find($id);
            if(empty($pin))
            {
                // Redirect to the posts management page
                Notification::container('UserPageModal')->info('<strong>'.$title.'</strong> berhasil dihapus.');
                return Redirect::to('user/pin/index.php');
            }
        }
        // There was a problem deleting the post
        Notification::container('UserPageModal')->error('<strong>'.$title.'</strong> gagal dihapus.');
        return Redirect::to('user/pin/' . $id . '/delete.php');
    }

    private function doWatermark($imgInstance)
    {
        $img    = $imgInstance;

        $width  = $img->width;
        $height = $img->height;
        $font   = public_path() . '/assets/font/DroidSans.ttf';

        $img->rectangle('#E5E5E5', 0, $height-40, $width, $height);
        $img->text('satuteladan.net | Bersama Berbagi Inspirasi', 20, $height-15, 12, '#A0A0A0', 0, $font);

        return $img;
    }
}

<?php

use Illuminate\Support\Facades\URL; 

class Pin extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pins';

    protected $softDelete = true;	

	/**
	 * Get the URL to the post.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to('pin/' . $this->slug);
	}

	/**
	 * Get the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function description()
	{
		return nl2br($this->description);
	}	

	public function content($type, $params=array())
	{
		$contentType   = $this->type;
		$contentSource = $this->source;
		
		switch($params['type']) {
			case 'thumbnail_home':
				$resizedFile   = str_replace(".jpg", "-215w.jpg", $contentSource);	
				break;
			case 'full_width':
				$resizedFile   = str_replace(".jpg", "-570w.jpg", $contentSource);	
				break;							
		}

		$output = '<img src="'.asset($resizedFile).'" class="img-responsive" width="100%" />';

		return $output;
	}

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	/**
	 * Returns the date of the blog post creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the blog post last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}    	
}

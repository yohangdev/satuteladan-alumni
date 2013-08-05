<?php

class HomeController extends BaseController {

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
        $pins = $this->pin
                    ->where('pins.published', 1)
                    ->join('users', 'users.id', '=', 'pins.user_id')
                    ->where('pins.moderation', 1)
                    ->where('users.active', 1)
                    ->orderBy('pins.created_at', 'DESC')
                    ->paginate(20);

        return View::make('site/home/index', compact('pins'));
    } 

}
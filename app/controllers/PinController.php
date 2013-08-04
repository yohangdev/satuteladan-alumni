<?php

class PinController extends BaseController {

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

    /**
     * View a pin pin.
     *
     * @param  string  $slug
     * @return View
     * @throws NotFoundHttpException
     */
    public function getView($slug)
    {
        $pin = $this->pin->where('slug', '=', $slug)->first();

        if (is_null($pin))
        {
            return App::abort(404);
        }

        return View::make('site/pin/view', compact('pin'));
    }
}

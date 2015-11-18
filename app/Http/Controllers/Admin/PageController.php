<?php

namespace App\Http\Controllers\Admin;

class PageController extends MypageController {

    public function __construct() {
        parent::__construct();
        $this->middleware('auth.admin');
    }

}

<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;

interface ViewMethods
{
    public function add();
    public function manage();
    public function search(Request $request);
}

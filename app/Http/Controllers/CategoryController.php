<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
$tets = true;
class CategoryController extends Controller
{
    public function create() {
        return view('category.add');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class SystemsNameGenerator extends Controller
{
    public function __invoke()
    {
        $content = '';

        $systems = System::all();

        foreach ($systems as $system) {
            $content .= $system->name . "\n";
        }

        return $content;
    }
}

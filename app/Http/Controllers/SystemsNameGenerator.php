<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class SystemsNameGenerator extends Controller
{
    public function __invoke()
    {
        $systems = System::all();

        $names = [];

        foreach ($systems as $system) {
            $systemType = 'F';
            $wallTypes = [2,3];

            if ($system->barrierType) {
                $material = '';

                if (in_array($system->barrierType->id, $wallTypes)) {
                    $systemType = 'W';
                }

                if (str_contains($system->barrierType->name, 'Concrete')) {
                    $material .= 'AJ';
                } else {
                    $material .= 'L';
                }

                $systemType .= '-' . $material;
            } else {
                // Randomly chose a letter.
                $systemType .= '-I';
            }

            $name = $systemType . '-' . $system->name;

            $system->name = $name;
            $system->save();

            $names[] = $name;
        }

        return view('systems-generated', [
            'names' => $names,
        ]);
    }
}

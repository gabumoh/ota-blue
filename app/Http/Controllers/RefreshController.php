<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class RefreshController extends Controller
{
    public function refresh(Request $request)
    {
        
        $root_path = base_path();
        $process = new Process('cd ' . $root_path . '; ./refresh.sh');
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });
    }
}

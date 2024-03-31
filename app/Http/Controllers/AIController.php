<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AIController extends Controller
{
    public function executeCommands()
    {
        $prompt = 'How to be a good programmer?';
        $directory = 'C:\\Users\\Dell\\Desktop\\ChatAPP';

        $command = 'cmd /c "cd '.$directory." && conda activate chatapp && python app.py $prompt";

        exec($command, $output, $returnCode);

        if ($returnCode !== 0) {
            return [
                'error' => 'Command execution failed',
                'output' => $output
            ];
        }

        return [
            'output' => $output
        ];
    }
}

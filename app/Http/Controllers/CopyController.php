<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;


class CopyController extends Controller
{
   public function copy($path)
   
   {

        $parts = explode('/', $path);
        $adjustedPath = 'pgsoft/' . implode("/", $parts);
        $localPath = public_path($adjustedPath);
     
        if(File::exists($localPath)){

            $extension = pathinfo($localPath, PATHINFO_EXTENSION);
            $mimeTypes = [

                'json' => 'application/json',
                'js' => 'text/javascript',
                'html' => 'text/html'
            ];

            $contentType = $mimeTypes[$extension] ?? 'text/plain';

            $fileContents = File::get($localPath);

            return response($fileContents ,200, ['Content-Type' => $contentType]);

        }else{

        $response = Http::get("https://m.pg-nmga.com/{$path}");

        

        if ($response->successful()) {
            
            $directoryPath = dirname($localPath);

            if (!File::exists($directoryPath)) {

                File::makeDirectory($directoryPath,0755,true,true);
            }
            
            File::put($localPath, $response->body());

            

            $extension = pathinfo($localPath, PATHINFO_EXTENSION);

         
            $mimeTypes = [

                'json' => 'application/json',
                'js' => 'text/javascript',
                'html' => 'text/html'
            ];

            $contentType = $mimeTypes[$extension] ?? 'text/plain';

            return response($response->body(),200, ['Content-Type' => $contentType]);

        }else{

            return response('Arquivo não encontrado ou Site fora do ar', 404);

        }


        }

   
   }
}

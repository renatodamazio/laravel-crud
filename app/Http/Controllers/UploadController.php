<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use GuzzleHttp\Client;
use Exception;


class UploadController extends Controller
{
    public function upload(Request $request) {

    	$client = new Client();

    	try {


	    	$response = $client->request('POST', 'http://127.0.0.1:3000/api/upload', [

		    'multipart' => [
		        [
		            'name'     => 'upload',
		            'contents' => file_get_contents($request->file('upload')),
		            'filename' => time().'.'.$request->upload->getClientOriginalExtension(),
		        ]
		    ]

		]);
	    
	    return $response;

	    } catch(Exception $err) {
	    	return $err;
	    }
    }

    public function index() {
    	return view('index');
    }
}

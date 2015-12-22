<?php namespace App\Http\Controllers;

use Session;
use Input;
use Validator;
use Request;
use Response;
 
class HomeController extends Controller {
 
    public function index() {
        return view('home');
    }
 
    public function uploadFiles() {
 
        $input = Input::all();
 
        $rules = array(
            'file' => 'image|max:3000',
        );
 
        $validation = Validator::make($input, $rules);
 
        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }
 
        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $rand = rand(11111, 99999);
        $fileName = $rand . '.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
 
        if ($upload_success) {
            Session::push('gifts', $rand);
            return Response::json($fileName, 200);
        } else {
            return Response::json('error', 400);
        }
    }
 
    public function removeFile($filename) {
        $gifts = Session::get('gifts', array());
        if(in_array($filename, $gifts)) {
            foreach (array_keys($gifts, $filename) as $key) {
                unset($gifts[$key]);
            }

            Session::forget('gifts');
            foreach ($gifts as $gift) {
                Session::push('gifts', $gift);
            }
        }
        $data = Session::get('gifts');
        dd($data);
    }
 
    public function session() {
        $data = Session::get('gifts');
        dd($data);
    }
 
    public function sessionReset() {
        Session::forget('registrant');
        Session::regenerate();
    }
 
}
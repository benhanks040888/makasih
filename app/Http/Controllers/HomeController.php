<?php namespace App\Http\Controllers;

use Session;
use Input;
use Validator;
use Illuminate\Http\Request;
use Response;

use App\Models\Registrant;
use App\Models\Gift;

class HomeController extends Controller {
 
    public function getIndex() {
        return view('site.home');
    }

    public function getUpload() {
        return view('site.upload');
    }

    public function getSubmit() {
        $gift_session = session('gifts');

        if (is_null($gift_session)) {
            return redirect(route('upload'));
        }

        return view('site.submit');
    }

    public function getThankyou() {
        return view('site.thankyou');
    }

    public function postSubmit(Request $request) {
        $this->validate($request, [
            'first_name'  => 'required',
            'last_name'   => 'required',
            'mobile'      => 'required',
            'address'     => 'required',
            'email'       => 'required|email',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required|date_format:H:i',
            'agree'       => 'accepted'
        ]);

        $new_registrant = array(
            'name'      => ltrim($request->first_name . ' ' . $request->last_name),
            'phone'     => $request->mobile,
            'address'   => $request->address,
            'email'     => $request->email,
            'fb_id'     => !empty($request->fb_id) ? $request->fb_id : '',
            'tw_id'     => !empty($request->tw_id) ? $request->tw_id : '',
            'in_id'     => !empty($request->in_id) ? $request->in_id : '',
            'pickup_at' => $request->pickup_date . ' ' . $request->pickup_time . ':00'
        );

        $registrant = Registrant::create($new_registrant);

        // then save the gifts
        $gifts_session = Session::get('gifts');
        $gift_array = array();
        foreach ($gifts_session as $g) {
            $gift_array[] = array(
                'registrant_id' => $registrant->id,
                'path'          => 'uploads/' . $g,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            );
        }
        $new_gifts = Gift::insert($gift_array);

        // reset session
        Session::forget('gifts');

        return redirect(route('thankyou'));
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
            Session::push('gifts', $fileName);
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
        Session::forget('gifts');
    }
 
}
<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Crater\Http\Requests;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;

class SignUpController extends Controller {

    public function index() {
        $countries = DB::table('countries')->get();
        return view('teacher/register', compact('countries'));
    }

    public function save(Request $request) {
        $this->validate($request,$this->rules());
        $obj = new Teacher();
        $last_id = $obj->createUser($this->attribute($request));
        return redirect('/send-otp/'.encrypt($last_id));
    }

    public function getState(Request $request) {
        $cnt_id = $request->input('cnt_id');
        if (!empty($cnt_id)) {
            $states = DB::table('states')->where('country_id', $cnt_id)->get();
            echo json_encode($states);
        }
    }

    public function getCity(Request $request) {
        $sts_id = $request->input('sts_id');
        if (!empty($sts_id)) {
            $city = DB::table('cities')->where('state_id', $sts_id)->get();
            echo json_encode($city);
        }
    }
    public function getAllUsers()
    {
        $obj = new Teacher();
        $results=$obj->fetchAll();
        print_r(Crypt::decrypt($results[0]->usr_name));
    }
    public function sendOTP(Request $requests,$id)
    {
        $id = decrypt($id);
        $result =(new Teacher())->fetchByID($id);
        if(!empty($result))
        {
            $otp=$this->getOTP();
            $data=['usr_otp'=>$otp,'usr_otp_time'=>date('Y-m-d H:i:s')];
            $retVal=(new Teacher())->updateUser($id,$data);
            if($retVal)
            {
                $ret=(new MailerController())->composeEmail($result['usr_email'],$otp);
                if($ret)
                {
                    return redirect('/otp/'.encrypt($id))->with('status', 'Enter your Email otp');
                }

            }
        }
    }
    public function otp(Request $request ,$id)
    {
        $id = decrypt($id);
        $result =(new Teacher())->fetchByID($id);
        return view('teacher/otp',compact('result'));
    }
    public function checkOtp(Request $request,$id)
    {
        $id = decrypt($id);
        $result =(new Teacher())->checkOTP($request->otp,$id);
        if(count($result) > 0)
        {
            $data=['usr_status'=>1];
            (new Teacher())->updateUser($id,$data);
            session(['login_user_info'=>$result]);
            return redirect('/dashboard')->with('status', 'Welcome To Dashboard');
        }
    }

    public function rules()
    {
        $rules = [
            'name' => [
                'required',
            ],
            'gender' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
                'nullable',
            ],
            'password' => [
                'nullable',
            ],
            'phone' => [
                'required',
            ],
            'institute_name' => [
                'nullable',
            ],
            'city' => [
                'required',
            ],
            'state' => [
                'required',
            ],
            'country' => [
                'required',
            ],
            'address' => [
                'nullable',
            ]
        ];

        return $rules;
    }
    public function getOTP() {
        return (false) ? mt_rand(100000, 999999) : '111111';
    }
    public function attribute($request)
    {
        return [
            'usr_name'=>$request->input('name'),
            'usr_phone'=>$request->input('phone'),
            'usr_email'=>$request->input('email'),
            'usr_gender'=>$request->input('gender'),
            'usr_institute_name'=>$request->input('institute_name'),
            'usr_cnt_id'=>$request->input('country'),
            'usr_sts_id'=>$request->input('state'),
            'usr_dis_id'=>$request->input('city'),
            'usr_address'=>$request->input('address'),
            'usr_password'=>$request->input('password'),
        ];
    }
}


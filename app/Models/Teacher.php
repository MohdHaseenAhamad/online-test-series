<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Teacher extends Model {
    use HasFactory;
    use Encryptable;

    protected $encryptable = [
        'usr_name',
        'usr_email',
        'usr_phone',
        'usr_password',
    ];
    protected $table = 'md_users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'usr_type', 'usr_name', 'usr_email', 'usr_phone', 'usr_institute_name', 'usr_cnt_id', 'usr_sts_id', 'usr_dis_id', 'usr_address', 'usr_password', 'usr_parent_id', 'usr_otp', 'usr_otp_time', 'usr_status'
    ];

    public function getData() {
        return static::all();
    }
    public function fetchAll()
    {
        $results = DB::table('md_users')->select('usr_name')->get();
        return $results;
    }
    public function createUser($data)
    {
        $last_id=DB::table($this->table)->insertGetId($data);
        return $last_id;
    }
    public function fetchByID($id)
    {
       $result = DB::table($this->table)->where($this->primaryKey,$id)->first();
       return $this->objectToArray($result);
    }
    public function checkOTP($otp,$id)
    {
        $result = DB::table($this->table)->where($this->primaryKey,$id)->where('usr_otp',$otp)->first();
        return $this->objectToArray($result);
    }
    public function updateUser($id,$data) {
        $last_id=DB::table($this->table)->where($this->primaryKey, $id)->update($data);
        return $last_id;
    }

    public function objectToArray(&$object)
    {
        return @json_decode(json_encode($object), true);
    }


}

trait Encryptable {
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = Crypt::decrypt($value);
        }

        return $value;
    }

    public function setAttribute($key, $value) {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}

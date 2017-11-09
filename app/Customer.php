<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Member;
class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [ 'cust_name','cust_gender','cust_tel','cust_address','city','company','registerDate', 'status'];
    protected $primaryKey = 'cust_id';
    public $timestamps = false;

    public function order() {
        return $this->hasMany('App/Order', 'cust_id');
    }

    public function member() {
        return $this->hasOne(Member::class);
    }
}

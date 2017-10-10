<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['cust_id', 'status'];
    protected $primaryKey = 'mb_id';
    public $timestamps = false;

    public function customer() {
        return $this->belongsTo(Customer::class, 'cust_id');
    }
}

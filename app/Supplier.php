<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'venders';
    protected $fillable = [ 'ven_name','ven_company','ven_address','ven_tel','ven_website','ven_status','ven_description'];
    protected $primaryKey = 'ven_id';
    public $timestamps = false;
}

<?php

namespace App;
use App\Product;
use App\Customer;
use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [ 'pro_id',
                            'cust_id',
                            'order_quantity',
                            'order_tax',
                            'order_subtotal',
                            'order_amount',
                            'paid',
                            'discount',
                            'lack',
                            'order_date',
                            'user_name' ];
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    
    public function products() {
        return $this->belongsToMany(Product::class, 'pro_id');
    }

    public function customer() {
        return $this->belongsToMany(Customer::class, 'cust_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

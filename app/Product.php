<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;
use App\Group;
use App\Order;
/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [ 'pro_name',
                            'pro_unit',
                            'pro_quantity',
                            'pro_date_storage',
                            'pro_price',
                            'pro_barcode',
                            'pro_expiry',
                            'pro_tax',
                            'pro_photo',
                            'gp_id',
                            'cat_id',
                            'brand_id'];
    protected $primaryKey = 'pro_id';
    public $timestamps = false;

    /**
     * @return mixed
     */
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'gp_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function order() {
        return $this->hasMany(Order::class, 'pro_id');
    }
}

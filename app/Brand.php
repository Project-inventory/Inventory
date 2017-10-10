<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['brand_name'];
    protected $primaryKey = 'brands_id';
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

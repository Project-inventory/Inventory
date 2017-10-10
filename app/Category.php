<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['cat_name'];
    protected $primaryKey = 'cat_id';
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

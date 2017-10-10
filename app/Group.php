<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
/**
 * Class Group
 * @package App
 */
class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = ['gp_name'];
    protected $primaryKey = 'gp_id';
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

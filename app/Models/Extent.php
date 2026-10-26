<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Extent extends Model
{
    protected $table = 'extent';
    public $timestamps = false;
    protected $guarded = [];

    public function restrictions()
    {
        return $this->hasMany(Restriction::class, 'extentid');
    }
}

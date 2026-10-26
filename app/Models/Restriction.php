<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Restriction extends Model
{
    protected $table = 'restriction';
    public $timestamps = false;
    protected $guarded = [];

    public function naming()
    {
        return $this->belongsTo(Naming::class, 'namingid');
    }
    public function extent()
    {
        return $this->belongsTo(Extent::class, 'extentid');
    }
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Naming extends Model
{
    protected $table = 'naming';
    public $timestamps = false;
    protected $guarded = [];

    public function restrictions()
    {
        return $this->hasMany(Restriction::class, 'namingid');
    }
}

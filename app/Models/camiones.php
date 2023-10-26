<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Camiones extends Model
{
    protected $table = 'camiones';
    protected $primaryKey='matricula';
    protected $fillable =['matricula'];
    public $incrementing = false;
    use HasFactory;
    use SoftDeletes;
    use ValidatesRequests;
    public $timestamps = true;

    public function camionLlevaLote()
    {
        return $this->hasMany(CamionLlevaLote::class, 'matricula', 'matricula');
    }
}

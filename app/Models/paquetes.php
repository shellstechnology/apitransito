<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Validation\ValidatesRequests;
class Paquetes extends Model
{
    protected $table = 'paquetes';
    protected $fillable =['id_estado_p'];
    use HasFactory;
    use SoftDeletes;
    use ValidatesRequests;
    public $timestamps = true;
}

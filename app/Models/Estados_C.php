<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Estados_c extends Model
{
    protected $table = 'estados_c';
    use HasFactory;
    use SoftDeletes;
    use ValidatesRequests;
    public $timestamps = true;

}
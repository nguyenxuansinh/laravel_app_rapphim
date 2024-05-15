<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phongchieu extends Model
{
    use HasFactory;
    protected $table = 'phongchieu';
    protected $fillable = ['tenphong'];
    public $timestamps = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phim extends Model
{
    use HasFactory;
    protected $table = 'phim';
    protected $fillable = ['tenphim','theloai','daodien','dienvienchinh','ngayphathanh','thoiluong','mota','hinhanh','video','trangthai'];
    public $timestamps = true;
}

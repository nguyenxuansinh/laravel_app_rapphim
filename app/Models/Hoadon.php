<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';

    protected $fillable = [
        'phuongthucthanhtoan',
        'tongtien',
        'ngaythanhtoan',
        'trangthai',
        'id_khachhang',
        'soluongvedamua',
    ];

    public function khachhang()
    {
        return $this->belongsTo(User::class, 'id_khachhang');
    }
}

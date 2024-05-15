<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suatchieu extends Model
{
    use HasFactory;
    protected $table = 'suatchieu';
    protected $fillable = ['id_phongchieu', 'thoigianchieu', 'id_phim','thoigianketthuc','giave'];

    public function phongchieu()
    {
        return $this->belongsTo(phongchieu::class, 'id_phongchieu');
    }
    public function phim()
    {
        return $this->belongsTo(phim::class, 'id_phim');
    }
}

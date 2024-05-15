<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ghe extends Model
{
    use HasFactory;
    protected $table = 'ghe';
    protected $fillable = ['id_phongchieu', 'tenghe', 'trangthai'];

    public function phongchieu()
    {
        return $this->belongsTo(phongchieu::class, 'id_phongchieu');
    }
}

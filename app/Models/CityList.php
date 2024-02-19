<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityList extends Model
{
    use HasFactory;

    protected $primaryKey = 'city_id';
    protected $table = 'citys'; // ระบุชื่อตารางในฐานข้อมูล
    protected $fillable = [
        'city_name',
        'city_description',
        'city_img',
    ];
}

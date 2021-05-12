<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acertijo extends Model
{
    // protected $connection = 'mysql_connect_2';
    // protected $table = "tc_equilicua";
    // protected $primaryKey = 'i_id';
    public $timestamps = false;
    // protected $fillable = [
    //     "t_pregunta","t_respuesta","t_pista","t_kword1","t_kword2","t_kword3","i_uso","b_estado"
    // ];

    protected $fillable =[
        'pregunta','respuesta','user_id'
    ];
    use HasFactory;

    
}
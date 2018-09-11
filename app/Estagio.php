<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ano;

class Estagio extends Model
{
    protected $table = "estagios";
    protected $primaryKey = "id";
    protected $fillable = array("area", "empresa", "horas", "contacto");
    public $timestamps = true;
    
    public function anos()
    {
        return $this->belongsToMany('App\Ano', 'ano_estagio')->withTimestamps();
    }
}

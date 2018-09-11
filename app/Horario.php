<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Disciplina;	

class Horario extends Model
{
    protected $table = "horarios";
    protected $primaryKey = "id";
    protected $fillable = array("dia", "inicio", "fim", "sala");
    public $timestamps = true;
    
    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'horario_disciplina')->withTimestamps();
    }
}

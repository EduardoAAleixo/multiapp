<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ano;
use App\Disciplina;

class Aviso extends Model
{
    protected $table = "avisos";
    protected $primaryKey = "id";
    protected $fillable = array("titulo", "assunto");
    public $timestamps = true;
    
    public function anos()
    {
        return $this->belongsToMany('App\Ano', 'aviso_ano')->withTimestamps();
    }
    
    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'aviso_disciplina')->withTimestamps();
    }
}

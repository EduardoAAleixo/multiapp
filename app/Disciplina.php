<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aluno;
use App\Ano;
use App\Professor;
use App\Aviso;
use App\Horario;

class Disciplina extends Model
{
    protected $table = "disciplinas";
    protected $primaryKey = "id";
    protected $fillable = array("nome", "ects");
    public $timestamps = true;
    

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno', 'aluno_disciplina')->withTimestamps();
    }
    

    public function anos()
    {
        return $this->belongsToMany('App\Ano', 'ano_disciplina')->withTimestamps();
    }


    public function professores()
    {
        return $this->belongsToMany('App\Professor', 'professor_disciplina')->withTimestamps();
    }
    

    public function avisos()
    {
        return $this->belongsToMany('App\Aviso', 'aviso_disciplina')->withTimestamps();
    }
    

    public function horarios()
    {
        return $this->belongsToMany('App\Horario', 'horario_disciplina')->withTimestamps();
    }
}

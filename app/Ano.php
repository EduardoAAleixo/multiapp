<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aluno;
use App\Aviso;
use App\Disciplina;
use App\Estagio;

class Ano extends Model
{
	protected $table = "anos";
	protected $primaryKey = "id";
	protected $fillable = array("nome"); 
	public $timestamps = true;

	public function alunos()
	{
		return $this->belongsToMany('App\Aluno', 'aluno_ano')->withTimestamps();
	}

	public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'ano_disciplina')->withTimestamps();
    }


	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ano;
/*use App\Disciplina;*/

class Aluno extends Model
{
    protected $table = "alunos";
    protected $primaryKey = "id";
    protected $fillable = array("nome", "cartao_cidadao", "sexo", "morada", "nacionalidade", "email", "telemovel");
    public $timestamps = true;
    

    public function anos()
    {
        return $this->belongsToMany('App\Ano', 'aluno_ano')->withTimestamps();
    }
    

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina', 'aluno_disciplina')->withTimestamps();
    }
}

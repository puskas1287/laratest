<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = ['user_id','materia_id','aula_id','turno_id','fecha_solicitada','data_id','cpu','teclado','mouse','parlantes','lector'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }
    public function aula(){
        return  $this->belongsTo('App\Aula');
    }
    public function turno(){
        return  $this->belongsTo('App\Turno');
    }
    public function data(){
        return  $this->belongsTo('App\Data');
    }
}

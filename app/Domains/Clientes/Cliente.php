<?php

namespace App\Domains\Clientes;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Produtos\Produto;

class Cliente extends Model
{

  protected $table = 'clientes';

  /*public function produto(){
    return $this->belongsTo(Produto::class, 'cliente', 'id');
  }*/
  protected $fillable = array('nome', 'sobrenome', 'status', 'telefone', 'email', 'cidade', 'estado', 'cep', 'cpf', 'cnpj', 'razao', 'bairro', 'numero');
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
        'cpf',
        'email',
        'password'
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    public function pedidos()
    {
        //return $this->hasmany(Pedido::class);
    }
}

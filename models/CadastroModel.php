<?php

namespace app\models;

use yii\base\Model;

class CadastroModel extends Model
{
    public $nome;
    public $email;
    public $conselho;
    public $numero_conselho;
    public $nascimento;
    public $ativo;

    public function rules()
    {
        return [
            [['nome', 'email', 'conselho', 'numero_conselho', 'nascimento', 'ativo'], 'required'],
            ['email', 'email'],
            ['conselho', 'in', 'range' => ['CRM', 'CRO', 'CRN', 'COREN']],
            ['numero_conselho', 'string', 'max' => 20],
            ['nascimento', 'date', 'format' => 'php:Y-m-d'],
            ['nome', 'string', 'max' => 255],
            ['ativo', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nome' => 'Nome Completo',
            'email' => 'Email',
            'conselho' => 'Conselho',
            'numero_conselho' => 'Número do Conselho',
            'nascimento' => 'Data de Nascimento',
            'ativo' => 'Ativo',
        ];
    }
}

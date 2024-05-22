<?php

namespace app\models;

use yii\base\Model;

class CadastroModel extends Model
{
    public $id;
    public $nome;
    public $email;
    public $conselho;

    public function rules()
    {
        return [
            [['id', 'nome', 'email','conselho'], 'required'],
            ['id', 'integer'],
            ['email', 'email'],
            ['conselho', 'string', 'max' => 5],
            ['nome', 'string', 'max' => 255]
        ];
    }
    public function attributeLabels(){
        return[
            'id' => 'ID',
            'nome' => 'Name completo',
            'email' => 'Email',
            'conselho' => 'Conselho'
        ];
    }
}
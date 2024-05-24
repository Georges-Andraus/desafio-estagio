<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Profissional extends ActiveRecord
{
    public static function tableName()
    {
        return 'cadastro.profissional';
    }

    public function rules()
    {
        return [
            [['nome', 'email', 'conselho', 'numero_conselho', 'nascimento'], 'required'],
            ['email', 'email'],
            ['conselho', 'string', 'max' => 5],
            ['numero_conselho', 'string', 'max' => 20],
            ['nascimento', 'date', 'format' => 'php:Y-m-d'],
            ['nome', 'string', 'max' => 255],
            ['status', 'in', 'range' => [0, 1]], // 0 for inactive, 1 for active
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
            'status' => 'Status',
        ];
    }
}

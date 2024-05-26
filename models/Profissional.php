<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Profissional extends ActiveRecord
{
    public static function tableName()
    {
        return 'profissional';
    }

    public function rules()
    {
        return [
            [['nome', 'email', 'conselho', 'numero_conselho', 'nascimento'], 'required'],
            ['email', 'email'],
            ['conselho', 'in', 'range' => ['CRM', 'CRO', 'CRN', 'COREN']],
            ['numero_conselho', 'string', 'max' => 20],
            ['nascimento', 'date', 'format' => 'php:Y-m-d'],
            ['nome', 'string', 'max' => 255],
            ['status', 'in', 'range' => [0, 1]],
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

    public function getClinicas()
    {
        return $this->hasMany(Clinica::className(), ['id' => 'clinica_id'])
            ->viaTable('profissional_clinica', ['profissional_id' => 'id']);
    }
}

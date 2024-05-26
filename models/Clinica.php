<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Clinica extends ActiveRecord
{
    public static function tableName()
    {
        return 'clinica';
    }

    public function rules()
    {
        return [
            [['nome', 'cnpj',], 'required'],
            [['nome'], 'string', 'max' => 255],
            [['cnpj'], 'string', 'max' => 18], // Assuming Brazilian CNPJ format
            [['cnpj'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'cnpj' => 'CNPJ',
        ];
    }

    public function getProfissionais()
    {
        return $this->hasMany(Profissional::className(), ['id' => 'profissional_id'])
            ->viaTable('profissional_clinica', ['clinica_id' => 'id']);
    }
}
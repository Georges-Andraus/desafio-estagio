<?php

namespace app\models;

use yii\db\ActiveRecord;

class CadastroModel extends ActiveRecord
{
    public $id;
    public $nome;
    public $email; // Adicione esta linha
    public $conselho;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        // Define o nome da tabela no banco de dados associada a este modelo
        return 'profissional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'email', 'conselho'], 'required'],
            ['id', 'integer'],
            ['email', 'email'],
            ['conselho', 'string', 'max' => 5],
            ['nome', 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome completo',
            'email' => 'Email',
            'conselho' => 'Conselho'
        ];
    }
}

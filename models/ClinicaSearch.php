<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clinica;

/**
 * ClinicaSearch representa o modelo por trás do formulário de pesquisa de `app\models\Clinica`.
 */
class ClinicaSearch extends Clinica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome', 'cnpj'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // Ignora a implementação do scenarios() na classe pai
        return Model::scenarios();
    }

    /**
     * Cria uma instância do provedor de dados com a consulta de pesquisa aplicada
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Clinica::find();

        // Adiciona as condições que devem ser aplicadas sempre aqui

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // Descomente a linha seguinte se você não deseja retornar nenhum registro quando a validação falhar
            // $query->where('0=1');
            return $dataProvider;
        }

        // Condições de filtragem da grade
        $query->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cnpj', $this->cnpj]);

        return $dataProvider;
    }
}

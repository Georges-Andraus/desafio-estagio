<?php

namespace app\controllers;

use app\models\CadastroModel;
use app\models\Profissional;
use Yii;
use yii\web\Controller;

class CadastroController extends Controller
{
    public function actionCadastrar()
    {
        $cadastroModel = new CadastroModel();
        if ($cadastroModel->load(Yii::$app->request->post()) && $cadastroModel->validate()) {
            $profissional = new Profissional();
            $profissional->nome = $cadastroModel->nome;
            $profissional->email = $cadastroModel->email;
            $profissional->conselho = $cadastroModel->conselho;
            $profissional->numero_conselho = $cadastroModel->numero_conselho;
            $profissional->nascimento = $cadastroModel->nascimento;
            $profissional->status = $cadastroModel->status;

            if ($profissional->save()) {
                return $this->redirect(['confirmacao-cadastrar', 'model' => $cadastroModel]);
            }
        }
        return $this->render('cadastrar', ['model' => $cadastroModel]);
    }

    public function actionProfissional()
    {
        $profissionais = Profissional::find()->orderBy('id')->all();
        foreach ($profissionais as $profissional) {
            echo '<pre>';
            print_r($profissional->attributes);
            echo '</pre>';
        }
    }
}

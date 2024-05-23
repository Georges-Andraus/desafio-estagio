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
        $cadastroModel = new CadastroModel;
        $post = Yii::$app->request->post();

        if ($cadastroModel->load($post) && $cadastroModel->validate()) {
            // Salvando os dados no banco de dados
            if ($cadastroModel->save()) {
                Yii::$app->session->setFlash('success', 'Profissional cadastrado com sucesso!');
                return $this->redirect(['site/index']); // Redireciona para a página inicial ou outra página de sua escolha
            } else {
                Yii::$app->session->setFlash('error', 'Ocorreu um erro ao cadastrar o profissional.');
            }
        }

        return $this->render('cadastrar', ['model' => $cadastroModel]);
    }
    public function actionProfissional()
    {
        $profissional = Profissional::find()->orderBy('id')->all();
        echo '<pre>' ; print_r($profissional);
    }
}
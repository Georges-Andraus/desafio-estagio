<?php

namespace app\controllers;

use app\models\CadastroModel;
use Yii;
use yii\web\Controller;

class CadastroController extends Controller
{

    public function actionCadastrar()
    {
        $cadastroModel = new CadastroModel;
        $post = Yii::$app->request->post();
        if($cadastroModel->load($post) && $cadastroModel->validate()){
            return $this->render('confirmacao-cadastrar', [ 'model' => $cadastroModel]);
        }
        else{
            return $this->render('cadastrar', [
                'model' => $cadastroModel
            ]);
        }

    }
}
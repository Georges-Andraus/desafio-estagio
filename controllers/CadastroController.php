<?php

namespace app\controllers;

use app\models\CadastroModel;
use yii\web\Controller;

class CadastroController extends Controller
{

    public function actionCadastrar()
    {
        $cadastroModel = new CadastroModel;
        return $this->render('cadastrar', [
            'model' => $cadastroModel
        ]);
    }
}
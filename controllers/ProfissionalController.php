<?php

namespace app\controllers;

use app\models\Profissional;
use app\models\ProfissionalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\Clinica;

/**
 * ProfissionalController implements the CRUD actions for Profissional model.
 */
class ProfissionalController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Profissional models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfissionalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profissional model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profissional model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profissional();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->status = $this->request->post('Profissional')['status'];
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            // Verifica se as clínicas foram selecionadas no formulário
            $clinicasSelecionadas = $this->request->post('Profissional')['clinicas'];

            // Limpa todas as relações existentes com clínicas
            $model->unlinkAll('clinicas', true);

            // Adiciona as novas relações com as clínicas selecionadas
            foreach ($clinicasSelecionadas as $clinicaId) {
                $clinica = \app\models\Clinica::findOne($clinicaId);
                if ($clinica) {
                    $model->link('clinicas', $clinica);
                }
            }

            // Salva o modelo de profissional
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Profissional model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profissional model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Profissional the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profissional::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDeleteClinica($id, $clinica_id)
    {
        $profissional = $this->findModel($id);
        $clinica = \app\models\Clinica::findOne($clinica_id);

        if ($profissional && $clinica) {
            $profissional->unlink('clinicas', $clinica, true);
        }

        return $this->redirect(['view', 'id' => $id]);
    }
}
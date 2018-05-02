<?php

namespace frontend\controllers;

use common\components\Authenticator;
use common\components\Constants;
use Yii;
use app\models\Uprawnienia;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UprawnieniaController implements the CRUD actions for Uprawnienia model.
 */
class UprawnieniaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only' => ['index','create','update','view'],
                'rules' =>[
                    [
                        'allow'=>true,
                        'matchCallback'=>function($rule,$action){
                            return Authenticator::checkIfRola(Constants::ADMIN_ID);
                        }
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Uprawnienia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Uprawnienia::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Uprawnienia model.
     * @param integer $konto_id
     * @param integer $podkategoria_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($konto_id, $podkategoria_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($konto_id, $podkategoria_id),
        ]);
    }

    /**
     * Creates a new Uprawnienia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Uprawnienia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'konto_id' => $model->konto_id, 'podkategoria_id' => $model->podkategoria_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Uprawnienia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $konto_id
     * @param integer $podkategoria_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($konto_id, $podkategoria_id)
    {
        $model = $this->findModel($konto_id, $podkategoria_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'konto_id' => $model->konto_id, 'podkategoria_id' => $model->podkategoria_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Uprawnienia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $konto_id
     * @param integer $podkategoria_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($konto_id, $podkategoria_id)
    {
        $this->findModel($konto_id, $podkategoria_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Uprawnienia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $konto_id
     * @param integer $podkategoria_id
     * @return Uprawnienia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($konto_id, $podkategoria_id)
    {
        if (($model = Uprawnienia::findOne(['konto_id' => $konto_id, 'podkategoria_id' => $podkategoria_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

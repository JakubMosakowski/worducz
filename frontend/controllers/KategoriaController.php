<?php

namespace frontend\controllers;

use Yii;
use app\models\Kategoria;
use app\models\KategoriaSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KategoriaController implements the CRUD actions for Kategoria model.
 */
class KategoriaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kategoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KategoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kategoria model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kategoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kategoria();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post()) ) {
            $model->obrazek = UploadedFile::getInstance($model, 'obrazek');
            $image_name = $model->nazwa . rand(1, 4000) . '.' . $model->obrazek->getExtension();
            $image_path = 'uploads/kategorie/' . $image_name;
            $model->obrazek->saveAs($image_path);
            $model->obrazek = $image_path;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kategoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->obrazek = UploadedFile::getInstance($model, 'obrazek');
            if (null !== $model->obrazek) {
                $image_name = $model->nazwa . rand(1, 4000) . '.' . $model->obrazek->getExtension();
                $image_path = 'uploads/kategorie/' . $image_name;
                $model->obrazek->saveAs($image_path);
                $model->obrazek = $image_path;
                $model->save();
            } else {
                $model->obrazek = $this->findModel($id)->obrazek;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kategoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kategoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kategoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kategoria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

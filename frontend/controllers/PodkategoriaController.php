<?php

namespace frontend\controllers;

use common\components\Authenticator;
use common\components\Constants;
use common\components\ImageUploader;
use Yii;
use app\models\Podkategoria;
use app\models\PodkategoriaSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Kategoria;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * PodkategoriaController implements the CRUD actions for Podkategoria model.
 */
class PodkategoriaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only' => ['index','create','update'],
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
     * Lists all Podkategoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PodkategoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Podkategoria model.
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
     * Creates a new Podkategoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Podkategoria();
        $model->scenario = 'create';
        $kategorie = Kategoria::find()
            ->orderBy('nazwa')
            ->all();
        $kategorie = ArrayHelper::map($kategorie, 'id', 'nazwa');
        if ($model->load(Yii::$app->request->post())) {
            $model->obrazek = UploadedFile::getInstance($model, 'obrazek');
            $imageUploader=new ImageUploader();
            $imageUploader->saveImageToBase($model, 'kategorie');
            $searchModel = new PodkategoriaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
            'kategorie' => $kategorie,
        ]);
    }

    /**
     * Updates an existing Podkategoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $kategorie = Kategoria::find()
            ->orderBy('nazwa')
            ->all();
        $kategorie = ArrayHelper::map($kategorie, 'id', 'nazwa');
        if ($model->load(Yii::$app->request->post())) {
            $model->obrazek = UploadedFile::getInstance($model, 'obrazek');
            if (null !== $model->obrazek) {
                $imageUploader=new ImageUploader();
                $imageUploader->saveImageToBase($model, 'podkategorie');
            } else {
                $model->obrazek = $this->findModel($id)->obrazek;
                $model->save();
            }
            $searchModel = new PodkategoriaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }


        return $this->render('update', [
            'model' => $model,
            'kategorie' => $kategorie,
        ]);
    }

    /**
     * Deletes an existing Podkategoria model.
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
     * Finds the Podkategoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Podkategoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Podkategoria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

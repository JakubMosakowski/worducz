<?php

namespace frontend\controllers;

use app\models\Podkategoria;
use app\models\Uprawnienia;
use app\models\Wynik;
use app\models\Zestaw;
use app\models\ZestawSearch;
use common\components\Authenticator;
use common\components\Constants;
use common\components\SqlQueryGenerator;
use common\components\StringConverter;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ZestawController implements the CRUD actions for Zestaw model.
 */
class ZestawController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' =>
                [
                    'class' => AccessControl::className(),
                    'only' => ['user-zestaw'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['user-zestaw'],
                            'roles' => ['@'],
                        ],
                    ]
                ],
            [
                'class' => AccessControl::className(),
                'only' => ['index', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return Authenticator::checkIfRola(Constants::ADMIN_ID) ||
                                Authenticator::checkIfRola(Constants::REDAKTOR_ID) ||
                                Authenticator::checkIfRola(Constants::SUPER_REDAKTOR_ID);
                        }
                    ],
                ]
            ],
            [
                'class' => AccessControl::className(),
                'only' => ['update'],
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if (Authenticator::checkIfRola(Constants::ADMIN_ID) ||
                                Authenticator::checkIfAuthor())
                                return true;

                            if (Authenticator::checkIfRola(Constants::SUPER_REDAKTOR_ID) &&
                                Authenticator::checkIfHasPermission())
                                return true;

                            return false;
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
     * Lists all Zestaw models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ZestawSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Zestaw model.
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

    public function actionUserZestaw()
    {
        $model = new Zestaw();
        $podkategorie = Podkategoria::find()
            ->orderBy('nazwa')
            ->all();
        $podkategorie = ArrayHelper::map($podkategorie, 'id', 'nazwa');

        if ($model->load(Yii::$app->request->post())) {
            $model->data_dodania = date('y-m-d h:m:s');
            $model->prywatne = true;
            $this->setZestawValues($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('userZestaw', [
            'model' => $model,
            'podkategorie' => $podkategorie,
        ]);
    }

    /**
     * Creates a new Zestaw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zestaw();
        if (Authenticator::checkIfRola(Constants::ADMIN_ID)) {
            $podkategorie = Podkategoria::find()
                ->orderBy('nazwa')
                ->all();
        } else {
            $podkategorie = SqlQueryGenerator::getUprawnionePodkategorie();
        }
        $podkategorie = ArrayHelper::map($podkategorie, 'id', 'nazwa');

        if ($model->load(Yii::$app->request->post())) {
            $model->data_dodania = date('y-m-d h:m:s');
            $model->prywatne = 0;
            $this->setZestawValues($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'podkategorie' => $podkategorie,
        ]);
    }

    public function actionLang1Lang2($id)
    {
        return $this->render('lang1-lang2', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionLang2Lang1($id)
    {
        return $this->render('lang2-lang1', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionMix($id)
    {
        return $this->render('mix', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionTrybNauki($id)
    {
        return $this->render('trybNauki', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionTrybSprawdzania($id)
    {
        return $this->render('trybSprawdzania', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Updates an existing Zestaw model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $podkategorie = Podkategoria::find()
            ->orderBy('nazwa')
            ->all();
        $podkategorie = ArrayHelper::map($podkategorie, 'id', 'nazwa');


        if ($model->load(Yii::$app->request->post())) {
            $this->setZestawValues($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'podkategorie' => $podkategorie,
        ]);
    }


    /**
     * Deletes an existing Zestaw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Authenticator::checkIfAuthor() ||
            Authenticator::checkIfRola(Constants::ADMIN_ID)) {
            $this->removeWyniksAndZestaws($id);
        } else if (Authenticator::checkIfHasPermission() &&
            Authenticator::checkIfRola(Constants::SUPER_REDAKTOR_ID))
            $this->removeWyniksAndZestaws($id);

        return $this->redirect(['index']);

    }

    private function removeWyniksAndZestaws($id)
    {
        $zestaw = Zestaw::findOne($id);
        $wyniki = $zestaw->wyniks;
        foreach ($wyniki as &$wynik) {
            $wynik->delete();
        }
        $this->findModel($id)->delete();
    }

    /**
     * Finds the Zestaw model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zestaw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zestaw::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $model
     */
    public function setZestawValues($model)
    {
        $model->konto_id = Yii::$app->user->id;
        $model->jezyk1_id = 1;
        $model->jezyk2_id = 2;
        $strc = new StringConverter();
        $model->ilosc_slowek = $strc->countWords($model->zestaw);
        $model->data_edycji = date('y-m-d h:m:s');
        $model->save();
    }
}

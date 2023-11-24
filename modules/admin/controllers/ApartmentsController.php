<?php

namespace app\modules\admin\controllers;

use app\models\apartments;
use app\modules\admin\models\ApartmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ApartmentsController implements the CRUD actions for apartments model.
 */
class ApartmentsController extends Controller
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
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ]
    
                    ]
                ]
            ]
        );
    }

    /**
     * Lists all apartments models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ApartmentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single apartments model.
     * @param int $id
     * @param int $lodger
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $lodger)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $lodger),
        ]);
    }

    /**
     * Creates a new apartments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new apartments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'lodger' => $model->lodger]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing apartments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @param int $lodger
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $lodger)
    {
        $model = $this->findModel($id, $lodger);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'lodger' => $model->lodger]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing apartments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @param int $lodger
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $lodger)
    {
        $this->findModel($id, $lodger)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the apartments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @param int $lodger
     * @return apartments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $lodger)
    {
        if (($model = apartments::findOne(['id' => $id, 'lodger' => $lodger])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

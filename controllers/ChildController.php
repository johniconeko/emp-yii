<?php

namespace app\controllers;

use app\models\Child;
use app\models\Family;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChildController implements the CRUD actions for Child model.
 */
class ChildController extends Controller
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
     * Lists all Child models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Child::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'CHILD_ID' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Child model.
     * @param int $CHILD_ID Child ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CHILD_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($CHILD_ID),
        ]);
    }

    /**
     * Creates a new Child model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($PARENT_ID)
    {
        $model = new Child();
        $family = new Family();
        

        if ($this->request->isPost) {
     
            if ($model->load($this->request->post()) && $model->save()) {

                $family->PARENT_ID = $PARENT_ID;
                $family->CHILD_ID = $model->CHILD_ID;
                $family->save();
                return $this->redirect(['..\employee\view', 'EMP_ID' => $PARENT_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Child model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $CHILD_ID Child ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CHILD_ID, $PARENT_ID)
    {
        $model = $this->findModel($CHILD_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['..\employee\view', 'EMP_ID' => $PARENT_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Child model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $CHILD_ID Child ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CHILD_ID, $PARENT_ID)
    {
        $this->findModel($CHILD_ID)->delete();

        return $this->redirect(['..\employee\view', 'EMP_ID'=>$PARENT_ID]);
    }

    /**
     * Finds the Child model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $CHILD_ID Child ID
     * @return Child the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CHILD_ID)
    {
        if (($model = Child::findOne(['CHILD_ID' => $CHILD_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

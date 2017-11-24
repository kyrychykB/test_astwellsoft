<?php

namespace app\modules\admin\controllers;

use app\models\Shop;
use Yii;
use app\models\Work;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkController implements the CRUD actions for Work model.
 */
class WorkController extends Controller
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
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Work models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Work::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Work model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Work model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Work();
        $status_list = Work::getStatusList();
        $shop_list = Shop::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    "Edit successful!"
                );
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash(
                    'error',
                    "Saving error"
                );
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'status_list' => $status_list,
                'shop_list' => $shop_list,
            ]);
        }
    }

    /**
     * Updates an existing Work model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $status_list = Work::getStatusList();
        $shop_list = Shop::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    "Edit successful!"
                );
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash(
                    'error',
                    "Saving error"
                );
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'status_list' => $status_list,
                'shop_list' => $shop_list,
            ]);
        }
    }

    /**
     * Deletes an existing Work model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash(
                'success',
                "Entity deleted!"
            );
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash(
                'error',
                "An error occurred while removing"
            );
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Finds the Work model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Work the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Work::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

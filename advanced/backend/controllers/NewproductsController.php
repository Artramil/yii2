<?php
namespace backend\controllers;
use Yii;
use backend\models\NewproductsForm;
use common\models\Newproducts;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
class NewproductsController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($true, $action){
                    Echo ('У вас нет доступа к этой странице');
                    // return $this->render('home');
                },
                'rules' => [
                    [
                        'actions' => ['login', 'index', 'create', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['login', 'index'],
                        'allow' => true,
                        'roles' => ['adManager'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Newproducts::find(),
        ]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    public function actionCreate()
    {
        $model = new NewproductsForm();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost)
        {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!$model->upload()) {
                $model->urlImage='../../uploads/noFoto.png';
            }
                $newproducts = new Newproducts();
                $newproducts->name = $model->name;
                $newproducts->description = $model->description;
                $newproducts->urlImage = $model->urlImage;
                $newproducts->save();
                $this->redirect(['newproducts/index']);
            
        } else {
            return $this->render('create', ['model'=>$model]);
        }
    }
    public function actionDelete($id){
        $newproducts=Newproducts::findOne($id);
        if ($newproducts->urlImage!='../../uploads/noFoto.png') unlink($newproducts->urlImage);
        $newproducts->delete();
        $this->redirect(['newproducts/index']);
    }
    public function actionEdit($id){
        //$discaunt= Discaunt::find()->all();
        $newproducts=Newproducts::findOne($id);
        $model=new NewproductsForm;
        $model->name = $newproducts->name;
        $model->description = $newproducts->description;

        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()){
                if ($newproducts->urlImage!='../../uploads/noFoto.png') unlink($newproducts->urlImage);
                $newproducts->urlImage = $model->urlImage;
            }
            $newproducts->name = $model->name;
            $newproducts->description = $model->description;
            $newproducts->urlImage = $model->urlImage;
            $newproducts->save();
            $this->redirect(['newproducts/index']);
        } else {
            return $this->render('edite', ['model'=>$model]);
        }

        
    }
}

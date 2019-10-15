<?php
namespace backend\controllers;
use Yii;
use backend\models\ProductsForm;
use yii\filters\VerbFilter;
use common\models\Products;
use common\models\Discaunt;
use common\models\Category;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
class ProductsController extends \yii\web\Controller
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
        $model=Products::find()
        ->joinWith('category')
        ->joinWith('discaunt');
        // var_dump($model);
        $dataProvider = new ActiveDataProvider(['query' => $model]);
        
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Products::find(),
        // ]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    
    public function actionCreate()
    {
        $discaunt= Discaunt::find()->all();
        $category = Category::find()->all();
        $model = new ProductsForm();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost)
        {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!$model->upload()) {
                $model->imgUrl='../../uploads/noFoto.png';
            }
            $product = new Products();
            $product->name = $model->name;
            $product->price = $model->price;
            $product->description = $model->description;
            $product->idCategori = Yii::$app->request->post('Select_Category');
            $product->imgUrl = $model->imgUrl;
            $product->id_discount=Yii::$app->request->post('Select_Discount');
            $product->count='0';
            $product->save();
            $this->redirect(['products/index']);
        } else {
            return $this->render('create', ['model'=>$model, 'category'=>$category, 'discaunt'=>$discaunt]);
        }
    }
    public function actionDelete($id){
        $product=Products::findOne($id);
        if ($product->imgUrl!='../../uploads/noFoto.png') unlink($product->imgUrl);
        $product->delete();
        $this->redirect(['products/index']);
    }
    public function actionEdit($id){
        $discaunt= Discaunt::find()->all();
        $category=Category::find()->all();
        $product=Products::findOne($id);
        $model=new ProductsForm;
        $model->name = $product->name;
        $model->price = $product->price;
        $model->description = $product->description;
        $model->idCategori = $product->idCategori;
        $model->id_discount = $product->id_discount;
        $model->count = $product->count;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()){
                if ($product->imgUrl!='../../uploads/noFoto.png') unlink($product->imgUrl);
                $product->imgUrl = $model->imgUrl;
            }
            $product->name = $model->name;
            $product->price = $model->price;
            $product->description = $model->description;
            $product->idCategori = Yii::$app->request->post('Select_Category');
            $product->id_discount='0';
            $product->count='0';
            $product->save();
            $this->redirect(['products/index']);
        } else {
            return $this->render('edite', ['model'=>$model, 'category'=>$category, 'discaunt'=>$discaunt]);
        }
    }
}

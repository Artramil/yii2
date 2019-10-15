<?php

namespace backend\controllers;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use Yii;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model=User::find()
        ->joinWith('auth_assignment');
        $dataProvider = new ActiveDataProvider(['query' => $model]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    public function actionDelete($id){
        $auth = Yii::$app->authManager;
        $auth->revokeAll($id);
        $user=User::findOne($id);
        $user->delete();
        $this->redirect(['user/index']);
    }

    public function actionEdit($id)
    {
        $model = User::findOne($id);
        $role=Yii::$app->authManager->getRoles();

        if (Yii::$app->request->isPost) {
            $role=Yii::$app->request->post('Select_Role');
            $auth = Yii::$app->authManager;
            $auth->revokeAll($id);
            $adminRole=$auth->getRole($role);
            $auth->assign($adminRole, $id);

            return $this->redirect(['index']);

        }
        return $this->render('edit', ['model'=>$model, 'role'=>$role]);
    }

}

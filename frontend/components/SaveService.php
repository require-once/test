<?php

namespace frontend\components;

use yii\base\Component;
use yii\helpers\ArrayHelper;
use Yii;

class SaveService extends Component {
    /**
     * @return bool
     */
    public function saveData($data) {
        $data = json_decode($data);
        $data = ArrayHelper::toArray($data);

        $result = Yii::$app->db->createCommand("CALL sp_SaveData(@res, :quantity, :email, :fio);")
          ->bindValue(':quantity', $data['quantity'])
          ->bindValue(':email', $data['email'])
          ->bindValue(':fio', $data['fio'])
          ->execute();
        $res = Yii::$app->db->createCommand("SELECT @res")->queryScalar();

        return (boolean) $res;
    }
}

<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * @property int $quantity
 * @property string $email
 * @property string $fio
 */
class Test extends ActiveRecord {
    public static function tableName() {
        return '{{test}}';
    }

    public function rules() {
        return [
            [['quantity', 'email', 'fio'], 'required'],
            [['quantity'], 'integer', 'min' => 1, 'max' => 10],
            [['email'], 'email'],
            [['fio'], 'match', 'pattern' => '/^[a-zA-Z]+$/'],
        ];
    }

    public function send() {
        $data = json_encode($this->attributes);
        $result = Yii::$app->saveService->saveData($data);

        if ($result) return 'true';
        return 'false';
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensagem".
 *
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $website
 * @property string $mensagem
 */
class Mensagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mensagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'website', 'mensagem'], 'required'],
            [['mensagem'], 'string'],
            [['nome', 'email', 'website'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'website' => 'Website',
            'mensagem' => 'Mensagem',
        ];
    }
}

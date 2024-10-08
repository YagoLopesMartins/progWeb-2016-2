<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogada".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_partida
 * @property string $data_hora
 *
 * @property Partida $idPartida
 * @property User $idUser
 */
class Jogada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jogada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_partida', 'data_hora'], 'required'],
            [['id_user', 'id_partida'], 'integer'],
            [['data_hora'], 'safe'],
            [['id_partida'], 'exist', 'skipOnError' => true, 'targetClass' => Partida::className(), 'targetAttribute' => ['id_partida' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_partida' => 'Id Partida',
            'data_hora' => 'Data Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPartida()
    {
        return $this->hasOne(Partida::className(), ['id' => 'id_partida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}

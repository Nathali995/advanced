<?php

namespace backend\modules\auth\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $contenido
 * @property integer $creado_by
 * @property integer $publicar
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'contenido', 'creado_by', 'publicar'], 'required'],
            [['creado_by', 'publicar'], 'integer'],
            [['titulo'], 'string', 'max' => 50],
            [['contenido'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'creado_by' => 'Creado By',
            'publicar' => 'Publicar',
        ];
    }
}

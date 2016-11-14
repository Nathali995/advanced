<?php

namespace backend\modules\auth\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\auth\models\Post;

/**
 * SearchPost represents the model behind the search form about `backend\modules\auth\models\Post`.
 */
class SearchPost extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'creado_by', 'publicar'], 'integer'],
            [['titulo', 'contenido'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'creado_by' => $this->creado_by,
            'publicar' => $this->publicar,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'contenido', $this->contenido]);

        return $dataProvider;
    }
}

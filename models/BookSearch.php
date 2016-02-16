<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
//use App\models\Book;
use app\models\Book;

/**
 * PersonSearch represents the model behind the search form about `common\models\Person`.
 */
class BookSearch extends Book
{
    public $q;
    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'date_book','q'], 'safe'],
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
      $query = Book::find()->orderBy(['id'=>SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'status' => $this->status,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ]);

        // $query->orFilterWhere(['like', 'username', $this->q])
        //     ->orFilterWhere(['like', 'email', $this->q]);
        $query->orFilterWhere(['like', 'title', $this->q])
            ->orFilterWhere(['like', 'date_book', $this->q]);

        return $dataProvider;

    }
}

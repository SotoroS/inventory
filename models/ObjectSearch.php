<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Object;

/**
 * ObjectSearch represents the model behind the search form about `app\models\Object`.
 */
class ObjectSearch extends Object
{
    private $searchEmptyCommand = "@";

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count', 'status_id'], 'integer'],
            [['name', 'inventory_id', 'budget', 'date', 'position', 'description'], 'safe'],
            [['cost'], 'number'],
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
        $query = Object::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status_id' => $this->status_id,
        ]);

        if ($this->date == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['date' => null], ['date' => '']]);
        } else {
            $query->andFilterWhere(['date' => $this->date]);
        }

        if ($this->count == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['count' => null], ['count' => '']]);
        } else {
            $query->andFilterWhere(['count' => $this->count]);
        }

        if ($this->cost == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['cost' => null], ['cost' => '']]);
        } else {
            $query->andFilterWhere(['cost' => $this->cost]);
        }

        if ($this->name == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['name' => null], ['name' => '']]);
        } else {
            $query->andFilterWhere(['like', 'name', $this->name]);
        }

        if ($this->inventory_id == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['inventory_id' => null], ['inventory_id' => '']]);
        } else {
            $query->andFilterWhere(['like', 'inventory_id', $this->inventory_id]);
        }

        if ($this->budget == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['budget' => null], ['budget' => '']]);
        } else {
            $query->andFilterWhere(['like', 'budget', $this->budget]);
        }

        if ($this->position == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['position' => null], ['position' => '']]);
        } else {
            $query->andFilterWhere(['like', 'position', $this->position]);
        }

        if ($this->description == $this->searchEmptyCommand) {
            $query->andWhere(['or', ['description' => null], ['description' => '']]);
        } else {
            $query->andFilterWhere(['like', 'description', $this->description]);
        }

        return $dataProvider;
    }
}

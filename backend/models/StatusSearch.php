<?php

namespace backend\models;

use common\models\PermisosHelpers;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Status;

/**
 * StatusSearch represents the model behind the search form of `backend\models\Status`.
 */
class StatusSearch extends Status
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['value'],'integer'],
            [['descripcion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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

        $esAdmin = PermisosHelpers::requerirMinimoRol('Admin');
        $userId = \Yii::$app->user->identity->id;

        $query = Status::find();

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

        //filtro permisos para cambiar de estado

        if(!$esAdmin){
          if(PermisosHelpers::requerirRol('Profesor')) {
            $perfil = \Yii::$app->user->identity->perfil;
            //Acá definir Los status que se pueden ver
            // a partir de valores que se agregarán en la tabla de la db
            $statusProfesor = Status::find()->where(['like','descripcion','Borrador'])->one()->value;
            $query->andFilterWhere(['<=','value' ,$statusProfesor]);
          }
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}

<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Programa;
use common\models\Status;
use frontend\models\Perfil;
use common\models\PermisosHelpers;
/**
 * ProgramaSearch represents the model behind the search form of `common\models\Programa`.
 */
class GeneralesSearch extends Programa
{
    public $asignatura;
    public $departamento;
    public $perfil;
    public $status;
    public function attributes(){
        return array_merge(parent::attributes(),['user.username','user.perfil.nombre']);
    }

    public function attributeLabels(){
        return array_merge(parent::attributeLabels(),['user.username'=>'nombre de usuario','user.perfil.nombre'=>'nombre de usuario']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','departamento_id', 'status_id', 'year', 'created_by','updated_by'], 'integer'],
            [['perfil','departamento','asignatura','status', 'fundament', 'objetivo_plan',
            'contenido_plan', 'propuesta_met', 'evycond_acreditacion',
            'parcial_rec_promo', 'distr_horaria', 'crono_tentativo', 'actv_extracur',
             'created_at', 'updated_at'], 'safe'],
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

        $query = Programa::find(); //->orderBy('nomenclatura');
        $estadoBorrador = Status::find()->where(['=','descripcion','Borrador'])->one();
        $estadoBiblioteca = Status::find()->where(['=','descripcion','Biblioteca'])->one();
        $query->where('status_id != :stid',['stid' => $estadoBorrador->id]);
        $userId = \Yii::$app->user->identity->id;
        if (PermisosHelpers::requerirRol('Profesor')){
            $query->andFilterWhere(['=','programa.created_by',$userId]);
          //$query->orFilterWhere(['=','status_id',$estadoBiblioteca->id]);
          

        }
        // add conditions that should always apply here
        $query->joinWith(['asignatura']);
        $query->joinWith(['departamentoasignatura']);
        $query->joinWith(['status']);
        $query->joinWith(['perfil']);
        $countQuery = clone $query;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'totalCount' => 30000,
            'pagination' => [
          //      'totalCount'=>$countQuery->count(),
                'pageSize' => 5
            ],
            'sort' => [
                'defaultOrder' => [
                    'year' => SORT_DESC
                ]
            ]
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
            'year' => $this->year,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'fundament', $this->fundament])
            //->andFilterWhere(['like','departamento_id', $this->getAsignatura()->one()->getDepartamento()->one()->nom])
            ->andFilterWhere(['like', '{{%asignatura}}.nomenclatura', $this->asignatura])
            ->andFilterWhere(['like', '{{%departamento}}.nom', $this->departamento])
            ->andFilterWhere(['like', '{{%status}}.descripcion', $this->status])
            ->andFilterWhere(['like', 'objetivo_plan', $this->objetivo_plan])
            ->andFilterWhere(['like', 'contenido_plan', $this->contenido_plan])
            ->andFilterWhere(['like', 'propuesta_met', $this->propuesta_met])
            ->andFilterWhere(['like', 'evycond_acreditacion', $this->evycond_acreditacion])
            ->andFilterWhere(['like', 'parcial_rec_promo', $this->parcial_rec_promo])
            ->andFilterWhere(['like', 'distr_horaria', $this->distr_horaria])
            ->andFilterWhere(['like', 'crono_tentativo', $this->crono_tentativo])
            ->andFilterWhere(['like', 'concat({{%perfil}}.nombre,{{%perfil}}.apellido)', $this->perfil])
            ->andFilterWhere(['like', 'actv_extracur', $this->actv_extracur]);
        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id
 * @property string $sigla
 * @property string $nome
 *
 * @property Aluno[] $alunos
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sigla', 'nome'], 'required', 'message'=>'Este campo é obrigatório'],
            [['id'], 'integer'],
            [['sigla'], 'string', 'max' => 4, 'message'=>'Este campo não pode ultrapassar de 4 caracteres'],
            [['nome'], 'string', 'max' => 50, 'message'=>'Este campo não pode ultrapassar de 50 caracteres']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sigla' => 'Initials',
            'nome' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_curso' => 'id']);
    }
	
	public function afterFind(){
		$this->nome = mb_strtolower($this->nome, 'UTF-8');
	}

	public function beforeSave(){
		$this->nome = strtoupper($this->nome);
	}
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $id
 * @property integer $matricula
 * @property string $nome
 * @property string $sexo
 * @property integer $id_curso
 * @property integer $ano_ingresso
 *
 * @property Curso $idCurso
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['matricula', 'id_curso', 'ano_ingresso', 'nome', 'sexo'],'required','message'=>'Este campo é obrigatório'],
            [['matricula', 'id_curso', 'ano_ingresso'], 'integer', 'message'=>'Este campo deve ser do tipo integer'],
            [['nome'], 'string', 'max' => 200, 'message'=>'Este campo não pode ultrapassar de 200 caracteres'],
            //[['sexo'], 'string', 'max' => 1, 'message'=>'Este campo não pode ultrapassar de 1 caracter'],
			[['matricula'], 'string', 'length' => 8, 'message'=>'Este campo deve possuir 8 caracteres'],
			//[['sexo'], 'in', 'range' => ['M','F'], 'message'=>'Informe M para Masculino ou F para Feminino'] 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matricula' => 'Registration',
            'nome' => 'Name',
            'sexo' => 'Sex',
            'id_curso' => 'Graduation Course',
            'ano_ingresso' => 'Year of Entry',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }

	public function beforeSave($insert){
		$this->nome = strtolower($this->nome);	
	
		return parent::beforeSave($insert);	
	}
	
	public function afterFind(){
		$this->nome = ucwords(strtolower($this->nome));
		
		$this->id_curso = Curso::findOne($this->id_curso)->nome;
		
		if ($this->sexo=='0'){
				$this->sexo = 'Masculino';
		}else
			$this->sexo = 'Feminino';
	}
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $login
 * @property string $senha
 * @property string $nome
 * @property string $email
 * @property string $pagina
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nome', 'login', 'senha', 'email'], 'required', 'message'=>'Este campo é obrigatório'],
            [['id'], 'integer', 'message'=>'Este campo deve ser do tipo integer'],
            [['login'], 'string', 'max' => 20, 'message'=>'Este campo não pode ultrapassar de 20 caracteres'],
            [['senha'], 'string', 'max' => 128, 'message'=>'Este campo não pode ultrapassar de 128 caracteres'],
            [['nome', 'pagina'], 'string', 'max' => 200, 'message'=>'Este campo não pode ultrapassar de 200 caracteres'],
            [['email'], 'string', 'max' => 100, 'message'=>'Este campo não pode ultrapassar de 200 caracteres'],
			['email', 'email', 'message'=>'Informe um email válido. Ex:example@example.com']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'senha' => 'Password',
            'nome' => 'User Name',
            'email' => 'Email',
            'pagina' => 'Web Page',
        ];
    }
}

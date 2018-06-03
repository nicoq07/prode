<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\GruposUsuariosTable|\Cake\ORM\Association\BelongsTo $GruposUsuarios
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config
     *            The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey([
            'id'
        ]);
        
        $this->belongsTo('GruposUsuarios', [
            'foreignKey' => 'grupo_id'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'rol_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator
     *            Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->integer('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table'
        ]);
        
        $validator->scalar('username')
            ->maxLength('username', 45)
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table'
        ]);
        
        $validator->scalar('password')
            ->maxLength('password', 45)
            ->requirePresence('password', 'create')
            ->notEmpty('password');
        
        $validator->scalar('nombre')
            ->maxLength('nombre', 65)
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre')
            ->add('nombre', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table'
        ]);
        
        $validator->scalar('apellido')
            ->maxLength('apellido', 45)
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido')
            ->add('apellido', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table'
        ]);
        
        $validator->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');
        
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules
     *            The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique([
            'username'
        ]));
        $rules->add($rules->isUnique([
            'id'
        ]));
        $rules->add($rules->isUnique([
            'nombre'
        ]));
        $rules->add($rules->isUnique([
            'apellido'
        ]));
        $rules->add($rules->existsIn([
            'rol_id'
        ], 'Roles'));
        
        return $rules;
    }

    public function recoverPassword($id)
    {
        $user = $this->get($id);
        return $user->password;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query->select([
            'id',
            'nombre',
            'apellido',
            'username',
            'password',
            'rol_id',
            'grupo_id'
        ])->where([
            'Users.active' => 1
        ]);
        return $query;
    }
}

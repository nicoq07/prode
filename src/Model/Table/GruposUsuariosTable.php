<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GruposUsuarios Model
 *
 * @method \App\Model\Entity\GruposUsuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\GruposUsuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GruposUsuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GruposUsuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GruposUsuario|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GruposUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GruposUsuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GruposUsuario findOrCreate($search, callable $callback = null, $options = [])
 */
class GruposUsuariosTable extends Table
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
        
        $this->setTable('grupos_usuarios');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');
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
        $validator->integer('id')->allowEmpty('id', 'create');
        
        $validator->scalar('descripcion')
            ->maxLength('descripcion', 45)
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion')
            ->add('descripcion', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table'
        ]);
        
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
            'descripcion'
        ]));
        
        return $rules;
    }
}

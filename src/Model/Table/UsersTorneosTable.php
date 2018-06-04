<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersTorneos Model
 *
 * @property \App\Model\Table\TorneosTable|\Cake\ORM\Association\BelongsTo $Torneos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UsersTorneo get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersTorneo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersTorneo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersTorneo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersTorneo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersTorneo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersTorneo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersTorneo findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTorneosTable extends Table
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
        
        $this->setTable('users_torneos');
        $this->setDisplayField('torneo_id');
        $this->setPrimaryKey([
            'torneo_id',
            'user_id'
        ]);
        
        $this->belongsTo('Torneos', [
            'foreignKey' => 'torneo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn([
            'torneo_id'
        ], 'Torneos'));
        $rules->add($rules->existsIn([
            'user_id'
        ], 'Users'));
        
        return $rules;
    }
}

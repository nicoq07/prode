<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PartidosApuestasUsers Model
 *
 * @property \App\Model\Table\PartidosTable|\Cake\ORM\Association\BelongsTo $Partidos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\PartidosApuestasUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\PartidosApuestasUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PartidosApuestasUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PartidosApuestasUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartidosApuestasUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartidosApuestasUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PartidosApuestasUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PartidosApuestasUser findOrCreate($search, callable $callback = null, $options = [])
 *        
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PartidosApuestasUsersTable extends Table
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
        
        $this->setTable('partidos_apuestas_users');
        $this->setDisplayField('partido_id');
        $this->setPrimaryKey([
            'id'
        ]);
        
        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Partidos', [
            'foreignKey' => 'partido_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
        $validator->integer('goles_local')
            ->requirePresence('goles_local', 'create')
            ->notEmpty('goles_local');
        
        $validator->integer('goles_visitante')
            ->requirePresence('goles_visitante', 'create')
            ->notEmpty('goles_visitante');
        
        $validator->requirePresence('acertado', 'create')->notEmpty('acertado');
        
        $validator->requirePresence('cargado', 'create')->notEmpty('cargado');
        
        $validator->integer('puntaje_obtenido')->allowEmpty('puntaje_obtenido');
        
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
        $rules->add($rules->existsIn([
            'user_id'
        ], 'Users'));
        $rules->add($rules->existsIn([
            'partido_id'
        ], 'Partidos'));
        
        return $rules;
    }
}

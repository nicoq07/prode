<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Partidos Model
 *
 * @property \App\Model\Table\TorneosTable|\Cake\ORM\Association\BelongsTo $Torneos
 * @property \App\Model\Table\TorneosTable|\Cake\ORM\Association\BelongsTo $Equipos
 * @method \App\Model\Entity\Partido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Partido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Partido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Partido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partido|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Partido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Partido findOrCreate($search, callable $callback = null, $options = [])
 *        
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PartidosTable extends Table
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
        
        $this->setTable('partidos');
        $this->setDisplayField('presentacion');
        $this->setPrimaryKey([
            'id'
        ]);
        
        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Equipos', [
            'foreignKey' => 'equipo_id_local'
        ]);
        
        $this->belongsTo('Equipos', [
            'foreignKey' => 'equipo_id_visitante'
        ]);
        
        $this->belongsTo('Equipos', [
            'foreignKey' => 'equipo_id_ganador'
        ]);
        
        $this->belongsTo('Torneos', [
            'foreignKey' => 'torneo_id',
            'joinType' => 'INNER'
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
        
        $validator->integer('equipo_id_local')->requirePresence('equipo_id_local', 'create');
        
        $validator->integer('equipo_id_visitante')->requirePresence('equipo_id_visitante', 'create');
        
        $validator->integer('equipo_id_ganador')->allowEmpty('equipo_id_ganador');
        
        $validator->scalar('fecha')
            ->maxLength('fecha', 40)
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');
        
        $validator->dateTime('dia_partido')
            ->requirePresence('dia_partido', 'create')
            ->notEmpty('dia_partido');
        
        $validator->integer('goles_local')->allowEmpty('goles_local');
        
        $validator->integer('goles_visitante')->allowEmpty('goles_visitante');
        
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
            'id'
        ]));
        $rules->add($rules->existsIn([
            'torneo_id'
        ], 'Torneos'));
        
        $rules->add($rules->isUnique([
            'torneo_id',
            'fecha',
            'equipo_id_local',
            'equipo_id_visitante'
        ], 'Partido ya cargado'));
        
        return $rules;
    }
}

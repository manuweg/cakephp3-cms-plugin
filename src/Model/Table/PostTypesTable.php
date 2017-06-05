<?php
namespace Cms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Categories
 *
 * @method \Cms\Model\Entity\PostType get($primaryKey, $options = [])
 * @method \Cms\Model\Entity\PostType newEntity($data = null, array $options = [])
 * @method \Cms\Model\Entity\PostType[] newEntities(array $data, array $options = [])
 * @method \Cms\Model\Entity\PostType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Cms\Model\Entity\PostType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Cms\Model\Entity\PostType[] patchEntities($entities, array $data, array $options = [])
 * @method \Cms\Model\Entity\PostType findOrCreate($search, callable $callback = null, $options = [])
 */
class PostTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('post_types');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Categories', [
            'foreignKey' => 'post_type_id',
            'className' => 'Cms.Categories'
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'post_type_id',
            'className' => 'Cms.PostTypes'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->requirePresence('metadescription', 'create')
            ->notEmpty('metadescription');

        $validator
            ->requirePresence('metakeywords', 'create')
            ->notEmpty('metakeywords');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['slug']));

        return $rules;
    }
}

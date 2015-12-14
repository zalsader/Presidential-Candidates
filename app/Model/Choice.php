<?php
App::uses('AppModel', 'Model');
/**
 * Client Model
 *
 * @property Account $Account
 * @property Contact $Contact
 * @property SocialLink $SocialLink
 * @property ClientType $ClientType
 * @property ClientCustomerLink $ClientCustomerLink
 */
class Choice extends AppModel {
    
/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array();
    
/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Answer' => array(
            'className' => 'Answer',
            'foreignKey' => 'choice_id',
            'dependent' => true,
            'conditions' => '',
        ),
        'CandidateAnswer' => array(
            'className' => 'CandidateAnswer',
            'foreignKey' => 'choice_id',
            'dependent' => true,
            'conditions' => '',
        ),        
    );

}

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
class CandidateAnswer extends AppModel {
    
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
        'Candidate' => array(
            'className' => 'Candidate',
            'foreignKey' => 'candidate_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Choice' => array(
            'className' => 'Choice',
            'foreignKey' => 'choice_id',
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
    );

}

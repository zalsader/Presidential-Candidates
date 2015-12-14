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
class Candidate extends AppModel {
    
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
        'Survey' => array(
            'className' => 'Survey',
            'foreignKey' => 'survey_id',
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
        'CandidateAnswer' => array(
            'className' => 'CandidateAnswer',
            'foreignKey' => 'candidate_id',
            'dependent' => true,
            'conditions' => '',
        ),
    );

}

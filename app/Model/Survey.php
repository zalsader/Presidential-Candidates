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
class Survey extends AppModel {
    
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
    public $belongsTo = array();

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'survey_id',
            'dependent' => true,
            'conditions' => '',
        ),
        'Candidate' => array(
            'className' => 'Candidate',
            'foreignKey' => 'survey_id',
            'dependent' => true,
            'conditions' => '',
        ),
        'Response' => array(
            'className' => 'Response',
            'foreignKey' => 'survey_id',
            'dependent' => true,
            'conditions' => '',
        ),
    );

}

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
class Answer extends AppModel {
    
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
        'Response' => array(
            'className' => 'Response',
            'foreignKey' => 'response_id',
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

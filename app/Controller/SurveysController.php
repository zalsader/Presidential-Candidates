<?php

App::uses('AppController', 'Controller');

class SurveysController extends AppController {

	public $uses = array('Survey', 'Candidate', 'Question', 'Response', 'Answer', 'CandidateAnswer', 'Choice');
    
    public function show ($tag) {
        if ($this->request->is('post')) {
            
        }
    }
}

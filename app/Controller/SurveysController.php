<?php

App::uses('AppController', 'Controller');

class SurveysController extends AppController {

	public $uses = array('Survey', 'Candidate', 'Question', 'Response', 'Answer', 'CandidateAnswer', 'Choice');
    
    public function show ($tag) {
        $survey = $this->Survey->find('first', array(
            'conditions' => array(
                'Survey.tag' => $tag,
            ),
            'recursive' => 0,
            'fields' => array('*'),
        ));
        $questions = $this->Question->find('all', array(
            'conditions' => array(
                'Question.survey_id' => $survey['Survey']['id'],
            ),
            'recursive' => 1,
            'fields' => array('*'),
            'order' => array('Question.ordinal'),
        ));
        $this->set(compact('survey', 'questions'));
        
    }
    
    public function submit ($tag) {
        if ($this->request->is('post')) {
            $survey = $this->Survey->find('first', array(
                'conditions' => array(
                    'Survey.tag' => $tag,
                ),
                'recursive' => 0,
                'fields' => array('*'),
            ));
            $candidates = $this->Candidate->find('list', array(
                'conditions' => array(
                    'Candidate.survey_id' => $survey['Survey']['id'],
                ),
                'recursive' => 0,
            ));
            $scores = array();
            foreach ($candidates as $id => $candidate) {
                $scores[$id] = 0.0; 
            }
            $totalImportance = 0.0;
            foreach ($this->data['Answer'] as $answer) {
                $candidateAnswers = $this->CandidateAnswer->find('all', array(
                    'conditions' => array(
                        'CandidateAnswer.choice_id' => $answer['choice_id'],
                        'CandidateAnswer.question_id' => $answer['question_id'],
                    ),
                    'recursive' => 0,
                    'fields' => array('*'),
                ));
                foreach($candidateAnswers as $ca) {
                    $scores[$ca['CandidateAnswer']['candidate_id']] += $answer['importance'];
                }
                $totalImportance+= $answer['importance'];
            }
            $max = 0;
            $bestCandidateId = 0;
            $percentages = array();
            foreach($scores as $id => $score) {
                $percentages[$id] = round($score / $totalImportance * 100);
                if ($score > $max) {
                    $max = $score;
                    $bestCandidateId = $id;
                }
            }
            
            $this->set(compact('percentages', 'candidates', 'bestCandidateId'));
        }
    }
}

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
        if ($this->request->is('get')) {
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
        else if ($this->request->is('post')) {
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
            }
            $max = 0;
            $maxId = 0;
            foreach($scores as $id => $score) {
                if ($score > $max) {
                    $max = $score;
                    $maxId = $id;
                }
            }
            echo 'Your best Candidate is: '.$candidates[$maxId];
            exit;
        }
    }
}

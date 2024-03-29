<h1><?php echo $survey['Survey']['name']; ?></h1>
<?php
    echo $this->Form->create('Survey', array('action' => 'submit/'.$survey['Survey']['tag']));
    foreach ($questions as $i => $question):
    echo $this->Form->hidden("Answer.$i.question_id", array(
        'value' => $question['Question']['id'],
    ));
    echo $this->Form->input("Answer.$i.choice_id", array(
        'options' => Hash::combine($question['Choice'], '{n}.id', '{n}.text'),
        'legend' => $question['Question']['text'],
        'type' => 'radio',
    ));
    echo $this->Form->input("Answer.$i.importance", array(
        'type' => 'range',
        'min' => '0.1',
        'max' => '0.9',
        'step' => '0.01',
    ));
    endforeach;
    echo $this->Form->submit();
    echo $this->Form->end(); 
?>
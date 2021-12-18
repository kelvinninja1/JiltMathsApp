<?php
// import the MCQ class
require_once('MCQ.php');

//Import the Instruction class
require_once('Instruction.php');

class MCQs{
 public $level;
 public $questions_count;
 public $questions = [];

    // Create constructor
    public function __construct($level, $questions_count) {
        $this->level = $level;
        $this->questions_count = $questions_count;

        // add instructions to questions
        $this->questions[0] = new Instruction();
        $this->generateMCQs();

    }

    //generate MCQs
    public function generateMCQs(){
        //create an array of MCQs

        for($i = 1; $i <= $this->questions_count; $i++){
            $mcq = new MCQ($i, $this->level);
            $this->questions[$i] = $mcq->getMCQ();
        }
    }

    //get MCQs
    public function getMCQs(): array
    {
        return $this->questions;
    }
}
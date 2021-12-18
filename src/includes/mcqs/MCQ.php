<?php

class MCQ
//    "type": "quiz",
//    "no": "1",
//    "question": "Express 0.000047, correct to 2 significant figures.",
//    "answer": "B",
//    "options": {
//    "A": "0.0",
//      "B": "0.00004",
//      "C": "0.000041",
//      "D": "0.0000407"
//    }
{
    public $level;
    public $type;
    public $no;
    public $question;
    public $answer;
    public $options;

    public function __construct($no, $level)
    {
        $this->no = $no;
        $this->type = "quiz";
        $this->level = $level;
        $this->generateMCQ();
    }

    // Generate Random Math Question (1-10)
    public function generateMCQ()
    {
        $prefix = "What is ";
        $evalString = $this->generateQuestionByLevel();
        $this->question = $prefix . $evalString . "?";
        $this->generate_options($evalString);
    }

    private function generateQuestionByLevel()
    {
        $level = $this->level;
        $difficulty = rand(10, 10*$level);

        if ($level == 6) {
            // Generate Question by random operator
            $operator = rand(1, 4);
            if ($operator == 1) {
                return rand(1, ($difficulty*3)/2) . " + " . rand(1, ($difficulty*3)/2);
            } else if ($operator == 2) {
                return rand(1, ($difficulty)/2) . " - " . rand(1, ($difficulty)/2);
            } else if ($operator == 3) {
                return rand(1, $difficulty/2) . " x " . rand(1, $difficulty/2);
            } else if ($operator == 4) {
                return rand(1, $difficulty) . " / " . rand(1, $difficulty/2);
            }
        } else if ($level == 5) {
            // Generate Question by random operator
            $operator = rand(1, 4);
            if ($operator == 1) {
                return rand(1, ($difficulty*3)/2) . " + " . rand(1, ($difficulty*3)/2);
            } else if ($operator == 2) {
                return rand(1, ($difficulty)/2) . " - " . rand(1, ($difficulty)/2);
            } else if ($operator == 3) {
                return rand(1, $difficulty) . " x " . rand(1, $difficulty);
            } else if ($operator == 4) {
                return rand(1, $difficulty) . " / " . rand(1, $difficulty);
            }

        } else if ($level == 4) {
            // Generate Question by random operator
            $operator = rand(1, 4);
            if ($operator == 1) {
                return rand(1, ($difficulty*3)/2) . " + " . rand(1, ($difficulty*3)/2);
            } else if ($operator == 2) {
                return rand(1, ($difficulty)/2) . " - " . rand(1, ($difficulty*3)/2);
            } else if ($operator == 3) {
                return rand(1, $difficulty) . " x " . rand(1, $difficulty);
            } else if ($operator == 4) {
                return rand(1, $difficulty) . " / " . rand(1, $difficulty);
            }

        } else if ($level == 3) {
            // Generate Question by random operator
            $operator = rand(1, 3);
            if ($operator == 1) {
                return rand(1, ($difficulty*3)/2) . " + " . rand(1, ($difficulty*3)/2);
            } else if ($operator == 2) {
                return rand(1, $difficulty) . " - " . rand(1, $difficulty);
            } else if ($operator == 3) {
                return rand(1, $difficulty) . " x " . rand(1, $difficulty);
            }

        } else if ($level == 2) {
            // Generate Question by random operator
            $operator = rand(1, 2);
            if ($operator == 1) {
                return rand(1, $difficulty) . " + " . rand(1, $difficulty);
            } else if ($operator == 2) {
                return rand(1, $difficulty) . " - " . rand(1, $difficulty);
            }

        } else if ($level == 1) {
            return rand(1, $difficulty) . " + " . rand(1, $difficulty);

        }

        return rand(1, $difficulty) . " + " . rand(1, $difficulty);
    }

    private function generate_options(string $evalString)
    {
        $options = array();

        $evalString = str_replace("x", "*", $evalString);
        $evalString = str_replace(" ", "", $evalString);
        $evalString = str_replace("(", "", $evalString);
        $evalString = str_replace(")", "", $evalString);

        //Evaluate the string
        $eval = eval("return $evalString;");
//        $eval = round($eval, 2);

        $options[0] = $eval;
        $options[1] = $eval + rand(1, 10);
        $options[2] = $eval - rand(1, 10);
        $options[3] = $eval * rand(1, 10);
        $options[4] = $eval / rand(1, 10);

        //Remove the last element of the array if it is not equal to the eval
        $newOptions = $this->remove_last_element($options, $eval);

        // Randomize the from A to D
        $newOptions = array_values($this->remove_last_element($options, $eval));
        shuffle($newOptions);

        $this->options = array(
            "A" => $newOptions[0],
            "B" => $newOptions[1],
            "C" => $newOptions[2],
            "D" => $newOptions[3],
        );

        $this->findAnswer($eval);
    }


    function remove_last_element($array, $element) {
        $array = array_unique($array);
        //if array length is 4 then return the array
        if (count($array) > 4) {
            if ($array[count($array) - 1] != $element) {
                array_pop($array);
            } else {
                shuffle($array);
                $this->remove_last_element($array, $element);
            }
            return $array;
        }
        return $array;
    }

    private function findAnswer(mixed $eval)
    {
        $this->answer = array_search($eval, $this->options);
    }

    public function getMCQ()
    {
        return $this;
    }


}
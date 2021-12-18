<?php

class Instruction
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $note;

    public function __construct()
    {
        $this->type = "instructions";
        $this->note = "Each question is followed by four options lettered A to D. Find the correct option for each question";
    }

    // Get Instruction
    public function getInstruction()
    {
        return $this;
    }

}
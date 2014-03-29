<?php
class SimpleClass
{
    public $var = 'a default value';

    public function displayVar() {
        echo $this->var;
    }
}

$a = new SimpleClass();
$a->displayVar();
echo "\n<br>Memory usage: ".memory_get_usage()." bytes.\n\n";
?>
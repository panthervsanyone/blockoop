<?php

class Napravlenie {
    public $type;

    public function info(){
        return $this->type . "\n";
    }
}

class Course extends Napravlenie{
    public $kakoi;

    public function set_kakoi($kakoi){
        $this->kakoi = $kakoi;
    }

    public function get_kakoi(){
        return $this->kakoi;
    }

    public function info(){
        return parent::info().' Course ' . $this->get_kakoi();
    }
}

class Group extends Course{
    private $number,$countstudents;

    public function set_number($number){
        $this->number = $number;
    }

    public function get_number(){
        return $this->number;
    }

    public function set_countstudents($countstudents){
        $this->countstudents = $countstudents;
    }

    public function get_countstudents(){
        return $this->countstudents;
    }

    public function info() {
        return parent::info().' Группа : '.$this->get_number().' в количестве ' . $this->get_countstudents();
    }
}

$firstexample = new Napravlenie();

$firstexample->type = 'IT';
echo $firstexample->info() . '<br>';

$secondexample = new Course();

$secondexample->type = 'IT';
$secondexample->kakoi = 'PHP';

echo $secondexample->info() . '<br>';

$thirdexample = new Group();
$thirdexample->type = 'IT';
$thirdexample->kakoi = 'PHP';
$thirdexample->set_number('php-12');
$thirdexample->set_countstudents(10);

echo $thirdexample->info();




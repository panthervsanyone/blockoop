<?php

abstract class Ships {
    public $maxsize;
    protected $type,$engine_type;
    private $_color;

    public function __construct($a)
    {
        list($this->type, $this->maxsize, $color) = $a;
            $this->set_color($color);
    }

    public function set_color($color){
        $colors_available = ['blue','yellow','pink','white','grey'];
        if (in_array($color,$colors_available)){
            $this->_color = $color;
            return true;
        }else{
            return false;
        }
    }


    public function yohoho() {
        return
        'Это ' . $this->type. ' судно. '.
        'Размер этой посудины '. $this->maxsize.' метров'.
        ',она '.$this->_color . ' цвета '.
        'у него '. $this->engine_type . ' движок.'.'<br>';
    }

    public function __invoke()
    {
        return print ($this);
    }


}

class Parusnik extends Ships {
    protected $type = "гражданское";
    protected $engine_type = "парусный";
}

class Liners extends Ships {
    protected $type = "круизное";
    protected $engine_type = "винтовой";

}

class Aircraft extends Ships {
    protected $type = "военное";
    protected $engine_type = "атомный";

}

class Cruiser extends Ships {
    protected $type = "военное";
    protected $engine_type = "дизельный";
}

$parus = new Parusnik(["гражданское",147,'blue']);
$liner = new Liners(["круизное",320,'white']);
$carrier = new Aircraft(["оборонительное",150,'yellow']);
$cruiser = new Cruiser(["военное",223,"pink"]);

$ships = [$parus,$liner,$carrier,$cruiser];
foreach ($ships as $value){
    echo $value->yohoho();
}

?>
<?php




interface canRide{
    function ride();
}

abstract class Mototransport implements canRide{
    function ride(){
        echo 'Im riding on my '.strtolower(get_class($this)). '<br>';
        echo $this->additionalInfo();
    }
    abstract protected function additionalInfo();

}
class Motocycle extends Mototransport{
    protected function additionalInfo(){
        return 'Im Hrustik ';
    }
}

class Scooter extends Mototransport{
    protected function additionalInfo(){
        return "";
    }
}

class Quadro extends Mototransport{
    protected function additionalInfo(){
        return "";
    }
}

class Driver{
    public $name, $surname;
    private $riding;

    function ride_something($riding){
        if(!is_object($riding)) return false;
        $this->riding = $riding;
        return $this;
    }

    function info(){
        return $this->name . ' ' . $this->surname . "\n";
    }

    function ride(){
        if(method_exists($this->riding,'ride')
            && is_subclass_of($this->riding,"Mototransport")) {
         $this->riding->ride();
        }else echo 'Nothing to riding' .'<br>';
    }
}

$moto = new Motocycle();
$scooter = new Scooter();
$qadro = new Quadro();

$someperson = new Driver();

$ride = [$moto,$scooter,$qadro];

foreach ($ride as $riding){
    $someperson->ride_something($riding)->ride();

}

?>

<?php

abstract class Car {

    public $capacity, $brand, $model,$year;
    protected $engine_type, $capacity_type;
    private $_color,$_typeofcolors,$_bodytype;

    public function __construct($params){
        list($this->brand, $this->model,$bodytype, $this->year, $color, $typeofcolors, $this->capacity) = $params;
        $this->set_color($color);
        $this->set_typeofcolors($typeofcolors);
        $this->set_bodytype($bodytype);
    }

    public function set_color($color){
        $colors_available = ['red', 'yellow', 'blue', 'green', 'grey', 'black', 'white'];
        if (in_array($color, $colors_available)) {
            $this->_color = $color;
            return true;
        } else {
            return false;
        }
    }

    public function set_typeofcolors($typeofcolors){
        $typecolors_available = ['chrome','metallic','glossy'];
        if (in_array($typeofcolors, $typecolors_available)) {
            $this->_typeofcolors = $typeofcolors;
            return true;
        }else{
            return false;
        }
    }

    public function set_bodytype($bodytype){
        $bodytype_available =['hatchback','sedan','suv','coupe','convertible','vagon','van','jeep'];
        if (in_array($bodytype,$bodytype_available)){
            $this->_bodytype = $bodytype;
            return true;
        }else{
            return false;
        }
    }

    public function info() {
        return
            'We have ' . $this->brand  . ' ' . $this->model .' '. $this->year. ' edition,' .
            'type of body '. $this->_bodytype .' color is ' . $this->_color .' ' .$this->_typeofcolors . ", " .
            "engine type is " . $this->engine_type  . ", " .
            "capacity is " . $this->get_capacity() . "<br>";
    }

    public function get_capacity(){
        return $this->capacity . $this->capacity_type . "\n";
    }

}


class GasolineCar extends Car {

    protected $engine_type = "gasoline";
    protected $capacity_type = "L";

}

class ElectroCar extends Car {

    protected $engine_type = "electro";
    protected $capacity_type = "KW";

}

class HybridCar extends Car {

    protected $engine_type = "hybrid";
    protected $capacity_type = "L + KW";

}

class DieselCar extends Car {

    protected $engine_type = "diesel";
    protected $capacity_type = "L";

}



$boomer = new GasolineCar(array("BMW", "X5","suv",2008,"black","chrome",4));
$audi = new DieselCar(array("Audi", "A8","sedan",2012, "yellow","metallic", 3));
$leafchik = new ElectroCar(array("Nissan", "LEAF","hatchback",2014, "grey","glossy", 16));
$prius = new HybridCar(array("Toyota", "Prius","sedan",2016, "white","chrome",2));

$cars = [$boomer, $leafchik, $prius, $audi];

foreach ($cars as $car) {
    echo $car->info();
}

?>
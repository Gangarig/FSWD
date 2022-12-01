<?php 
class vehicles 
{
    public $name = "asd";
    public $model = "qwe";
    public $makeYear = "2010";
    public $color = "red";
    public $fuel_type = "benzin";
    // function __construct($name_arg,$model_arg)
    // {
    //     $this->name = $name_arg;
    //     $this->model = $model_arg;
    // }
    public function name_model () {
        $result = "Vehicel name--".$this->name."<br> Vehicel model--".$this->model;
        return $result;
    }
}
    $mycar = new vehicles("Ferrari","RX");
    $rtnVAL = $mycar->name_model();
    echo $rtnVAL;

class Ships extends vehicles {
    public $type ="Random";
    public $weight = "XXXXX KG";
    public $height ="XXXXX cm";
    public function details(){
        return 'name -- '.$this->name.'<br>type--'.$this->type.'<br>weight--'.$this->weight.'<br>height--'.$this->height.'<br>model--'.$this->model.'<br>make Year--'.$this->makeYear.'<br>color--'.$this->color.'<br>fuel type--'.$this->fuel_type.'<br>';
    }
}
    $myship = new Ships();
    $val = $myship->details();
    echo $val;

?>
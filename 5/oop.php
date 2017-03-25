<?php
require_once 'traitMove.php';
class car
{
    use property;
    public $direction;
    public $speed;
    public $time;
    public $engine;
    public $name;
    public $broadcast;

    //вкдючаем двигатель
    public function __construct($turn='on')
    {
       $this->engine=$turn;

    }
    //выключаем двигатель в конце
    public function __destruct()
    {
        $this->engine='off';

    }
    

    //рассчитываем сколько проехал автомобиль
    public function move($speed,$time)
    {
        $this->speed=$speed;
        $this->time=$time/60;
        if($speed>=30)
        {
            $this->broadcast=2;
        }
        else
        {
            $this->broadcast=1;
        }

        if($this->engine=='on')
        {
            echo 'скорость авто '.$speed.' км\ч, время поездки '.$time.'мин <br>автомобиль прошел расстояние '.$this->speed* $this->time.' км<br> ';
        }

    }
}
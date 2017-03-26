<?php
 //задаем направление движения
trait property{
    public $type;

    public function direction($direction='forward')
    {
        $this->$direction=$direction;
        if($this->$direction=='forward')
        {
            echo 'Автомобиль движется вперед >>><br>';
        }
        elseif ($this->$direction=='back')
        {
            echo 'Автомобиль движется назад <<<<br>';
        }
    }

    public function typeTransmission($type='manual')
    {
        if($type=='manual')
        {
            echo 'ручная коробка передач, передача '.$this->broadcast.'<br>';
        }
        elseif($type=='automat')
        {
            echo 'автоматическая коробка передач<br>';
        }
        $this->type=$type;
    }
}

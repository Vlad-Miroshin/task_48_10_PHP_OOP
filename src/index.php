<?php

// транспортное средство
interface VehicleInterface {
    public function forward();
    public function reverse();
    public function stop();
}

// транспортное средство, базовый класс
abstract class Vehicle implements VehicleInterface {
    private string $color; // кастомный цвет

    public function __construct($color = "")
    {
        $this->color = $color;
    }    

    // вперёд
    public abstract function forward();
    // назад
    public abstract function reverse();
    // остановиться
    public abstract function stop();


    // активировать ТС
    protected function do_ready() {
        echo static::class."(".$this->color.")";
    }

    // начать движение вперёд
    protected function do_forward() {
        echo "->forward()";
    }

    // начать движение назад
    protected function do_reverse() {
        echo "->reverse()";
    }

    // остановиться
    protected function do_stop() {
        echo "->stop()";
    }

    // подать звуковой сигнал
    protected function do_beep() {
        echo "->beep()";
    }

    // включить дворники
    protected function do_wiper_on() {
        echo "->wiper_on()";
    }

    // выключить дворники
    protected function do_wiper_off() {
        echo "->wiper_off()";
    }
}

// легковой автомобиль
class Car extends Vehicle {

    public function forward() {
        parent::do_ready();
        parent::do_forward();
        parent::do_wiper_on();
        $this->nitros_on();
    }

    public function stop() {
        parent::do_ready();
        $this->nitros_off();
        parent::do_wiper_off();
        parent::do_stop();
    }

    public function reverse() {
        parent::do_ready();
        $this->nitros_off();
        parent::do_reverse();
    }

    // включить закись азота
    private function nitros_on(): void {
        echo "->nitros_on()";
    }

    // выключить закись азота
    private function nitros_off(): void {
        echo "->nitros_off()";
    }
}

// грузовик
class Truck extends Vehicle {

    public function forward() {
        parent::do_ready();
        parent::do_beep();
        parent::do_forward();
    }

    public function stop() {
        parent::do_ready();
        parent::do_stop();
    }

    public function reverse() {
        parent::do_ready();
        parent::do_beep();
        parent::do_reverse();
    }
}


// бульдозер
class Bulldozer extends Vehicle {
    public function forward() {
        parent::do_ready();
        $this->blade_up();
        parent::do_forward();
    }

    public function stop() {
        parent::do_ready();
        parent::do_stop();
        $this->blade_down();
    }

    public function reverse() {
        parent::do_ready();
        $this->blade_up();
        parent::do_reverse();
    }

    // поднять отвал
    private function blade_up(): void {
        echo "->blade_up()";
    }

    // опустить отвал
    private function blade_down(): void {
        echo "->blade_down()";
    }

}

// экскаватор
class Excavator extends Vehicle {
    public function forward() {
        parent::do_ready();
        $this->bucket_up();
        parent::do_forward();
    }

    public function stop() {
        parent::do_ready();
        parent::do_stop();
        $this->bucket_down();
    }

    public function reverse() {
        parent::do_ready();
        $this->bucket_up();
        parent::do_reverse();
    }

    // поднять ковш
    private function bucket_up(): void {
        echo "->bucket_up()";
    }

    // опустить ковш
    private function bucket_down(): void {
        echo "->bucket_down()";
    }

}

// начать движение вперёд
function Forward(Vehicle $vh): void {
    $vh->forward();
}

// начать движение назад
function Reverse(Vehicle $vh): void {
    $vh->reverse();
}

// остановиться
function Stop(Vehicle $vh): void {
    $vh->stop();
}

// ---------------

$car = new Car("White");
$truck = new Truck("Blue");
$bulldozer = new Bulldozer("Orange");
$excavator = new Excavator("Yellow");

// все транспортные средства
$vehicles = [$car, $truck, $bulldozer, $excavator];

// все едут вперёд
foreach ($vehicles as $v) {
    Forward($v);
    echo "\r\n";
}
echo "\r\n";

// все едут назад
foreach ($vehicles as $v) {
    Reverse($v);
    echo "\r\n";
}
echo "\r\n";

// все останавливаются
foreach ($vehicles as $v) {
    Stop($v);
    echo "\r\n";
}

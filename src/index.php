<?php

interface VehicleInterface {
    public function forward();
    public function reverse();
    public function stop();
}

abstract class Vehicle implements VehicleInterface {
    private string $color;

    public function __construct($color = "")
    {
        $this->color = $color;
    }    

    public abstract function forward();
    public abstract function reverse();
    public abstract function stop();


    protected function do_ready() {
        echo static::class."(".$this->color.")";
    }

    protected function do_forward() {
        echo "->forward()";
    }

    protected function do_reverse() {
        echo "->reverse()";
    }

    protected function do_stop() {
        echo "->stop()";
    }

    protected function do_beep() {
        echo "->beep()";
    }
}

class Car extends Vehicle {
    public function forward() {
        parent::do_ready();
        parent::do_forward();
        $this->nitros_on();
    }

    public function stop() {
        parent::do_ready();
        $this->nitros_off();
        parent::do_stop();
    }

    public function reverse() {
        parent::do_ready();
        $this->nitros_off();
        parent::do_reverse();
    }

    private function nitros_on(): void {
        echo "->nitros_on()";
    }

    private function nitros_off(): void {
        echo "->nitros_off()";
    }
}

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

    private function blade_up(): void {
        echo "->blade_up()";
    }

    private function blade_down(): void {
        echo "->blade_down()";
    }

}

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

    private function bucket_up(): void {
        echo "->bucket_up()";
    }

    private function bucket_down(): void {
        echo "->bucket_down()";
    }

}


function Forward(Vehicle $vh): void {
    $vh->forward();
}

function Reverse(Vehicle $vh): void {
    $vh->reverse();
}

function Stop(Vehicle $vh): void {
    $vh->stop();
}

// ---------------

$car = new Car("White");
$truck = new Truck("Blue");
$bulldozer = new Bulldozer("Orange");
$excavator = new Excavator("Yellow");

$vehicles = [$car, $truck, $bulldozer, $excavator];

foreach ($vehicles as $v) {
    Forward($v);
    echo "\r\n";
}
echo "\r\n";

foreach ($vehicles as $v) {
    Reverse($v);
    echo "\r\n";
}
echo "\r\n";

foreach ($vehicles as $v) {
    Stop($v);
    echo "\r\n";
}

<?php
interface HouseCleaning {
    public function cleanRoom();
    public function cleanKitchen();
}

abstract class Human {
    private $height;
    private $weight;
    private $age;

    public function getHeight() {
        return $this->height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function birthOfChild() {
        $this->birthMessage();
    }

    protected abstract function birthMessage();
}

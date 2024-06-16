<?php
class Student extends Human implements HouseCleaning {
    private $university;
    private $course;

    public function getUniversity() {
        return $this->university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function nextCourse() {
        $this->course++;
    }

    public function cleanRoom() {
        echo "Програміст прибирає кімнату";
    }

    public function cleanKitchen() {
        echo "Програміст прибирає кухню";
    }

    protected function birthMessage() {
        echo "Студент має дитину";
    }
}

<?php
class Programmer extends Human implements HouseCleaning {
    private $languages;
    private $experience;

    public function getLanguages() {
        return $this->languages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setLanguages($languages) {
        $this->languages = $languages;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function cleanRoom() {
        echo "Студент прибирає кімнату";
    }

    public function cleanKitchen() {
        echo "Студент прибирає кухню";
    }

    protected function birthMessage() {
        echo "Програміст має дитину";
    }
}
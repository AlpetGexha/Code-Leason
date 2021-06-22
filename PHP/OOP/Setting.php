<?php


class Setting {
    private $data;

//Mundesojn krijimin e metodave pa i shruja ne clasa "$settings->volume = 9;"
    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        if(!isset($this->data[$key]))
            return false;

        return $this->data[$key];
    }
}
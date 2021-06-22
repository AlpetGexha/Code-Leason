<?php
/*
    Eshte klase magjike
    Perdoret p.sh per include/require te classave  te tjera
*/

spl_autoload_register(function ($class_name) {
    require $class_name.'.php';
});

$Car = new Car("Mercedes","2.0","25.000");
echo "$Car->name";

$settings = new Setting;
$settings->volume = 9;
$settings->background = "me.jpg";

echo "<br>" . $settings->volume ." " .$settings->background;

echo "<br> Funksioni Refleksion: <br>";
echo "<pre>";
    Reflection::export(new ReflectionClass('Car'));
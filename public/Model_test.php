<?php 

require '../User.php';

// $model = new Model();

// $model->name = 'Oscar';

// $model->type = 'dog';

// $model->breed = 'dachshund';

// echo "The name of the dog is " . $model->name . PHP_EOL;

// echo "The type of pet is " . $model->type . PHP_EOL;

// echo "The breed is a " . $model->breed .PHP_EOL;

// echo "Testing a type that is undefined." . $model->weight . PHP_EOL;

echo User::getTableName() .PHP_EOL;

 ?>
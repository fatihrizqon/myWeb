<?php
/*Routing*/

/*Controllers*/
use App\Controllers\ExampleController;
use App\Controllers\HomeController;

/*Models*/
use App\Models\Example;
use App\Models\User;


/*Index Route*/
$app->get('/', HomeController::class.':index', function($request, $response){
  // CSRF token name and value
  $nameKey = $this->csrf->getTokenNameKey();
  $valueKey = $this->csrf->getTokenValueKey();
  $name = $request->getAttribute($nameKey);
  $value = $request->getAttribute($valueKey);

  return $this->view->render($response,'index.twig',[
    'nameKey'   => $nameKey,
    'valueKey'  => $valueKey,
    'name'      => $name,
    'value'     => $value,
  ]);
});

/*Accessing Example Controller*/
$app->get('/example', ExampleController::class.':index');

$app->post('/update', function(){
  return 'Subscribtion Updated.';
})->setName('update');

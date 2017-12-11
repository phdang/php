<!DOCTYPE html>

<html>

     <head>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	<link href="animate.css" rel="stylesheet">

	<script src="jquery-3.2.1.min.js"></script>

	<script src="bootstrap.min.js"></script>

	<style type="text/css">







	</style>

	<meta charset ="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>               </title>


     </head>




     <body>

	<div class="container code">

		<?php
            class foo
            {
                const test = 'fuck';
                public function do_foo()
                {
                    echo "Doing foo",'<br>' ;
                }
            }

        $bar = new foo;
        //$bar->do_foo();

        class MyClass
        {
            const CONST_VALUE = 'A constant value';
        }

        $classname = new MyClass;
      //  echo $classname::CONST_VALUE,'<br>'; // As of PHP 5.3.0
      //  echo MyClass::CONST_VALUE,'<br>';

        class OtherClass extends MyClass
        {
            public static $my_static = 'static var';

            public static function doubleColon()
            {
                echo parent::CONST_VALUE . "\n",'<br>';
                echo self::$my_static . "\n",'<br>';
            }
        }

	$classname = new OtherClass;
	//$classname->doubleColon(); // As of PHP 5.3.0
  //echo $classname::$my_static;

	//OtherClass::doubleColon()

  class MyClass1
{
    public $test = 'Something to say';
    protected function myFunc() {
        echo "MyClass::myFunc()\n",'<br>';
    }
}

class OtherClass1 extends MyClass1
{
    // Override parent's definition
    public function myFunc()
    {
        // But still call the parent function
        parent::myFunc();
        echo "OtherClass::myFunc()\n",'<br>';
    }
}

$class = new OtherClass1;
$class->myFunc();
$class1 = new Myclass1;
//$class1->myFunc();
//$test = 'test';
function somethingTest() {
  return 'test';
}
//echo $class1->$test;
//echo $class1->test
//echo $class1->{fuckTest()};
//echo $class1->{'test'};


class Person {
    public $name;
    public $number;

    function __construct( $name ) {
        $this->name = $name;
        $this->number = 0;
    }
};

$jack = new Person('Jack');
echo $jack->name,'<br>';
echo $jack->number;

?>

	</div>

     </body>


</html>

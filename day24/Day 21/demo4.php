<?php  
	header('content-type:text/html;charset="utf-8"');
	class Person{//创建一个类
		public $name='zhangsan';//公用的都可以访问
		private $age=100;//类里面的使用
		protected $sex='women';//继承里面使用

		public function showname(){
			echo $this->age;
		}
		private function showage(){
			echo $this->age;
		}
		/*function __construct(){//构造函数，自动调用
			echo '我是自己调用的';
			echo $this->age;
			echo $this->name;
		}*/
	}

	$p1=new Person();
	//echo $p1->name;//可以访问
	//echo $p1->age;
	//echo $p1->sex;
	//$p1->showname();


	class Student extends Person
	{
		
		function __construct()
		{
			echo $this->sex;
		}	
	}


	new Student();
?>
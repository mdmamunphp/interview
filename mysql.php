<?php

//prime number
/*
$p=0;
$n=6;
for($i=2;$i<$n;$i++){
	
	if($n%$i==0){
		
		
		$p++;
		break;
	}
}
	if($p==0){
		
		echo "number is prime ".$n."<br>";
	}else{
		
		echo "number is not prime ".$n."<br>";
	}
	
	*/
	// even and odd
	
/*	
	$e=6;
	if($e%2 ==0){
		
		
		echo "number is even -". $e."<br>";
		
	}else{
		
		echo "number is odd -".$e."<br>";
	}
	
	
	//piramit
	
	$a="";
	
	$c="";
	for($i=1;$i<6;$i++){
		
		for($a;$a<$i;$a++){
		
				$c .=$a;
				
			
				
			echo $c."<br>";
				
		}
	
	}
	*/
	
	// array to sting
	
	$arr=array(1,2,3,4,5);
	
	print_r($arr);
	
	echo implode('', $arr);
$str="bangladesh is beatiful country";


print_r(explode(' ',$str));

	
	
	$two=array(
			array(1,2,3,4,5),
			array(5,8,3,4,5)
			);
			
	print_r($two);
	
	
	//If the data entered matches what was requested, then the function will display “Hello”. Otherwise it will display “Bye”.
	function send($m=false){
		
		echo ($m)?'red':'green';
		
		
	}
	
	send(2);
	
	
	
	//Write a program to print Factorial of any number
/*	
$number=6;
$fact=1;
for($i=1;$i<=$number;$i++){
	$fact=$fact*$i;
}

echo "the factorial number is". $number."factorial".$fact;
*/




//Write a program in PHP to print Fibonacci series . 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
/*
$b=0;
$d=1;
$c="";
$n=9;

for($i=1;$i<=$n;$i++){
	
	    $c=$a+$b;
		echo $c;
		
		
	  
		
	 
}


*/
/*
$rows=8;

for($i=$rows;$i>=1;--$i)
     {
         for($j=1;$j<=$i;$j++)
         {
            echo $j;
         }
     echo "<br />";
  }



*/
/*
$rows=5;

for($i=1;$i<=$rows;++$i)
     {
         for($j=1;$j<=$i;$j++)
         {
            echo $j;
         }
     echo "<br />";
  }

*/

/*
$row=6;

for($i=0;$i<=$row;$i++){
	
	for($y=1;$y<$i;$y++){
		
		echo $y;
	}
	echo "<br>";
}



*/









	
	?>
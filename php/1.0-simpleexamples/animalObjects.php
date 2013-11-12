<?php 

class Animal
{
	protected $name;
	protected $sound;
	
	function Animal($name = "Freddy")
	{
		$this->name = $name;
		$this->sound = "I don't know what sound I make";
		
	}
	
	function breathe()
	{
		echo "<p>ahhhhhhhhh</p>";
	}
	
	function makeSound()
	{
		echo "<p>" . $this->sound . "</p>";
	}
}

class Pig extends Animal
{
	function Pig()
	{
		$this->name = "Jerome";
		$this->sound = "A pig goes oink";
	}

}




$oAnimal = new Pig();

$oAnimal->breathe();
$oAnimal->makeSound();

print_r($oAnimal);


?>
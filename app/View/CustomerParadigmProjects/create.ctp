<?php 
	App::uses('AbstractModel','Contacts');
	App::uses('Contact','Contacts');
	
	$contact = new Contact();
	
	foreach($this->params['pass'] as $param)
	{
		$contactid = $param;
	}

	$errCount = 0;
	
	
	if ($this->request->is('post'))
	{
		if (!isset($this->request->data['name']))
		{
			$errCount++;
		}
		
		if (!isset($this->request->data['email']))
		{
			$errCount++;
		}
		
		if ($errCount == 0)
		{
			$contact->setData('name',$this->request->data['name']);

			$contact->setData('email',$this->request->data['email']);

			$contact->save();
			
			echo "Record has been saved";
		}
		else
		{
			echo "Please fill in both Name and Email.";
		}
	}


	
	/**************************************/
	

	echo $this->Form->create('Contact');
	echo "<div class='ContactTitle'>Contacts</div>";
	echo "<div class='ContactBody'>";
	echo "Name: ".$this->Form->text('', array('length'=>'100','name'=>'name','disabled'=>'false','value'=>$contact->getData('name')));
	echo "Email: ".$this->Form->text('', array('length'=>'100','name'=>'email','disabled'=>'false','value'=>$contact->getData('email')));
	echo $this->Form->end('Submit');
	echo $this->Html->link("Home", '/CustomerParadigmProjects/index', array('class'=>'button'));
	
	echo "</div>";

?>
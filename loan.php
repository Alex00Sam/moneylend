<?php
	require 'init.php';
	$back=$app->layout->add('Button');
	$back->set('Back');
	$back->link('index.php');

	$friend = new Friends($db);
	$friend->load($app->stickyGet('friends_id'));
	$borrowed = $friend->ref('Borrowed');
	$returned = $friend->ref('Returned');

	$columns = $app->layout->add(['ui'=>'segment'])->add(new \atk4\ui\Columns('divided'));
	$column = $columns->addColumn();

	$crud1 = $column->add('CRUD');
  $crud1->setModel($borrowed,['amount','date']);
	$crud2 = $column->add('CRUD');
	$crud2->setModel($returned,['amount','date']);

	$column2 =  $columns->addColumn();
 	$reminder = $column2->add('Header')->set('Here you have reminder message for your friend. If you will, you can send it to him.')->add(new ReminderBox())->setModel($friend);

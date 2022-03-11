<?php

require_once __DIR__ . '/../entity/Todolist.php';
require_once __DIR__ . '/../helper/InputHelper.php';
require_once __DIR__ . '/../repository/TodolistRepository.php';
require_once __DIR__ . '/../service/TodolistService.php';
require_once __DIR__ . '/../views/TodolistView.php';

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodoListView;

function testViewShowTodolist()
{
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodoListView($todolistService);

  $todolistService->addTodolist("Belajar PHP Dasar");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");
  $todolistView->showTodolist();
}

function testViewAddTodolist()
{
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodoListView($todolistService);

  $todolistService->addTodolist("Belajar PHP Dasar");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");
  $todolistService->showTodolist();

  $todolistView->addTodoList();
  $todolistService->showTodolist();
}

function testViewRemoveTodolist()
{
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodoListView($todolistService);

  $todolistService->addTodolist("Belajar PHP Dasar");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");
  $todolistService->showTodolist();

  $todolistView->removeTodoList();
  $todolistService->showTodolist();
  $todolistView->removeTodoList();
  $todolistService->showTodolist();
}

testViewRemoveTodolist();
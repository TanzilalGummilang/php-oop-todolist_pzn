<?php

require_once __DIR__ . '/../entity/Todolist.php';
require_once __DIR__ . '/../repository/TodolistRepository.php';
require_once __DIR__ . '/../service/TodolistService.php';

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistRepository->todolist[1] = new Todolist("satu");
  $todolistRepository->todolist[2] = new Todolist("dua");
  $todolistRepository->todolist[3] = new Todolist("tiga");

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->showTodolist();
}

function testAddTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->addTodolist("satu");
  $todolistService->addTodolist("dua");
  $todolistService->addTodolist("tiga");

  $todolistService->showTodolist();
}

function testRemoveTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->addTodolist("satu");
  $todolistService->addTodolist("dua");
  $todolistService->addTodolist("tiga");
  $todolistService->showTodolist();
  
  $todolistService->removeTodolist(1);
  $todolistService->showTodolist();
}

testRemoveTodolist();
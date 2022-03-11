<?php

namespace Service {

  use Entity\Todolist;
  use Repository\TodolistRepository;

  interface TodolistService
  {
    function showTodolist(): void;
    function addTodolist(string $todo): void;
    function removeTodolist(int $number): void;
  }


  class TodolistServiceImpl implements TodolistService
  {
    private TodolistRepository $todolistRepository;

    public function __construct(TodolistRepository $todolistRepository)
    {
      $this->todolistRepository = $todolistRepository;
    }

    function showTodolist(): void
    {
      echo "=========================>>>\n";
      echo "TODOLIST\n";

      $todolist = $this->todolistRepository->findAll();
      foreach($todolist as $number => $value){
        echo "$number). " . $value->getTodo() . PHP_EOL;
      }
    }

    function addTodolist(string $todo): void
    {
      $todolist = new Todolist($todo);
      $this->todolistRepository->save($todolist);
      echo "sukses tambah todolist \n";
    }

    function removeTodolist(int $number): void
    {
      if($this->todolistRepository->remove($number)){
        echo "====================\n";
        echo "sukses hapus \n";
      }else{
        echo "====================\n";
        echo "gagal hapus \n";
      }
    }
  }

}
<?php

namespace View {

  use Service\TodolistService;
  use Helper\InputHelper;

  class TodoListView
  {
    private TodolistService $todolistService;

    function __construct(TodolistService $todolistService)
    {
      $this->todolistService = $todolistService;
    }

    function showTodoList(): void
    {
      while(true){
        $this->todolistService->showTodoList();
    
        echo "====================\n";
        echo "MENU" . PHP_EOL;
        echo "(1). Tambah Todo" . PHP_EOL;
        echo "(2). Hapus Todo" . PHP_EOL;
        echo "(x). Keluar" . PHP_EOL;
        
        echo "====================\n";
        $choice = InputHelper::input("pilih 1/2/x");
        if($choice == "1"){
          $this->addTodoList();
        }elseif($choice == "2"){
          $this->removeTodoList();
        }elseif(strtolower($choice) == "x"){
          break;
        }else{
          echo "xxxxx PILIHAN NGACO !! xxxxx\n";
        }
      }
      
      echo "====================\n";
      echo "GUDBAY..\n";
      echo "=========================>>>\n";
    }

    function addTodoList(): void
    {
      echo "====================\n";
      echo "TAMBAH TODO" . PHP_EOL;
      $todo = InputHelper::input("silakan isi todo (x untuk batal)");
      if($todo == "x"){
        echo "====================\n";
        echo "batal\n";
      }else{
        echo "====================\n";
        $this->todolistService->addTodolist($todo);
      }
    }

    function removeTodoList(): void
    {
      echo "====================\n";
      echo "HAPUS TODO\n";
      $choice = InputHelper::input("silakan pilih nomer (x untuk batal)");
      
      if($choice == "x"){
        echo "====================\n";
        echo "batal menghapus\n";
      }else{
        $this->todolistService->removeTodolist($choice);
      }
    }
  }

}
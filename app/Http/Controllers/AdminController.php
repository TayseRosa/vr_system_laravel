<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller{

    public function admin(){
        $pagName = 'Administrador';
        $text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.';
        return view('administrator.admin',[
            'pagName' => $pagName,
            'text'=>$text
        ]);
    }

    public function userRegistration(){
        $pagName = 'Cadastro de usuário';
        $text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.';
        return view('administrator.userRegistration',[
            'pagName' => $pagName,
            'text'=>$text
        ]);
    }

    public function foodRegistration(){
        $pagName = 'Cadastro de alimentos';
        $text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.';
        return view('administrator.foodRegistration',[
            'pagName' => $pagName,
            'text'=>$text
        ]);
    }

    public function groupRegistration(){
        $pagName = 'Cadastro de grupos';
        $text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.';
        return view('administrator.groupRegistration',[
            'pagName' => $pagName,
            'text'=>$text
        ]);
    }
}

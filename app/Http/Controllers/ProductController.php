<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return 'Esta es la lista de productos del CONTROLADOR';
    }

    public function create(){
        return 'Este es el formulario para crear productos del CONTROLADOR';
    }

    public function store(){
       //return 'Esta es la lista de productos del CONTROLADOR';
    } 

    public function show($product){
       // return 'Esta es la lista de productos del CONTROLADOR';
    }

    public function edit($product){
        //return 'Esta es la lista de productos del CONTROLADOR';
    }

    public function update($product){
        //return 'Esta es la lista de productos del CONTROLADOR';
    }

    public function destroy($product){
        //return 'Esta es la lista de productos del CONTROLADOR';
    }
}

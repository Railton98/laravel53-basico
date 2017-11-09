<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $title = 'teste de titulo';
        
        $xss = '<script>alert("Ataque XSS");</script>';
        
        $var1 = '123';
        
        $arrayData = [1,2,3,4,5,6,7,8,9];
        
    	return view('site.home.index', compact('title','xss', 'var1', 'arrayData'));
    }

    public function contato()
    {
    	return view('site.contato.contato');
    }

    public function empresa()
    {
    	return 'Page Empresa Teck!';
    }

    public function categoria($id)
    {
    	return "Categoria - {$id}";
    }

    public function categoriaOp($id = null)
    {
    	return "Categoria - {$id}";
    }    
}

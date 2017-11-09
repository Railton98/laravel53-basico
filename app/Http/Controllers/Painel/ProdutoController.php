<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ProductFormRequest;
use App\Models\Painel\Produto;

class ProdutoController extends Controller
{
    private $produto;

    private $totalPage = 4;

    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem de Produtos';

        $produtos = $this->produto->paginate($this->totalPage);
        return view('painel.produtos.index', compact('produtos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastar Novo Produto';

        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.produtos.create-edit', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {

        $dataForm = $request->all();

        $dataForm['active'] = ( !isset($dataForm['active'])) ? 0 : 1;

        //Inseri no bd
        $insert = $this->produto->create($dataForm);

        /*
        $messages = [
          'name.required' => 'Campo nome de preenchimento Obrigatório',
          'number.numerico' => 'Apenas Números',
          'number.required' => 'Campo Número de preenchimento Obrigatório',
        ];

        //validação
        //$this->validate($request, $this->produto->rules);

        $validate = validator($dataForm, $this->produto->rules, $messages);
        if ($validate->fails()) {
          return redirect()
                  ->route('produtos.create')
                  ->withErrors($validate)
                  ->withInput();
        }
        */

        if ($insert) {
            return redirect()->route('produtos.index');
        }
        else {
            redirect()->route('produtos.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $produto = $this->produto->find($id);

      $title = "Produto: {$produto->name}";

      return view('painel.produtos.show', compact('produto', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //Recupera o Produto
      $produto = $this->produto->find($id);

      $title = "Editar Produto: {$produto->name}";

      $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

      return view('painel.produtos.create-edit', compact('title', 'categorys', 'produto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
      //Recupera Todos os Dados do Formulário
      $dataForm = $request->all();

      //Recupera o Item Para Editar
      $produto = $this->produto->find($id);

      //Verifica se o Item Está Ativo
      $dataForm['active'] = ( !isset($dataForm['active'])) ? 0 : 1;

      //Edita o Item
      $update = $produto->update($dataForm);

      //Verifica se Realmente editou
      if ($update) {
        return redirect()->route('produtos.index');
      }
      else {
        return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao Editar']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $produto = $this->produto->find($id);

      $delete = $produto->delete();

      if ($delete) {
        return redirect()->route('produtos.index');
      }
      else {
        return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao Deletar']);
      }
    }

    public function tests()
    {
        /*
        $prod = $this->produto;
        $prod->name = 'Nome do Produto';
        $prod->number = 123454;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'descrição aqui';
        $insert = $prod->save();

        if ($insert) {
            return 'Inserido Com Sucesso!';
        }
        else {
            return 'Falha ao Inserir!';
        }
         *
         */

        /*

        $insert = $this->produto->create([
            'name'          => 'Produto 22',
            'number'        => 187667,
            'active'        => false,
            'category'      => 'banho',
            'description'   => 'Descrição 22'
        ]);

        if ($insert) {
            return "Inserido Com Sucesso ID: {$insert->id}";
        }
        else {
            return 'Falha ao Inserir!';
        }
         *
         */

        /*
        $prod = $this->produto->find(5);
        $prod->name = 'Update 2';
        $prod->number = 003;
        $update = $prod->save();

        if ($update) {
            return 'Alterado com Sucesso!';
        }
        else {
            return 'Erro ao Alterar';
        }
         *
         */

        /*
        $prod = $this->produto->find(3);
        $update = $prod->update([
                                    'name'          => 'Update Melhor',
                                    'number'        => 345,
                                    'active'        => true
        ]);

        if ($update) {
            return 'Alterado com Sucesso!';
        }
        else {
            return 'Erro ao Alterar';
        }
         *
         */

        /*
        $update = $this->produto
                ->where('number', 123454)
                ->update([
                            'name'          => 'Update pelo number',
                            'number'        => 123,
                            'active'        => true
        ]);

        if ($update) {
            return 'Alterado com Sucesso 2!';
        }
        else {
            return 'Erro ao Alterar';
        }
         *
         */

        /*
        $prod = $this->produto->find(1);
        $delete = $prod->delete();

        if ($delete) {
            return 'Deletado com Sucesso!';
        }
        else {
            return 'Erro ao Deletar!';
        }
         *
         */

        $delete = $this->produto
                ->where('number', 187667)
                ->delete();

        if ($delete) {
            return 'Deletado com Sucesso 2!';
        }
        else {
            return 'Erro ao Deletar!';
        }

    }
}

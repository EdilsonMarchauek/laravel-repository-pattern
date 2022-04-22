<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Models\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    protected $repository;

    //Injeta o model product no construtor
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pegando todos os produtos - with trás o relacionamento de category
        $products = $this->repository->paginate();

        //Enviando para View
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Pega categories de AppServiceProvider.php
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        /* primeira forma de cadastrar
        $category = Category::find($request->category_id);
        //products() - Models/Category.php
        $product = $category->products()->create($request->all());
        */

        $product = $this->repository->store($request->all());
        
        return redirect()
                ->route('products.index')
                ->withSuccess('Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //with = pega o relacionamento do model product
        //$product = $this->repository->where('id', $id)->first();
        $product = $this->repository->findWhereFirst('id', $id);

        if(!$product)
        return redirect()->back();

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Pega categories de AppServiceProvider.php

        if(!$product = $this->repository->findById($id))
            return redirect()->back();
        
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
            $this->repository->update($id, $request->all());

            return redirect()
                            ->route('products.index')
                            ->withSuccess('Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()
                ->route('products.index')
                ->withSuccess('Deletado com sucesso!');
    }

    public function search(Request $request)
    {
        //Pega todos os campos exceto o token
        $filters = $request->except('_token');

        //form name = "filtro"
        $products = $this->repository->search($request);

        return view('admin.products.index', compact('products', 'filters'));
    }
}

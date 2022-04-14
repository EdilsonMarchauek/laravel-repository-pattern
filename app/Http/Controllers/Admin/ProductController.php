<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Models\Product;
use App\Models\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductFormRequest;

class ProductController extends Controller
{

    protected $product;

    //Injeta o model product no construtor
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pegando todos os produtos - with trás o relacionamento de category
        $products = $this->product->with('category')->get();

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
        //pluck determina para retonar o título e o id
        $categories = Category::pluck('title', 'id');
        
        return view('admin.products.create', compact('categories'));
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

        $product = $this->product->create($request->all());
        
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
        $product = $this->product->with('category')->where('id', $id)->first();

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
        $categories = Category::pluck('title', 'id');

        if(!$product = $this->product->find($id))
            return redirect()->back();
        
        return view('admin.products.edit', compact('product', 'categories'));
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
            $this->product
                    ->find($id)
                    ->update($request->all());

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
        $this->product
        ->find($id)
        ->delete();

        return redirect()
                ->route('products.index')
                ->withSuccess('Deletado com sucesso!');
    }
}

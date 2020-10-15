<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loja;
use App\Http\Requests\LojaRequest;

class LojaController extends Controller
{
    private $loja;
    public function __construct(Loja $loja)
    {   
        $this->loja = $loja;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loja = $this->loja->paginate(20);
        return view('admin.lojas.index', compact('loja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lojas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LojaRequest $request)
    {
        $user = auth()->user();
        $data = $request->all();

        // dd($data);
        
        $user->lojas()->create($data);

        flash("Loja criada com sucesso!")->success();
        return redirect('admin/lojas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $loja = $this->loja->find($id);
        return view('admin.lojas.edit', compact('loja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LojaRequest $request, $id)
    {
        $loja = $this->loja->find($id);
        $data = $request->all();

        $loja->update($data);

        flash("Loja editada com sucesso!")->success();
        return redirect('admin/lojas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loja = $this->loja->find($id);
        $loja->delete();
        flash("Loja Excluida com sucesso!")->success();
        return redirect('admin/lojas');
    }
}

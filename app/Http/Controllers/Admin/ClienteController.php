<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Loja;
use App\Models\Inadimplencia;

class ClienteController extends Controller
{
    protected $cliente;
    protected $loja;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Cliente $cliente, Loja $loja)
    {
        $this->loja = $loja;
        $this->cliente = $cliente;
    }

    public function index()
    {
        $cliente = $this->cliente->paginate(20);
        return view('admin.clientes.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lojas = $this->loja->all();
        return view('admin.clientes.create', compact('lojas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($request->inadimplente)) {
            $cliente = $this->cliente->create($data);
            $data['user_id'] = auth()->user()->id;
            $cliente->inadimplencias()->create($data);
            return redirect('admin/clientes');

        } else {
            $this->cliente->create($data);
            return redirect('admin/clientes');
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
        $cliente = $this->cliente->find($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $cliente = $this->cliente->find($id);

        $cliente->update($data);

        return redirect('admin/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);
        $cliente->delete();

        return redirect('admin/clientes');

    }
}

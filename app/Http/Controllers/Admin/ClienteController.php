<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Loja;
use App\Models\Inadimplencia;
use App\Traits\UploadTrait;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    use UploadTrait;
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
    public function store(ClienteRequest $request)
    {
        $data = $request->all();

        if (isset($request->inadimplente)) {
            $cliente = $this->cliente->create($data);
            $data['user_id'] = auth()->user()->id;
            $inadimplencia = $cliente->inadimplencias()->create($data);

            if($request->hasFile('anexo')){
                $anexos = $this->imageUpload($request->file('anexo'), 'anexo');
                $inadimplencia->anexo()->createMany($anexos);
            }

            return view('admin.clientes.show', compact('cliente'));

        } else {
            $cliente = $this->cliente->create($data);
            return view('admin.clientes.show', compact('cliente'));
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
        $cliente = $this->cliente->find($id);
        return view('admin.clientes.show', compact('cliente'));
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
    public function update(ClienteRequest $request, $id)
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

    public function adimplente(){
        $cliente = $this->cliente->all();
        $cliente = $cliente->filter(function ($item) {
            return $item->inadimplencias->count() == 0;
        });

        return view('admin.clientes.adimplentes', compact('cliente'));
       
    }

    public function inadimplente(){
        $cliente = $this->cliente->all();
        $cliente = $cliente->filter(function ($item) {
            return $item->inadimplencias->count() > 0;
        });

        return view('admin.clientes.inadimplentes', compact('cliente'));
       
    }
}

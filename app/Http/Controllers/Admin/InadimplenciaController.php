<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Inadimplencia;
use App\Models\Loja;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InadimplenciaController extends Controller
{
    use UploadTrait;
    private $cliente;
    private $loja;
    private $inadimplencia;

    public function __construct(Loja $loja, Cliente $cliente, Inadimplencia $inadimplencia)
    {
        $this->loja = $loja;
        $this->cliente = $cliente;
        $this->inadimplencia = $inadimplencia;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $inadimplencia = $this->inadimplencia->create($data);

        if($request->hasFile('anexo')){
            $anexos = $this->imageUpload($request->file('anexo'), 'anexo');
            $inadimplencia->anexo()->createMany($anexos);
        }

        return redirect('admin/clientes/'.$data['cliente_id']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lojas = $this->loja->all();
        $cliente = $id;
        return view('admin.inadimplencias.create', compact('lojas', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lojas = $this->loja->all();
        $inadimplencia = $this->inadimplencia->find($id);

        return view('admin.inadimplencias.edit', compact('inadimplencia', 'lojas'));
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

        $inadimplencia = $this->inadimplencia->find($id);

        if ($request->hasFile('anexo')) {
            foreach ($inadimplencia->anexo as $a) {
                if (Storage::disk('public')->exists($a->anexo)) {
                    Storage::disk('public')->delete($a->anexo);
                }
            }

            $anexos = $this->imageUpload($request->file('anexo'), 'anexo');
            $inadimplencia->anexo()->createMany($anexos);
        }

        $inadimplencia->update($data);


        return redirect('admin/clientes/'.$inadimplencia['cliente_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $cliente = $this->cliente->find(36);
        // dd($cliente->inadimplencias()->withTrashed()->get());
        $inadimplencia = $this->inadimplencia->find($id);
        $inadimplencia->delete();
        return redirect()->back();
    }
}

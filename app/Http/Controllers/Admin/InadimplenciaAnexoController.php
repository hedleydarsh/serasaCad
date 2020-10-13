<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InadimplenciaAnexo;

class InadimplenciaAnexoController extends Controller
{
    public function destroy($id)
    {
        $anexo = InadimplenciaAnexo::find($id);
        $anexo->delete();

        return redirect()->back();

    }
}

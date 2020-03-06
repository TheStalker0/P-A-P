<?php

namespace App\Http\Controllers;

use App\Medicamentos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('medic.index',[
            'medica' => Medicamentos::orderBy('id')->paginate(10)
        ]);
    }

    public function pesquisar(Request $request)
    {
        $pesq = $request->get('pesq');

        $res = Medicamentos::where('id','like','%'.$pesq.'%')
        ->orwhere('nome','like','%'.$pesq.'%')
        ->get();

        return view('medic.index',['medica' => $res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("medic.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
          ]);

          $data = $request->all();
          $med = new Medicamentos();
          $med->Nome = $data['nome'];
          $med->save();
          return Redirect('/medica')->with('fm_success','Medicamento adicionado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $med = Medicamentos::findorfail($id);
        return View("medic.edit")->with(compact('med'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $request->validate([
        'nome' => 'required', 'string', 'max:255',
        ]);

        Medicamentos::where(['id'=>$id])->update([
        'nome'=>$data['nome'],
      ]);

      return Redirect('/medica')->with('fm_success','Medicamento alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Medicamentos::where(['id'=>$id])->delete();
        return Redirect('/medica')->with('fm_success','Medicamento eliminado com sucesso');
    }
}

<?php

namespace App\Http\Controllers;
use App\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index')->with(['reservas' => $reservas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = DB::table('datas')->orderBy('nombre','asc')->get();
        $aulas = DB::table('posts')->orderBy('nombre','asc')->get();
        $turnos = DB::table('turnos')->orderBy('id','asc')->get();
        $materias = DB::table('materias')->orderBy('nombre','asc')->get();
        $datas = DB::table('datas')->orderBy('nombre','asc')->get();
        return view('reservas.create')->with(['datas'=>$datas])->with(['aulas'=>$aulas])->with(['turnos'=>$turnos])->with(['materias'=>$materias])->with(['datas' => $datas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $date = Carbon::today();
        //dd($date);
        if($date->dayOfWeek != 7){
            $fecha_reserva = Carbon::tomorrow()->toDateString();
        }
        else{
            $fecha_reserva = $date->addDays(2)->toDateString();
        }
        $stone = DB::table('reservas')->where([
            ['user_id', '=', '3'],
            ['turno_id', '=' , $request->id_turno],
            ['fecha_solicitada', '=' , $fecha_reserva]
        ])->first();
        //dd($stone);
        if (is_null($stone)){
            //dd($stone);
            $reserva = new Reserva;
            $reserva->user_id = 2;
            $reserva->materia_id = $request->id_materia;
            $reserva->aula_id = $request->id_aula;
            $reserva->turno_id = $request->id_turno;
            $reserva->fecha_solicitada = $fecha_reserva;
            $reserva->data_id = $request->id_data;
            $reserva->cpu = (isset($request->cpu)) ? 1 : 0;
            $reserva->teclado = (isset($request->teclado)) ? 1 : 0;
            $reserva->mouse = (isset($request->mouse)) ? 1 : 0;
            $reserva->parlantes = (isset($request->parlantes)) ? 1 : 0;
            $reserva->lector = (isset($request->lector)) ? 1 : 0;
            $reserva->save();
        }
        else{
            dd($stone);

            //dd($reserva);

        }

        return redirect()->route('reservas.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

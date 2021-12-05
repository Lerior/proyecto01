<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AsistenciaController extends Controller
{
    public function index(){
        return Asistencia::all();
    }

    public function get($topic_id){
       // $result = Asistencia::find($a_id);
        $result = DB::table('asistencias')->where('topic_id', '=', $topic_id)->get();
        if($result)
            return $result;
        else
            return response()->json(['status'=>'failed'], 404);
    }
    public function getU($user_id){
       // $result = Asistencia::find($a_id);
        $result = DB::table('asistencias')->where('user_id', '=', $user_id)->get();
        if($result)
            return $result;
        else
            return response()->json(['status'=>'failed'], 404);
    }
    

    public function create(Request $req){
        $this->validate($req, [
            'user_id'=>'required',
            'topic_id'=>'required',
            't_nom'=>'required'
        ]);

        $datos = new Asistencia;
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }


    
    public function destroy($user_id, $topic_id){
        $datos = DB::table('asistencias')->where('user_id', '=', $user_id)->where('topic_id', '=', $topic_id)->delete();
      //  $datos = Asistencia::find($user_id);
        if(!$datos) return response()->json(['status'=>'failed'], 404);
        $result = $datos;//->delete();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }

}
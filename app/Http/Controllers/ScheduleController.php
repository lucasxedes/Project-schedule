<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Http;

class ScheduleController extends Controller
{

    // public function queryCep($cep)
    // {
    //     //dd($cep);
    //     $endereco = $cep;
    //     $response = Http::get('https://viacep.com.br/ws/'.$endereco.'/json/');
    //     dd($response->json());
    // }

    public function index()
    {
        $schedule = Schedule::all();
        return response()->json(
    [
            'message' =>  'These are all your contacts',
            'data' => $schedule
          ]);
    }



    public function store(StoreRequest $request)
    {
        try{
        $response = Http::get('https://viacep.com.br/ws/'.$request->cep.'/json/');
        $response->status();
        //dd($response->json('erro'));
        if($response->json('erro'))
        {
            throw new \Exception('Invalid zip code', 400);
        }
        $schedule = Schedule::Create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'cep' => $request->cep
        ]);

        return response()->json(
      [
                'message' =>  'contact created successfully',
                'data' => $schedule
            ]);
        } catch(\Exception $e){
            return response()->json([
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function show(Schedule $schedule, $id)
    {
        $schedule = Schedule::find($id);
        if(!$schedule)
        {
            return response()->json(['message' =>'There is no proxy user']);
        }

        return response()->json(
      [
                'message' =>  'This is the contact with the id: ' . $id,
                'data' => $schedule
            ]);
    }

    public function update(StoreRequest $request, Schedule $schedule, $id)
    {
        $schedule = Schedule::find($id);
        if(!$schedule)
        {
            return response()->json(['message' =>'There is no proxy user']);
        }

        $schedule->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'cep' => $request->cep
        ]);

        return response()->json(
      [
                'message' => 'Contact id: ' . $id . ' successfully updated',
                'data' => $schedule
            ]);
    }

    public function destroy(Schedule $schedule, $id)
    {
        $schedule = Schedule::find($id);
        if(!$schedule)
        {
            return response()->json(['message' =>'There is no proxy user']);
        }
        $schedule->delete($schedule);
        return response()->json(['message' => 'contact id ' . $id . ' successfully deleted']);
    }

}

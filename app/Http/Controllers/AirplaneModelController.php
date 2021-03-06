<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App;

class AirplaneModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$collection = App\AirplaneModel::all()->paginate(1)->toArray();
        $collection = App\AirplaneModel::paginate(10);
        return view('airplane_models.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airplane_models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new App\AirplaneModel;
        $data->name = $request->name;
        $data->number_of_economy_class_seats = $request->number_of_economy_class_seats;
        $data->number_of_businessmen_seats = $request->number_of_businessmen_seats;
        $data->number_of_first_class_seats = $request->number_of_first_class_seats;
        if ($request->hasFile('photo'))
        {
            if (Storage::exists($data->photo))
                Storage::delete($data->photo);
            $data->photo = $request->file('photo')->store('public');
        }
        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = App\AirplaneModel::find($id);
        return view('airplane_models.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = App\AirplaneModel::find($id);
        return view('airplane_models.edit', compact('collection'));
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
        $data = App\AirplaneModel::find($id);
        $data->name = $request->name;
        $data->number_of_economy_class_seats = $request->number_of_economy_class_seats;
        $data->number_of_businessmen_seats = $request->number_of_businessmen_seats;
        $data->number_of_first_class_seats = $request->number_of_first_class_seats;
        if ($request->hasFile('photo'))
        {
            if (Storage::exists($data->photo))
                Storage::delete($data->photo);
            $data->photo = $request->file('photo')->store('public');
        }
        $data->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        App\AirplaneModel::find($id)->delete();
        return redirect()->back();
    }

}

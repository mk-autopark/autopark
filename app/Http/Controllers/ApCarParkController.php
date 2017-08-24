<?php

namespace App\Http\Controllers;

use App\Models\ApCarPark;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApCarParkController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /apcarpark
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->input('searched_word');
        $config['list'] = ApCarPark::search($search)->paginate(15)->toArray();
        $config['listName'] = 'Cars park list';
        $config['create'] = 'app.carpark.create';
        $config['show']='app.carpark.show';
        $config['edit'] ='app.carpark.edit';
        $config['delete'] = 'app.carpark.destroy';
        $config['ignore'] = ['id'];
        $config['paginate'] = ApCarPark::latest()->search($search)->paginate(15);

        return view ('admin.list', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /apcarpark/create
     *
     * @return Response
     */
    public function create()
    {

        $config['titleForm'] = 'Create car park';
        $config['route'] = route('app.carpark.create');
        $config['show']='app.carpark.show';
        $config['edit'] = 'app.carpark.edit';
        $config['manufacturer']= ApCarPark::pluck('manufacturer','manufacturer')->toArray();
        $config['model']= ApCarPark::pluck('model','model')->toArray();

        $config['list'] = ApCarPark::get()->toArray();

        return view ('admin.carpark.create',$config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /apcarpark
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();

        ApCarPark::create(array(
            'manufacturer' => $data['manufacturer'],
            'model' => $data['model'],
            'average_fuel_consumption' => $data['average_fuel_consumption'],
            'license_plate' => $data['license_plate'],
            ));
    }

    /**
     * Display the specified resource.
     * GET /apcarpark/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $config['car']= ApCarPark::find($id)->toArray();
        dd($config);
    }


    /**
     * Show the form for editing the specified resource.
     * GET /apcarpark/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $record['car']= ApCarPark::find($id)->toArray();
        $config['titleForm']= 'Car park edit';
        $config['route']= route('app.carpark.edit',$id);
        $config['default_manufacturer']=$record['car']['manufacturer'];
        $config['default_model']=$record['car']['model'];
        $config['default_average_fuel']=$record['car']['average_fuel_consumption'];
        $config['default_license_plate']=$record['car']['license_plate'];
        $config['manufacturer']= ApCarPark::pluck('manufacturer','manufacturer')->toArray();
        $config['model']= ApCarPark::pluck('model','model')->toArray();

        return view ('admin.carpark.edit', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /apcarpark/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = request()->all();

        $record = ApCarPark::find($id);
        $record->update($data);

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /apcarpark/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        ApCarPark::destroy($id);

        return ["success" => true, "id" => $id];

    }

}
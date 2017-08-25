<?php namespace App\Http\Controllers;

use App\Models\ApCarPark;
use App\Models\ApCarParkDriversConnections;
use App\Models\ApUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApCarParkDriversConnectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /apcarparkdriversconnections
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->input('searched_word');
        $config['search'] = $search;
        $config['list'] = ApCarParkDriversConnections::paginate(15)->toArray();
        $config['listName'] = 'driver assignments to cars';
        $config['create'] = 'app.drivers.create';
        $config['show'] = 'app.drivers.show';
        $config['edit'] = 'app.drivers.edit';
        $config['delete'] = 'app.drivers.destroy';
        $config['paginate'] = ApCarParkDriversConnections::paginate(15);
        $config['ignore'] = ['id'];
        return view('admin.list', $config);

    }

    /**
     * Show the form for creating a new resource.
     * GET /apcarparkdriversconnections/create
     *
     * @return Response
     */
    public function create()
    {
        $records = ApCarParkDriversConnections::pluck('driver_id', 'id')->toArray();
        $cars = ApCarParkDriversConnections::pluck('carpark_id', 'id')->toArray();
        $count = array_count_values($cars);
        $array = [];
        foreach ($count as $key => $value)
           if ($value >=3)
               $array[$key]=$key;

        $config['users'] = ApUsers::whereNotIn('id', $records)->pluck('person_id', 'id')->toArray();
        //$config ['usersNOT'] = ApUsers::pluck('person_id', 'id')->toArray();
        $config['carpark'] = ApCarPark::whereNotIn('id', $array)->pluck('license_plate', 'id')->toArray();
        //$config ['carparkNOT'] = ApCarPark::pluck('license_plate', 'id')->toArray();
        $config ['titleForm'] = 'Assign driver to car form';
        $config['route'] = route('app.drivers.create');

        return view('admin.cardriverconnections.create', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /apcarparkdriversconnections
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();

        ApCarParkDriversConnections::create(array(
            'driver_id' => $data['users'],
            'carpark_id' => $data['carpark'],
        ));

        return redirect(route('app.drivers.create'));

    }

    /**
     * Display the specified resource.
     * GET /apcarparkdriversconnections/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     * GET /apcarparkdriversconnections/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $config ['users'] = ApUsers::pluck('person_id', 'id')->toArray();
        $config ['carpark'] = ApCarPark::pluck('license_plate', 'id')->toArray();
        $record = ApCarParkDriversConnections::find($id)->toArray();
        $config['default_user'] = $record['driver_id'];
        $config['default_car'] = $record['carpark_id'];
        $config ['titleForm'] = 'Assign driver to car form';
        $config['route'] = route('app.drivers.create');

        return view('admin.cardriverconnections.edit', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /apcarparkdriversconnections/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = request()->all();

        $record = ApCarParkDriversConnections::find($id);
        $record->update($data);

        return redirect(route('app.drivers.index'));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /apcarparkdriversconnections/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        ApCarParkDriversConnections::destroy($id);

        return ["success" => true, "id" => $id];
    }

}
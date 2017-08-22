<?php namespace App\Http\Controllers;

use App\Models\ApCarPark;
use Illuminate\Routing\Controller;

class ApCarParkController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /apcarpark
     *
     * @return Response
     */
    public function index()
    {
        $config['list'] = ApCarPark::get()->toArray();
        $config['listName'] = 'car park list';
        //$config['create'] = route('carpark.create');
        //$config['show']=route('carpark.show');
        //$config['edit'] = route('carpark.edit');
        //$config['delete'] = route('carpark.destroy');
dd($config);
        return view ('admin.list', $config);

        //dd($config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /apcarpark/create
     *
     * @return Response
     */
    public function create()
    {
        $config['list'] = ApCarPark::get()->toArray();
        $config['titleForm'] = 'Create car park';
        $config['route'] = route('carpark.create');
        $config['show']=route('carpark.show');
        $config['edit'] = route('carpark.edit');
        $config['delete'] = route('carpark.destroy');

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
dd($data);
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
        dd('carpark show with id');
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
        //
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
        //
    }

}
<?php namespace App\Http\Controllers;

use App\Models\ApUsers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ApUsersController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /apusers
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->input('searched_word');
        $config['search'] = $search;
        $config['list'] = ApUsers::search($search)->paginate(15)->toArray();
        $config['listName'] = 'Users list';
        $config['create'] = 'app.users.create';
        $config['show'] = 'app.users.show';
        $config['edit'] = 'app.users.edit';
        $config['delete'] = 'app.users.destroy';
        $config['ignore'] = ['id','count', 'deleted_at', ];
        $config['paginate'] = ApUsers::latest()->search($search)->paginate(15);

        return view('admin.list', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /apusers/create
     *
     * @return Response
     */
    public function create()
    {
        $config['titleForm'] = 'User create form';
        $config['route'] = route('app.users.create');
        return view('admin.users.create', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /apusers
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();

        ApUsers::create(array(

            'name' => $data['name'],
            'surname' => $data['surname'],
            'password' => $data['password'],
            "residential_address" => $data['residential_address'],
            'person_id' => $data['person_id'],
            'phone' => $data['phone'],
            'email' => $data['email']
        ));
    }

    /**
     * Display the specified resource.
     * GET /apusers/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /apusers/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $record['user'] = ApUsers::find($id)->toArray();

        $config['name'] = $record['user']['name'];
        $config['surname'] = $record['user']['surname'];
        $config['residential_address'] = $record['user']['residential_address'];
        $config['person_id'] = $record['user']['person_id'];
        $config['phone'] = $record['user']['phone'];
        $config['email'] = $record['user']['email'];
        $config['titleForm'] = 'User edit form';
        $config['route'] = route('app.users.edit',$id);

        return view('admin.users.edit', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /apusers/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = request()->all();

        $record = ApUsers::find($id);
        $record->update($data);


    }

    /**
     * Remove the specified resource from storage.
     * DELETE /apusers/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        ApUsers::destroy($id);

        return ["success" => true, "id" => $id];
    }

}
<?php



namespace App\Http\Controllers;

use App\SysConf\Configuration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sys = new Configuration('SYSTEM/system_config.json');
        $config = $sys->config;
        return view('admin.system.index', compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateConfig(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'logo' => 'required',
            'year' => 'required'
        ]);
        $sys = new Configuration('SYSTEM/system_config.json');
        $sys->config['system_config']['company_name'] = $request->company_name;
        $sys->config['system_config']['logo'] = $request->logo;
        $sys->config['system_config']['year'] = $request->year;
        $sys->save();


        Alert::alert('Success', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('admin.config.index');
    }
}

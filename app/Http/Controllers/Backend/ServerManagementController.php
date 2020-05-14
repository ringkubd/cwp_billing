<?php

namespace App\Http\Controllers\Backend;

use App\Events\Backend\Server\ServerDestroyEvent;
use App\Helpers\Server\Server;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Server\IndexRequest;
use App\Http\Requests\Backend\Server\ServerUpdateRequest;
use App\Http\Requests\Backend\Server\StoreRequest;
use App\Models\Server\ServerInformation;
use App\Repositories\Backend\Server\ServerManagementRepository;
use Illuminate\Http\Request;

class ServerManagementController extends Controller
{
    protected $serverRepository;

    public function __construct(ServerManagementRepository $serverManagementRepository)
    {
        $this->serverRepository = $serverManagementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        $data = $this->serverRepository->all();
        return view('backend.server.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.server.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(StoreRequest $request)
    {
        $this->serverRepository->create($request->all());
        return redirect()->route('admin.server.index')->withFlashSuccess(__('alerts.backend.server.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ServerInformation $serverInformation, $id)
    {
        //
        return $serverInformation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServerInformation $serverInformation, $id)
    {
        $server = ServerInformation::find($id);
        return view('backend.server.edit', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServerUpdateRequest $request, $id)
    {
        $this->serverRepository->update($request->all());
        return redirect()->route('admin.server.index')->withFlashSuccess(__('alerts.backend.server.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $server = ServerInformation::find($id);
        $server->delete();
        event(new ServerDestroyEvent($server));
        return redirect()->route('admin.server.index')->withFlashSuccess(__('alerts.backend.server.deleted'));
    }

    public function disabled(){

    }

    public function deleted(){

    }

    public function enable(ServerManagementRepository $serverManagementRepository, ServerInformation $serverInformation, $server){
        $data = $serverManagementRepository->enable($server);
        if ($data->enable == 1){
            $flashMessage = __('alerts.backend.server.enable');
        }else{
            $flashMessage = __('alerts.backend.server.disable');
        }
        return redirect()->route('admin.server.index')->withFlashSuccess($flashMessage);
    }

    public function ssl(ServerManagementRepository $serverManagementRepository, ServerInformation $serverInformation, $server){
        $data = $serverManagementRepository->secure($server);
        if ($data->secureConnection == 1){
            $flashMessage = __('alerts.backend.server.ssl_enable');
        }else{
            $flashMessage = __('alerts.backend.server.ssl_disable');
        }
        return redirect()->route('admin.server.index')->withFlashSuccess($flashMessage);
    }

    public function testApi(){
        $server = new Server();
        //dd($server->activeServer());
        dd($server->postRequest('http://5.189.130.79:2304/v1/account', [
            'action' =>'add',
            'domain'=>'testing.southzones.com',
            'user'=>'abdbdd',
            'pass'=>'ashfhfh',
            'email'=>'info@southzones.com',
            'package'=>'1',
            'inode'=>'40',
            'limit_nproc'=>'',
            'limit_nofile'=>'',
            'server_ips'=>'5.189.130.79',
            'autossl'=>1,
            'encodepass'=>'',
            'reseller'=>'',
            'lang'=>'',
            'debug'=>'0',
        ]));
    }
}

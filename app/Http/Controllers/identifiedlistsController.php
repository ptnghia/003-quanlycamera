<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\IdentifiedLists;
use App\Models\Identifieds;

class identifiedlistsController extends Controller
{
    private $useDB;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new IdentifiedLists();
    }
    public function index()
    {
        $data = $this->useDB->getAll();

        return view('page.camera', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identifiedModel = new Identifieds();
        $categoryModel = new Categories();
        
        $dataIdentified = $identifiedModel->getAll();
        $dataCategory = $categoryModel->getAll();
        return view('page.them_doi_tuong_nhan_dang', compact('dataIdentified', 'dataCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new IdentifiedLists();
        $user->name = $request->name;
        $user->nvr_id = $request->nvr_id;
        $user->area_id = $request->area_id;
        $user->IP = $request->IP;
        $user->link = $request->link;
        $user->status = $request->status;
        $user->note = $request->note;
        $user->save();

        return redirect()->route('camera.index')->with('success', 'Camera created successfully.');
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
        $areaModel = new Areas();
        $nvrModel = new Nvrs();
        // Gọi phương thức getUserName() của model User
        $dataArea = $areaModel->getAll();
        $dataNvr = $nvrModel->getAll();
        $dataId = $this->useDB->getId($id);
        return view('page.sua_camera', compact('dataId', 'dataArea','dataNvr'));
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
        $data_theodoi = [
            'name'           =>      $request->name,
            'status'           =>      $request->status,
            'IP'           =>      $request->IP,
            'link'           =>      $request->link,
            
            'area_id'           =>      $request->area_id,
            'nvr_id'           =>      $request->nvr_id,
            'note'           =>      $request->note
        ];

        //Lưu dữ liệu
        $this->useDB->updateData($data_theodoi, $id);
        return redirect()->route('camera.index')->with('success', 'Camera updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->useDB->deleteData($id);
        return redirect()->route('camera.index')->with('success', 'Camera deleted successfully.');
    }
}

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

        return view('page.danh_sach_nhan_dang', compact('data'));
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
        $user->identified_id = $request->identified;
        $user->time_get = $request->inputtime;
        $user->category_id = $request->category;
        $user->note = $request->note;
        $user->image = $request->image;

        $user->save();

        return redirect()->route('identifiedlists.index')->with('success', 'identifiedlists created successfully.');
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
        // $areaModel = new Areas();
        // $nvrModel = new Nvrs();

        //$dataArea = $areaModel->getAll();
        // $dataNvr = $nvrModel->getAll();
        $dataId = $this->useDB->getId($id);
        return view('page.sua_doi_tuong_nhan_dang', compact('dataId'));
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
            'identified_id'           =>      $request->identified,
            'time_get'           =>      $request->inputtime,
            'category_id'           =>      $request->category,
            'note'           =>      $request->note,
            'image'           =>      $request->image,
            
        ];

        //Lưu dữ liệu
        $this->useDB->updateData($data_theodoi, $id);
        return redirect()->route('identifiedlists.index')->with('success', 'identifiedlists updated successfully.');
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
        return redirect()->route('identifiedlists.index')->with('success', 'Camera deleted successfully.');
    }
}

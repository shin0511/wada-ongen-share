<?php

namespace App\Http\Controllers;

use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Auth::user()->shares;

        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        // ディレクトリ名
        $dir = 'ongen';
        $file= $request->file('ongen');

        // アップロードされたファイル名を取得
        $file_name = $request->file('ongen')->getClientOriginalName();
        // 取得したファイル名で保存
        $request->file('ongen')->storeAs('public/' . $dir, $file_name);

        $share = new Share();
        $share->title = $request->input('title');
        $share->path = 'storage/' . $dir . '/' . $file_name;
        $share->user_id = Auth::id();
        $share->save();

        return redirect()->route('shares.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Share $share)
    {
        $request->validate([
            'title' => 'required',
        ]);

        // ディレクトリ名
        $dir = 'ongen';
        $file= $request->file('ongen');

        // アップロードされたファイル名を取得
        $file_name = $request->file('ongen')->getClientOriginalName();
        // 取得したファイル名で保存
        $request->file('ongen')->storeAs('public/' . $dir, $file_name);

        $share->title = $request->input('title');
        $share->path = 'storage/' . $dir . '/' . $file_name;
        $share->user_id = Auth::id();
        $share->save();

        return redirect()->route('shares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Share $share)
    {
        $file = $request->path;

        $file = str_replace('storage/ongen/', 'public/ongen/', $file);
        
        Storage::delete($file);
        
        
        $share->delete();
        return redirect()->route('shares.index');  
    }
}

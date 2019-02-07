<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePageRequest;
use Illuminate\Support\Facades\DB;
use App\Area;
use App\Page;

class ManagePageController extends Controller
{
    // show login page
    public function showPagelist(){
        $pageList = Page::where('user_id', session('user')->id)->get();
        return view('ManagePage.Pagelist', ['pagelist'=>$pageList]);
    }

    // show createpage page
    public function showCreatePage(){
        $areaList = Area::all();
        return view('ManagePage.CreatePage', ['arealist'=>$areaList]);
    }

    // create page
    public function createPage(CreatePageRequest $request){
        $newPage = new Page();
        $newPage->user_id = $request->user_id;
        $newPage->page_name = $request->page_name;
        $newPage->total_followers = 0;
        $newPage->status = 'Active';
        $newPage->page_pic = 'Need-To-Rename';
        $newPage->area = $request->area;
        $newPage->address = $request->address;
        $newPage->save();

        // page picture
        $lastID = Page::find($newPage->id);
        if ($request->hasFile('page_pic')) {
            $image = $request->file('page_pic');
            $name = $newPage->id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/page_picture');
            $image->move($destinationPath, $name);
            $lastID->page_pic = $name;
            $lastID->save();
        }

        $request->session()->flash('success_message', 'Page Created Successsfully');
        return redirect()->route('showPagelist');
    }
}

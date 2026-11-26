<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;

use App\Laravel\Models\User;

use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;

use App\Laravel\Models\CMS;
use App\Laravel\Requests\Portal\CMSRequest;

use DB;

class ContactController extends Controller{
    
    public function __construct()
    {

    }

    public function index(PageRequest $request){
        $user = auth('web')->user();
        $this->data['page'] = $user->cms()->firstOrNew(['code' => 'contact']);

        $this->data['page_title'] = 'CMS Contact | AMS User Portal';
        return view('portal.cms.contact', $this->data);
    }

    public function store(CMSRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = auth('web')->user();

            $cms = $user->cms()->firstOrNew(['code' => 'contact']);

            $cms->title = $request->input('title');
            $cms->content = $request->input('content');
            $cms->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully saved CMS content.");

            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");

            return redirect()->back();
        }
    }

}
<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;

use App\Laravel\Models\User;

use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;

use DB;

class CMSController extends Controller{
    public function __construct()
    {

    }

    // public function cms_home(PageRequest $request){
    //     $this->data['page_title'] = 'CMS Home | AMS User Portal';
    //     return view('portal.cms.home', $this->data);
    // }

    // public function cms_about(PageRequest $request){
    //     $this->data['page_title'] = 'CMS About | AMS User Portal';
    //     return view('portal.cms.about', $this->data);
    // }

    // public function cms_articles(PageRequest $request){
    //     $this->data['page_title'] = 'CMS Articles | AMS User Portal';
    //     return view('portal.cms.articles', $this->data);
    // }

    // public function cms_contact(PageRequest $request){
    //     $this->data['page_title'] = 'CMS Contact | AMS User Portal';
    //     return view('portal.cms.contact', $this->data);
    // }

}

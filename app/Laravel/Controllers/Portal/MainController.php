<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller{
    public function __construct()
    {

    }

    public function index(PageRequest $request){
        $this->data['page_title'] = 'Dashboard | AMS User Portal';
        return view('portal.dashboard', $this->data);
    }

    public function cmsHome(PageRequest $request){
        $this->data['page_title'] = 'CMS Home | AMS User Portal';
        return view('portal.cms.home', $this->data);
    }

    public function cmsAbout(PageRequest $request){
        $this->data['page_title'] = 'CMS About | AMS User Portal';
        return view('portal.cms.about', $this->data);
    }

    public function cmsArticles(PageRequest $request){
        $this->data['page_title'] = 'CMS Articles | AMS User Portal';
        return view('portal.cms.articles', $this->data);
    }

    public function cmsContact(PageRequest $request){
        $this->data['page_title'] = 'CMS Contact | AMS User Portal';
        return view('portal.cms.contact', $this->data);
    }

}

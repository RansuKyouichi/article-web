<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;

use App\Laravel\Models\User;

use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;

use App\Laravel\Models\CMS;
use App\Laravel\Requests\Portal\CMSRequest;

use DB;

class HomeController extends Controller{
    
    public function __construct()
    {

    }

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = 'CMS Home | AMS User Portal';

        $user = auth('web')->user();

        $defaults = [   
            'hero' => [
                'label' => 'WELCOME TO AMS - Article and Media Site',
                'title' => 'Lorem',
                'accent' => 'Ipsum.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil delectus alias laudantium rerum non, mollitia officia in! Provident porro sequi commodi corrupti nemo debitis odit quisquam dolore nam quis. Facere!',
                'primary_button' => 'Explore Articles',
                'secondary_button' => 'About Us',
                'note' => 'READ. LEARN. GROW.',
            ],

            'featured' => [
                'label' => "EDITOR'S PICK",
                'title' => 'Featured Story',
            ],

            'latest' => [
                'label' => 'FRESH FROM THE BLOG',
                'title' => 'Latest Stories',
                'description' => 'Explore our latest articles and discoveries.',
            ],

            'newsletter' => [
                'label' => 'STAY CONNECTED',
                'title' => 'A Little Inspiration, Delivered.',
                'description' => 'Discover fresh perspectives and meaningful stories whenever you visit.',
            ],
        ];

        $page = $user->cms()->firstOrNew([
            'code' => 'home'
        ]);

        $savedContent = $page->content
            ? json_decode($page->content, true)
            : [];

        $this->data['page'] = $page;

        $this->data['settings'] = array_replace_recursive(
            $defaults,
            is_array($savedContent) ? $savedContent : []
        );

        return view('portal.cms.home', $this->data);
    }

    public function store(CMSRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = auth('web')->user();

            $cms = $user->cms()->firstOrNew(['code' => 'home']);

            $cms->title = 'Home Page';
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
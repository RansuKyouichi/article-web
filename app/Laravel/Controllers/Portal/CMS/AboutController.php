<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;

use App\Laravel\Models\User;

use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;

use App\Laravel\Models\CMS;
use App\Laravel\Requests\Portal\CMSRequest;

use DB;

class AboutController extends Controller{

    public function __construct()
    {

    }

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = 'CMS About | AMS User Portal';

        $user = auth('web')->user();

        $default = [
            'hero' => [
                'label' => 'GET TO KNOW US',
                'title' => 'Lorem Ipsum',
                'accent' => 'Dolor.',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Discover who we are and what we stand for.',
            ],
            'story' => [
                'label' => 'OUR STORY',
                'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'paragraph1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'paragraph2' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'paragraph3' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            ],
            'purpose' => [
                'label' => 'OUR PURPOSE',
                'title' => 'Lorem Ipsum',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'mission' => 'Our mission is to share meaningful articles, ideas, and knowledge with our readers.',
                'vision' => 'Our vision is to create a platform where people can discover, learn, and grow through reading.',
            ],
            'values' => [
                'title' => 'Our Core Values',
                'description' => 'The principles that guide everything we do.',
                'items' => [
                    [
                        'title' => 'Integrity',
                        'description' => 'We value honesty, transparency, and trust.',
                    ],
                    [
                        'title' => 'Growth',
                        'description' => 'We encourage continuous learning and improvement.',
                    ],
                    [
                        'title' => 'Creativity',
                        'description' => 'We welcome ideas, creativity, and new perspectives.',
                    ],
                    [
                        'title' => 'Community',
                        'description' => 'We believe in building connections and sharing knowledge.',
                    ],
                ],
            ],
            'cta' => [
                'title' => "There's Always More to Discover.",
                'description' => 'Discover fresh perspectives and meaningful stories.',
            ],
        ];


        $page = $user->cms()->firstOrNew([
            'code' => 'about',
        ]);

        $savedContent = $page->content
            ? json_decode($page->content, true)
            : [];

        $this->data['page'] = $page;

        $this->data['settings'] = array_replace_recursive(
            $default,
            is_array($savedContent) ? $savedContent : []
        );

        return view('portal.cms.about', $this->data);
    }

    public function store(CMSRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = auth('web')->user();

            $cms = $user->cms()->firstOrNew([
                'code' => 'about',
            ]);

            $cms->title = 'About Page';
            $cms->content = $request->input('content');
            $cms->save();

            DB::commit();

            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', 'Successfully saved CMS content.');

            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Server failed. Please try again later.');

            return redirect()->back();
        }
    }

}
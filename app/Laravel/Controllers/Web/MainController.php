<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Article;
use Illuminate\Support\Str;

class MainController extends Controller{
    public function __construct()
    {

    }

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = 'Home | AMS';
        $this->data['articles'] = $this->getArticles();

        $default = [
            'hero' => [
                'label' => 'WELCOME TO AMS - Article and Media Site',
                'title' => 'Lorem',
                'accent' => 'Ipsum.',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel consectetur nobis nisi. Delectus facere dolorum aperiam necessitatibus corporis minus dignissimos nobis officia ad! Necessitatibus delectus, unde eum blanditiis ea animi.',
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
                'view_all_button' => 'View All Articles',
            ],

            'newsletter' => [
                'label' => 'STAY CONNECTED',
                'title' => 'A Little Inspiration, Delivered.',
                'accent' => 'Delivered.',
                'description' => 'Discover fresh perspectives and meaningful stories whenever you visit.',
                'button' => 'Start Reading',
            ],
        ];

        $this->data['default'] = $default;

        $user = auth('web')->user();

        $cms_home = $user
            ? $user->cms()->where('code', 'home')->first()
            : null;

        $this->data['home_settings'] = $cms_home && $cms_home->content
            ? json_decode($cms_home->content, true)
            : [];

        return view('web.home', $this->data);
    }


    public function about(PageRequest $request)
    {
        $this->data['page_title'] = 'About Page | AMS';

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

        $this->data['default'] = $default;

        $user = auth('web')->user();

        $cms_about = $user
            ? $user->cms()->where('code', 'about')->first()
            : null;

        $this->data['about_settings'] = $cms_about && $cms_about->content
            ? json_decode($cms_about->content, true)
            : [];

        return view('web.about', $this->data);
    }


    public function articles(PageRequest $request)
    {
        $this->data['page_title'] = 'Articles Page | AMS';
        $this->data['articles'] = $this->getArticles();

        return view('web.articles', $this->data);
    }



    public function article(PageRequest $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            abort(404);
        }

        $this->data['article'] = [
            'id' => $article->id,
            'category' => 'Article',
            'title' => $article->name,
            'author' => 'AMS',
            'date' => $article->created_at?->format('F d, Y'),
            'image' => $article->filename
                ? rtrim($article->directory, '/') . '/resized/' . $article->filename
                : null,
            'content' => $article->description,
        ];

        $this->data['page_title'] = $article->name . ' | AMS';

        return view('web.article', $this->data);
    }


    public function contact(PageRequest $request){
        $this->data['page_title'] = 'Contact Page | AMS';
        return view('web.contact', $this->data);
    }


    public function getArticles()
    {
        return Article::latest()
            ->get()
            ->map(function ($article) {
                return [
                    'id' => $article->id,
                    'category' => 'Article',
                    'title' => $article->name,
                    'excerpt' => Str::limit(strip_tags($article->description), 150),
                    'author' => 'AMS',
                    'date' => $article->created_at?->format('F d, Y'),
                    'image' => $article->filename
                        ? rtrim($article->directory, '/') . '/thumbnails/' . $article->filename
                        : null,
                ];
            })
            ->toArray();
    }

}

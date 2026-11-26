<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Requests\PageRequest;

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

    public function articles(PageRequest $request){
        $this->data['page_title'] = 'Articles Page | AMS';
        $this->data['articles'] = $this->getArticles();
        return view('web.articles', $this->data);
    }


    public function article(PageRequest $request, $id){
        $articles = $this->getArticles();
        $article = collect($articles)->firstWhere('id', $id);

        if (!$article) {
            abort(404);
        }

        $this->data['article'] = $article;
        return view('web.article', $this->data);
    }

    public function contact(PageRequest $request){
        $this->data['page_title'] = 'Contact Page | AMS';
        return view('web.contact', $this->data);
    }

    public function getArticles() {
        return [
            [
                'id' => 1,
                'category' => 'Technology',
                'title' => 'The Future of Web Development',
                'excerpt' => 'Discover how modern technologies are changing the way we build, design, and experience websites.',
                'author' => 'John Doe',
                'date' => 'November 11, 2026',
                'image' => '../assets/img/laptop-office.jpg',
            ],
            [
                'id' => 2,
                'slug' => 'the-future-of-web-development',
                'category' => 'Lifestyle',
                'title' => 'Building Better Daily Habits',
                'excerpt' => 'Small habits can create meaningful changes in your everyday life.',
                'author' => 'Jane Smith',
                'date' => 'November 10, 2026',
                'image' => '../assets/img/laptop-table.jpg',
            ],
            [
                'id' => 3,
                'category' => 'Education',
                'title' => 'Learning Beyond the Classroom',
                'excerpt' => 'Discover why continuous learning is important for personal growth.',
                'author' => 'Alex Cruz',
                'date' => 'November 9, 2026',
                'image' => '../assets/img/books-library.jpg',
            ],

            [
                'id' => 4,
                'category' => 'Business',
                'title' => 'Turning Ideas Into Businesses',
                'excerpt' => 'Every successful business starts with an idea and a willingness to act.',
                'author' => 'Mark Lee',
                'date' => 'November 8, 2026',
                'image' => '../assets/img/building-hallway.jpg',
            ],
            [
                'id' => 5,
                'category' => 'Health',
                'title' => 'The Importance of Mental Health',
                'excerpt' => 'Mental health is just as important as physical health, and it\'s time we start treating it that way.',
                'author' => 'Emily Johnson',
                'date' => 'November 7, 2026',
                'image' => '../assets/img/meditation.jpg',
            ],
            [
                'id' => 6,
                'category' => 'Travel',
                'title' => 'Exploring the World on a Budget',
                'excerpt' => 'Traveling doesn\'t have to be expensive. Learn how to explore the world without breaking the bank.',
                'author' => 'Chris Martin',
                'date' => 'November 6, 2026',
                'image' => '../assets/img/mountain-landscape.jpg',
            ],
        ];
    }

}

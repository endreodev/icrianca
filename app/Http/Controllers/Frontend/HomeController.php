<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Action;
use App\Models\Archive;
use App\Models\Partner;
use App\Models\PostsInstagram;
use App\Models\Program;
use App\Models\Slide;
use App\Models\Student;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $slides = Slide::where('status', TRUE)->orderBy('id', 'DESC')->take(4)->get();
        $actions = Action::where('status', TRUE)->orderBy('created_at', 'desc')->take(6)->get();
        $testimonials = Testimonial::where('status', TRUE)->orderBy('id', 'DESC')->take(9)->get();

        $about = About::find(1);
        $about_galleries = Archive::whereEntity('about_photos')->whereEntityId(1)->take(2)->inRandomOrder()->get();

        $count = (object) [];
        $count->students = Student::count();

        $programs = Program::where('status', TRUE)->orderBy('id', 'ASC')->get();


        $partners_1_1 = Partner::where('type', 1)->inRandomOrder()->where('status', TRUE)->count();
        $partners_1_1 = Partner::where('type', 1)->inRandomOrder()->where('status', TRUE)->take(20)->get();
        $not = [];
        foreach ($partners_1_1 as $key => $value) {
            $not[$key] = $value->getId();
        }

        $partners_1_2 = Partner::where('type', 1)->inRandomOrder()->where('status', TRUE)->whereNotIn('id', $not)->get();
        $partners_2 = Partner::where('type', 2)->where('status', TRUE)->get();

        $posts_instagram = PostsInstagram::where('status', TRUE)->take(3)->get();

        return view('frontend.pages.home.index', [
            'slides'        => $slides,
            'actions'       => $actions,
            'testimonials'  => $testimonials,
            'about'         => $about,
            'about_galleries' => $about_galleries,
            'count'         => $count,
            'programs'      => $programs,
            'partners_1_1'  => $partners_1_1,
            'partners_1_2'  => $partners_1_2,
            'partners_2'    => $partners_2,
            'posts_instagram'  => $posts_instagram,
        ]);
    }
}

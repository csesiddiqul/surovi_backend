<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\card;
use App\Models\demo_mod;
use App\Models\developInte;
use App\Models\documents;
use App\Models\Donations;
use App\Models\event;
use App\Models\importantLink;
use App\Models\jobApplication;
use App\Models\Menu;
use App\Models\mission;
use App\Models\news;
use App\Models\Notice;
use App\Models\page;
use App\Models\photo_gallery;
use App\Models\photo_group;
use App\Models\project;
use App\Models\Sdg;
use App\Models\service;
use App\Models\slider;
use App\Models\slogan;
use App\Models\UpdateNews;
use App\Models\videoGallery;
use App\Models\websiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Utils;

class PublicController extends Controller
{
    public function index()
    {

        $slider = slider::where('status', 1)->orderBy('priority', 'ASC')->get();
        $services = service::where('status', 1)->limit(3)->get();
        $notice = Notice::where('status', 1)->limit(10)->orderBy('priority', 'ASC')->get();
        $slogan = slogan::where('status', 1)->limit(1)->get();
        $card = card::where('status', 1)->limit(2)->orderBy('priority', 'ASC')->get();
        $news = news::where('status', 1)->limit(6)->orderBy('priority', 'ASC')->get();
        $event = event::where([['event_type', '=', 1], ['status', '=', 1]])->limit(6)->orderBy('priority', 'ASC')->get();
        $imlink = importantLink::where('status', 1)->limit(15)->orderBy('priority', 'ASC')->get();
        $photoin = photo_gallery::where('status', 1)->limit(3)->orderBy('priority', 'ASC')->get();
        $video = videoGallery::where('status', 1)->limit(3)->orderBy('priority', 'ASC')->get();
        $project = project::where('projectType', 1)->limit(6)->get();
        $updateNews = UpdateNews::where('status', 1)->limit(3)->get();


        return view('publice_page.index', compact('slider', 'services', 'notice', 'slogan', 'card', 'news', 'imlink', 'event', 'photoin', 'video', 'project', 'updateNews'));
    }


    public function donate_now()
    {
        $donations = Donations::where('status', 1)->orderBy('priority', 'ASC')->get();
        return view('publice_page.donate_now', compact('donations'));
    }

    public function donate($donate_id = null)
    {
        $account = Account::where('status', 1)->orderBy('priority', 'ASC')->get();
        $accountt = Account::where('status', 1)->orderBy('priority', 'ASC')->get();
        return view('publice_page.payment', compact('account', 'accountt', 'donate_id'));
    }




    public function all_notice($id)
    {
        $notice = Notice::find($id);
        //  $all_notice = Notice::where('id', '!=', $notice->id)->where('status', 1)->get();

        $all_notice = Notice::where([['id', '!=', $notice->id], ['status', 1]])->get();
        return view('publice_page.all_notice', compact('notice', 'all_notice'));
    }





    public function eventlist()
    {
        $results = event::all();

        return view('publice_page.event', compact('results'));
    }
    public function impactStories()
    {

        //3 is impact story
        $results = event::where('event_type', '=', 3)->get();

        return view('publice_page.impactStories', compact('results'));
    }


    public function sdgTarget()
    {
        $results = Sdg::orderBy('priority', 'asc')->get();

        return view('publice_page.sdg_target', compact('results'));
    }

    public function singaleEvent($id)
    {
        $event = event::find($id);

        return view('publice_page.event_page', compact('event'));
    }
    public function impactStoriesDetail($id)
    {
        $event = event::find($id);

        return view('publice_page.impactStoriesDetail', compact('event'));
    }


    public function singaleProject($id)
    {
        $project = project::find($id);

        return view('publice_page.project_page', compact('project'));
    }



    public function singalePhoto($id)
    {
        $result = photo_gallery::find($id);

        return view('publice_page.photo_page', compact('result'));
    }


    public function singalegroup($id)
    {


        $photoga = photo_gallery::where([['group_id', '=', $id], ['status', 1]])->get();

        return view('publice_page.singale_group', compact('photoga'));
    }

    public function singaleCard($id)
    {
        $result = card::find($id);

        return view('publice_page.card_page', compact('result'));
    }



    public function singaleVideo($id)
    {
        $result = videoGallery::find($id);

        return view('publice_page.video_page', compact('result'));
    }

    public function singaleNews($id)
    {
        $news = news::find($id);

        return view('publice_page.singaleNews', compact('news'));
    }

    public function photo_gallery()
    {



        $photo_groups = photo_group::all();

        //        foreach ($photo_groups as $picid){
        //             $myid =  $picid->id;
        //            $photoga = photo_gallery::where([['group_id', '=', $myid],['status', 1]])->first();
        //        }


        $photoga = photo_gallery::all();



        return view('publice_page.photo_gallery', compact('photoga', 'photo_groups'));
    }





    public function development()
    {
        $devlopment = developInte::where('status', 1)->get();
        return view('publice_page.development_intervention', compact('devlopment'));
    }

    public function mission()
    {
        $devlopment = mission::where('status', 1)->get();
        return view('publice_page.mission_vision', compact('devlopment'));
    }


    public function mail_send(Request $request)
    {
        /**     Mail::send('email.sendMail', ['request' => $request], function ($m) use ($request) {
            $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $m->to('labibkg@gmail.com')->subject('GET IN TOUCH');
        });
        return 1;
         **/
    }

    public function video_gallery()
    {



        $videoga = videoGallery::where('status', 1)->get();

        return view('publice_page.video_gallery', compact('videoga'));
    }


    public function welcome()
    {

        $slogandata = slogan::first();

        return view('publice_page.welcome', compact('slogandata'));
    }




    public function ongoing()
    {


        $ongoing = project::where('projectType', 1)->get();
        return view('publice_page.ongoing_project', compact('ongoing'));
    }

    public function complate()
    {

        $complate = project::where('projectType', 2)->get();
        return view('publice_page.complate_project', compact('complate'));
    }


    public function subfolder()
    {
        return view('publice_page.subfolder-img');
    }


    public function educations()
    {
        return view('publice_page.educations');
    }

    public function earlyChildhood()
    {
        return view('publice_page.earlyChildhoodCareDevelopment');
    }


    public function job_applicaton()
    {
        $jobApp = jobApplication::where('status', 1)->get();
        return view('publice_page.job_applicaton', compact('jobApp'));
    }

    public function pubDocuments()
    {
        $results = documents::where('status', 1)->get();
        return view('publice_page.documents', compact('results'));
    }



    public function contact()
    {
        $results = websiteSetting::first();
        return view('publice_page.contact', compact('results'));
    }


    public function noticelist()
    {
        $results = Notice::all();

        return view('publice_page.notice', compact('results'));
    }

    public function Committeelist()
    {
        $results = card::all();

        return view('publice_page.committee', compact('results'));
    }





    public function newslist()
    {
        $results = news::all();

        return view('publice_page.newslist', compact('results'));
    }

    public function pages($slug)
    {


        $slg = Menu::where('slug', $slug)->first();

        $id = $slg->id;



        $page = page::find($id);

        if (empty($page)) {
            return 'plase crate a page';
        }

        return view('publice_page.demo', compact('page', 'slg'));
    }
}

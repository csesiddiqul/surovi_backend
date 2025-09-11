<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Achievement;
use App\Models\AdvisoryCommittee;
use App\Models\card;
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

class PublicController extends Controller
{

    public function index2()
    {
        $sliders = Slider::select('id', 'title', 'url', 'priority')
            ->where('status', 1)
            ->orderBy('priority')
            ->get();


        $achievements = Achievement::select('id', 'title', 'img', 'description', 'Priority')
            ->where('status', 1)
            ->orderBy('Priority')
            ->limit(3)
            ->get();

        $advisoryCommittees = AdvisoryCommittee::select('id','img','title','designation','Priority')
        ->where('status', 1)
        ->orderBy('Priority')
        ->limit(8)
        ->get();

        $services = Service::select('id', 'title', 'icon', 'description')
            ->where('status', 1)
            ->limit(3)
            ->get();

        $notice = Notice::select('id', 'title', 'priority')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(10)
            ->get();

        $slogan = Slogan::select('id', 'file', 'slogan', 'status')
            ->where('status', 1)
            ->first();

        $cards = Card::select('id', 'name', 'description', 'img','position', 'mobile', 'email')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(7)
            ->get();

        $news = News::select('id', 'title', 'img', 'priority')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(6)
            ->get();

        $event = Event::select('id', 'title', 'img', 'priority')
            ->where('status', 1)
            ->where('event_type', 1)
            ->orderBy('priority')
            ->limit(6)
            ->get();

        $imlink = ImportantLink::select('id', 'title', 'url', 'priority')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(15)
            ->get();

        $photoin = photo_gallery::select('id', 'title', 'img', 'priority', 'group_id')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(3)
            ->get();

        $video = VideoGallery::select('id', 'title', 'video', 'priority')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(3)
            ->get();

         $projects = Project::select('id', 'title', 'img','location_data')
            ->where('projectType', 1)
            ->limit(6)
            ->get();

        $updateNews = UpdateNews::select('id', 'news', 'Priority', 'created_at')
            ->where('status', 1)
            ->limit(3)
            ->get();



        $ourWorks = Menu::with('getPage')
            ->where('prantsId', '=', 71)
            ->select('id', 'name', 'slug')
            ->where('status', '=', 1)
            ->orderBy('priority')
            ->limit(value: 4)
            ->get()
            ->map(function ($menu) {
                return [
                    'name' => $menu->name,
                    'slug' => $menu->slug,
                    'description' => $menu->getPage ? $menu->getPage->description : null,
                ];
            });;


        return view("public.index", compact(
            'sliders',
            'ourWorks',
            'achievements',
            'advisoryCommittees',
            'projects',
            'services',
            'notice',
            'slogan',
            'cards',
            'news',
            'event',
            'imlink',
            'photoin',
            'video',
            'updateNews'
        ));
    }



    public function achievementList(Request $request)
    {
        $query = Achievement::select('id', 'title', 'img', 'description', 'Priority')
            ->where('status', 1);

        // Search handle
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $achievements = $query->orderBy('Priority')
            ->paginate(8);

        return view('public.page.achievementList', compact('achievements'));
    }

    public function achievementDetails($id)
    {
        $achievement = Achievement::where('id', $id)->select('id', 'title', 'img', 'description', 'Priority')
            ->where('status', 1)
            ->first();

        $achievements = Achievement::where('id', '!=', $id)->select('id', 'title', 'img', 'description', 'Priority')
            ->where('status', 1)
            ->orderBy('Priority')
            ->limit(3)
            ->get();

        return view('public.page.achievementDetails', compact('achievement', 'achievements'));
    }




    public function index()
    {

        $slider = slider::where('status', 1)->orderBy('priority', 'ASC')->get();
        $services = service::where('status', 1)->limit(3)->get();
        $notice = Notice::where('status', 1)->limit(10)->orderBy('priority', 'ASC')->get();
        $slogan = Slogan::select('id', 'file', 'slogan', 'status')
            ->where('status', 1)
            ->first();
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


    public function ongoingProject(Request $request)
    {

        $query = project::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('img', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%");
                });
        }
        $projects = $query->where('status',1)->orderBy('created_at', 'DESC')->paginate(10);

        return view('public.page.ongoingProject', compact('projects'));
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

    public function Committeelist(Request $request)
    {
        $query = card::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('img', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                });
        }
        $cards = $query->where('status',1)->orderBy('created_at', 'DESC')->paginate(10);

        return view('public.page.committeeList', compact('cards'));
    }

    public function advisoryBoard(Request $request)
    {
        $query = advisoryCommittee::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('img', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%")
                        ->orWhere('designation', 'like', "%{$search}%");
                });
        }
        $advisoryCommittees = $query->where('status',1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('public.page.advisoryBoard', compact('advisoryCommittees'));
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
            return 'please crate a page';
        }
        return view('public.page.page', compact('page', 'slg'));
    }
}

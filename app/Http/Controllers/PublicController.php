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
use App\Models\SponsorChild;
use App\Models\SuccessStory;
use App\Models\UpdateNews;
use App\Models\videoGallery;
use App\Models\websiteSetting;
use Illuminate\Console\Scheduling\Event as SchedulingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event as FacadesEvent;
use PhpParser\Node\Stmt\Return_;

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

        $succesStorys = SuccessStory::select('id', 'img', 'title', 'description', 'Priority')
            ->where('status', 1)
            ->orderBy('Priority')
            ->limit(4)
            ->get();

        $advisoryCommittees = AdvisoryCommittee::select('id', 'img', 'title', 'designation', 'Priority')
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

        $cards = Card::select('id', 'name', 'description', 'img', 'position', 'mobile', 'email')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(7)
            ->get();

        $news = News::select('id', 'title', 'img', 'priority')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(6)
            ->get();

        $events = Event::select('id', 'title', 'img', 'priority')
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

        $video = VideoGallery::select('id', 'title', 'video', 'description', 'priority')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(3)
            ->get();

        $projects = Project::select('id', 'title', 'img', 'location_data')
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
            ->where('menu_type', '=', 2)
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
            'succesStorys',
            'ourWorks',
            'achievements',
            'advisoryCommittees',
            'projects',
            'services',
            'notice',
            'slogan',
            'cards',
            'news',
            'events',
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

    public function succesStory(Request $request)
    {
        $query = SuccessStory::select('id', 'img', 'title', 'description', 'Priority')
            ->where('status', 1);

        // Search handle
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('img', 'LIKE', "%{$search}%")
                    ->orWhere('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $succesStorys = $query->orderBy('Priority')
            ->paginate(8);

        return view('public.page.succesStory', compact('succesStorys'));
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
        return view('public.page.donate_now', compact('donations'));
    }

    public function publicDonate($donate_id = null, $type = null)
    {
        $selectedDonation = Donations::where('id', $donate_id)->where('status', 1)->orderBy('priority', 'ASC')->first();
        $donations = Donations::where('status', 1)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('public.page.donation-form', compact('donations', 'donate_id', 'selectedDonation'));
    }


    public function searchChild(Request $request)
    {
        $query = $request->get('query', '');
        $sponsorChild = SponsorChild::where('name', 'like', "%{$query}%")
            ->orWhere('phone_number', 'like', "%{$query}%")
            ->get(['id', 'name', 'phone_number', 'img']);
        return response()->json($sponsorChild);
    }


    public function donate($donate_id = null)
    {
        $account = Account::where('status', 1)->orderBy('priority', 'ASC')->get();
        $accountt = Account::where('status', 1)->orderBy('priority', 'ASC')->get();
        // public.page.donate_now
        return view('public.page.payment', compact('account', 'accountt', 'donate_id'));
    }






    public function all_notice($id)
    {
        $notice = Notice::find($id);
        //  $all_notice = Notice::where('id', '!=', $notice->id)->where('status', 1)->get();

        $all_notice = Notice::where([['id', '!=', $notice->id], ['status', 1]])->get();
        return view('publice_page.all_notice', compact('notice', 'all_notice'));
    }





    public function eventlist(Request $request)
    {
        $query = event::select('id', 'img', 'title', 'Priority')
            ->where('status', 1);

        // Search handle
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('img', 'LIKE', "%{$search}%")
                    ->orWhere('title', 'LIKE', "%{$search}%");
            });
        }

        $events = $query->orderBy('Priority')->paginate(8);
        return view('public.page.eventList', compact('events'));
    }
    public function impactStories()
    {
        $results = event::where('event_type', '=', 3)->get();
        return view('publice_page.impactStories', compact('results'));
    }


    public function sdgTarget()
    {
        $results = Sdg::orderBy('priority', 'asc')->get();
        return view('publice_page.sdg_target', compact('results'));
    }

    public function eventDetails($id)
    {
        $event = event::find($id);
        return view('public.page.eventDetails', compact('event'));
    }
    public function successDetails($id){

        $succesStory = SuccessStory::find($id);
        return view('public.page.successDetails', compact('succesStory'));
    }
    public function impactStoriesDetail($id)
    {
        $event = event::find($id);
        return view('publice_page.impactStoriesDetail', compact('event'));
    }


    public function projectDetails($id)
    {
        $project = project::find($id);
        return view('public.page.projectDetails', compact('project'));
    }

    public function complateDetails($id){
        $complates = project::find($id);
        return view('public.page.complateDetails', compact('complates'));
    }

    public function photoDetails($id)
    {
        $photoga = photo_gallery::find($id);
        return view('public.page.photoDetails', compact('photoga'));
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

    public function videoDetails($id)
    {
        $videogas = videoGallery::find($id);
        return view('public.page.videoDetails', compact('videogas'));
    }

    public function singaleNews($id)
    {
        $news = news::find($id);
        return view('publice_page.singaleNews', compact('news'));
    }

    public function photo_gallery(Request $request)
    {
        $photo_groups = photo_group::all();

       $query = photo_gallery::select('id', 'img', 'title', 'description', 'Priority')
            ->where('status', 1);

        // Search handle
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('img', 'LIKE', "%{$search}%")
                    ->orWhere('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $photogas = $query->orderBy('Priority')
            ->paginate(10);

        return view('public.page.photoGallery', compact('photogas', 'photo_groups'));
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

    public function video_gallery(Request $request)
    {
        $query = videoGallery::select('id', 'title', 'video', 'description', 'Priority')
            ->where('status', 1);

        // Search handle
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('video', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $videogas = $query->orderBy('Priority')->paginate(10);
        return view('public.page.videoList', compact('videogas'));
    }


    public function welcome()
    {
        $slogandata = slogan::first();
        return view('publice_page.welcome', compact('slogandata'));
    }
    public function publication(Request $request, $slug = null)
    {
        $query = documents::select('id', 'title', 'date', 'file', 'type', 'Priority')
            ->where('status', 1);

        if ($slug) {
            $query->where('type', $slug);
        }

        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->orWhere('date', 'LIKE', "%{$search}%");
            });
        }

        $results = $query->orderBy('Priority')->paginate(10);

        return view('public.page.publication', compact('results'));
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

    public function complate(Request $request)
    {

        $query = project::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('img', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%");
                });
        }
        $complates = $query->where('status',1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('public.page.complateProject', compact('complates'));
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


    public function noticeAll(Request $request)
    {
         $query = jobApplication::where('status', 1);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('Type', 'LIKE', "%{$search}%");

            });
        }
         $jobApps = $query->orderBy('created_at')->paginate(8);
        return view('public.page.noticeAll', compact('jobApps'));
    }

    public function noticeAllDetails(){

        $jobApps = jobApplication::find();
        return view('public.page.noticeAllDetails', compact('jobApps'));
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
        $cards = $query->where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);

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
        $advisoryCommittees = $query->where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
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

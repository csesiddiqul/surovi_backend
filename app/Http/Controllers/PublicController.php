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

    public function index()
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


        $noticeBoard = Notice::where('status', 1)->orderBy('created_at', 'desc')->limit('2')->get();

        $donations = Donations::where('status', 1)->orderBy('priority', 'ASC')->inRandomOrder()->limit(3)->get();


        return view("public.index", compact(
            'sliders',
            'succesStorys',
            'ourWorks',
            'achievements',
            'advisoryCommittees',
            'projects',
            'services',
            'noticeBoard',
            'donations',
            'slogan',
            'cards',
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


    public function evenNews(Request $request)
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
        return view('public.page.evenNews', compact('events'));
    }


    public function eventDetail($id)
    {
        $event = event::find($id);
        return view('public.page.eventDetails', compact('event'));
    }



    public function successDetails($id)
    {

        $succesStory = SuccessStory::find($id);
        return view('public.page.successDetails', compact('succesStory'));
    }


    public function projectDetails($id)
    {
        $project = project::find($id);
        return view('public.page.projectDetails', compact('project'));
    }

    public function completeDetails($id)
    {
        $complates = project::find($id);
        return view('public.page.complateDetails', compact('complates'));
    }

    public function photoDetails($id)
    {
        $photoga = photo_gallery::find($id);
        return view('public.page.photoDetails', compact('photoga'));
    }





    public function videoDetails($id)
    {
        $videogas = videoGallery::find($id);
        return view('public.page.videoDetails', compact('videogas'));
    }

    public function photo_group(Request $request)
    {

        $query = photo_group::select('id', 'img', 'group_name',  'Priority')
            ->where('status', 1);

        // Search handle
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('img', 'LIKE', "%{$search}%")
                    ->orWhere('group_name', 'LIKE', "%{$search}%");
            });
        }

        $photogas = $query->orderBy('Priority')
            ->paginate(10);

        return view('public.page.photoGroup', compact('photogas'));
    }

    public function photo_gallery(Request $request, $id)
    {

        $albumName = photo_group::where('id', $id)->select('id', 'img', 'group_name')->first();

        $query = photo_gallery::where('group_id', $id)->select('id', 'img', 'title', 'description', 'Priority')
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

        return view('public.page.photoGallery', compact('photogas','albumName'));
    }



    public function mission()
    {
        $devlopment = mission::where('status', 1)->get();
        return view('public.page.mission-vision', compact('devlopment'));
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
        $projects = $query->where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);

        return view('public.page.ongoingProject', compact('projects'));
    }

    public function complete(Request $request)
    {

        $query = project::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('img', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            });
        }
        $complates = $query->where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('public.page.complateProject', compact('complates'));
    }







    public function noticeAll(Request $request)
    {
        $query = Notice::where('status', 1);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('Type', 'LIKE', "%{$search}%");
            });
        }
        $jobApps = $query->orderBy('created_at', 'desc')->paginate(8);
        return view('public.page.noticeAll', compact('jobApps'));
    }




    public function contact()
    {
        $results = websiteSetting::first();
        return view('public.page.contact', compact('results'));
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\SdgController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\backend\AccountController;
use App\Http\Controllers\backend\DonateinfoController;
use App\Http\Controllers\backend\DonationsController;
use App\Http\Controllers\SslCommerzPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/', [PublicController::class, 'index2'])->name('index');
Route::get('pages/{slug}', [PublicController::class, 'pages'])->name('pages');

// Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/development', [PublicController::class, 'development'])->name('development');
Route::get('/advisory-board', [PublicController::class, 'advisoryBoard'])->name('advisoryBoard');
Route::get('/success-story', [PublicController::class, 'succesStory'])->name('succesStory');
Route::get('/publication/{type?}', [PublicController::class, 'publication'])->name('publication');
Route::get('/even-news', [PublicController::class, 'evenNews'])->name('evenNews');
Route::get('/mission', [PublicController::class, 'mission'])->name('mission');
Route::post('/send_email', [contactController::class, 'sendEmail'])->name('send.email');
Route::get('/ongoing', [PublicController::class, 'ongoingProject'])->name('ongoing');
Route::get('/complate', [PublicController::class, 'complate'])->name('complate');
Route::get('/subfolder', [PublicController::class, 'subfolder'])->name('subfolder');
Route::get('/educations', [PublicController::class, 'educations'])->name('educations');
Route::get('/earlyChildhood', [PublicController::class, 'earlyChildhood'])->name('earlyChildhood');
Route::get('/notice-all', [PublicController::class, 'noticeAll'])->name('noticeAll');
Route::get('photo_gallery', [PublicController::class, 'photo_gallery'])->name('photo_gallery');
Route::get('video_gallery', [PublicController::class, 'video_gallery'])->name('videoGallery');
Route::get('welcome', [PublicController::class, 'welcome'])->name('welcome');

Route::get('all_notice/{notice_id}', [PublicController::class, 'all_notice'])->name('all_notice');
Route::get('event-details/{event_id}', [PublicController::class, 'eventDetails'])->name('eventDetails');
Route::get('event-details/{event_id}', [PublicController::class, 'noticeAllDetails'])->name('noticeAllDetails');
Route::get('success-details/{success_id}', [PublicController::class, 'successDetails'])->name('successDetails');
Route::get('photo-details/{photo_id}', [PublicController::class, 'photoDetails'])->name('photoDetails');
Route::get('complate-details/{complate_id}', [PublicController::class, 'complateDetails'])->name('complateDetails');
Route::get('singalegroup/{group_id}', [PublicController::class, 'singalegroup'])->name('singalegroup');
Route::get('video-details/{video_id}', [PublicController::class, 'videoDetails'])->name('videoDetails');
Route::get('singaleCard/{id}', [PublicController::class, 'singaleCard'])->name('singaleCard');
Route::get('singaleNews/{news_id}', [PublicController::class, 'singaleNews'])->name('singaleNews');
Route::get('going-project/{pro_id}', [PublicController::class, 'projectDetails'])->name('projectDetails');
Route::get('contact', [PublicController::class, 'contact'])->name('contact');
Route::get('noticelist', [PublicController::class, 'noticelist'])->name('noticelist');
Route::get('Committeelist', [PublicController::class, 'Committeelist'])->name('Committeelist');
Route::get('eventlist', [PublicController::class, 'eventlist'])->name(name: 'eventlist');

Route::get('impact-stories', [PublicController::class, 'impactStories'])->name(name: 'impact.stories');
Route::get('impact-stories-detail/{event_id}', [PublicController::class, 'impactStoriesDetail'])->name('impact.stories.detail');

Route::get('sdg-target', [PublicController::class, 'sdgTarget'])->name('sdg-target');
Route::get('newslist', [PublicController::class, 'newslist'])->name('newslist');
Route::get('pubDocuments', action: [PublicController::class, 'pubDocuments'])->name('pubDocuments');
Route::get('donate-now', [PublicController::class, 'donate_now'])->name('donate_now');
Route::get('public-donate/{id}/{type}', [PublicController::class, 'publicDonate'])->name('pub.donate');
// api.php
Route::get('sponsor-child/search', [PublicController::class, 'searchChild'])->name('sponsor.child.search');


// Route::get('public-donate/{id}', [PublicController::class, 'donate'])->name('pub.donate');

Route::get('achievement-list', [PublicController::class, 'achievementList'])->name('achievement-list');
Route::get('achievement-details/{id?}', [PublicController::class, 'achievementDetails'])->name('achievement-details');

//sslcommerz

Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('slider', \App\Http\Controllers\SliderController::class);
    Route::resource('achievement', \App\Http\Controllers\AchievementController::class);
    Route::resource('advisoryCommittee', \App\Http\Controllers\AdvisorycommitteeController::class);
    Route::resource('succesStory', \App\Http\Controllers\SuccessStoryController::class);

    Route::resource('sponsorChild', \App\Http\Controllers\SponsorChildController::class);
    Route::resource('photogroup', \App\Http\Controllers\PhotoGroupController::class);
    Route::resource('notice', \App\Http\Controllers\NoticeController::class);
    Route::resource('service', \App\Http\Controllers\ServiceController::class);
    Route::resource('slogan', \App\Http\Controllers\SloganController::class);
    Route::resource('card', \App\Http\Controllers\CardController::class);
    Route::resource('importantLink', \App\Http\Controllers\ImportantLinkController::class);
    Route::resource('event', \App\Http\Controllers\EventController::class);
    Route::resource('websetting', \App\Http\Controllers\WebsiteSettingController::class);
    Route::resource('manu', \App\Http\Controllers\MenuController::class);
    Route::resource('page', \App\Http\Controllers\PageController::class);
    Route::resource('photo_admin', \App\Http\Controllers\PhotoGalleryController::class);
    Route::resource('videogal', \App\Http\Controllers\VideoGalleryController::class);
    Route::resource('developinter', \App\Http\Controllers\DevelopInteController::class);
    Route::resource('missionVision', \App\Http\Controllers\MissionController::class);
    Route::resource('JobApplication', \App\Http\Controllers\JobApplicationController::class);
    Route::resource('project', \App\Http\Controllers\ProjectController::class);
    Route::resource('updateNews', \App\Http\Controllers\UpdateNewsController::class);
    Route::resource('documents', \App\Http\Controllers\DocumentsController::class);

    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::resource('sdg', SdgController::class);

    Route::resource('/account', AccountController::class);
    Route::resource('/donations', DonationsController::class);
    Route::resource('donate_info', DonateinfoController::class);

    Route::get('payments', [SslCommerzPaymentController::class, 'payment'])->name('payments');
});

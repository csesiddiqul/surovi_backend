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

Route::get('/', [PublicController::class, 'index'])->name('index');

Route::get('achievement-list', [PublicController::class, 'achievementList'])->name('achievement-list');
Route::get('achievement-details/{id?}', [PublicController::class, 'achievementDetails'])->name('achievement-details');

Route::get('mission-vision', [PublicController::class, 'mission'])->name('mission');

Route::get('pages/{slug}', [PublicController::class, 'pages'])->name('pages');
Route::get('advisory-board', [PublicController::class, 'advisoryBoard'])->name('advisoryBoard');

Route::get('committee-list', [PublicController::class, 'Committeelist'])->name('Committeelist');

Route::get('success-story', [PublicController::class, 'succesStory'])->name('succesStory');
Route::get('success-details/{success_id}', [PublicController::class, 'successDetails'])->name('successDetails');

Route::get('ongoing', [PublicController::class, 'ongoingProject'])->name('ongoing');
Route::get('on-going-project/{pro_id}', [PublicController::class, 'projectDetails'])->name('projectDetails');

Route::get('complete', [PublicController::class, 'complete'])->name('complete');
Route::get('complete-details/{complete}', [PublicController::class, 'completeDetails'])->name('completeDetails');

Route::get('photo-group', [PublicController::class, 'photo_group'])->name('photo_group');
Route::get('photo-gallery/{album_id?}', [PublicController::class, 'photo_gallery'])->name('photo_gallery');
Route::get('photo-details/{photo_id}', [PublicController::class, 'photoDetails'])->name('photoDetails');

Route::get('video-gallery', [PublicController::class, 'video_gallery'])->name('videoGallery');
Route::get('video-details/{video_id}', [PublicController::class, 'videoDetails'])->name('videoDetails');

Route::get('event-news', [PublicController::class, 'evenNews'])->name('evenNews');
Route::get('even-news-details/{id}', [PublicController::class, 'eventDetail'])->name('eventDetail');

Route::get('publication/{type?}', [PublicController::class, 'publication'])->name('publication');
Route::get('notice-board', [PublicController::class, 'noticeAll'])->name('noticeBoard');





Route::post('/send_email', [contactController::class, 'sendEmail'])->name('send.email');
Route::get('contact', [PublicController::class, 'contact'])->name('contact');
Route::get('welcome', [PublicController::class, 'welcome'])->name('welcome');


Route::get('donate-now', [PublicController::class, 'donate_now'])->name('donate_now');
Route::get('public-donate/{id}/{type}', [PublicController::class, 'publicDonate'])->name('pub.donate');
// api.php
Route::get('sponsor-child/search', [PublicController::class, 'searchChild'])->name('sponsor.child.search');
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


    Route::resource('project', \App\Http\Controllers\ProjectController::class);
    Route::resource('updateNews', \App\Http\Controllers\UpdateNewsController::class);
    Route::resource('documents', \App\Http\Controllers\DocumentsController::class);

    Route::resource('donations', DonationsController::class);
    Route::get('payments', [SslCommerzPaymentController::class, 'payment'])->name('payments');
});

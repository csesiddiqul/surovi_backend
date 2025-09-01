<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[PublicController::class,'index'])->name('index');



Route::get('/development', [PublicController::class, 'development'])->name('development');

Route::get('/mission', [PublicController::class, 'mission'])->name('mission');


Route::get('/ongoing', [PublicController::class, 'ongoing'])->name('ongoing');


Route::get('/complate', [PublicController::class, 'complate'])->name('complate');

Route::get('/subfolder', [PublicController::class, 'subfolder'])->name('subfolder');

Route::get('/educations',[PublicController::class,'educations'])->name('educations');

Route::get('/earlyChildhood',[PublicController::class,'earlyChildhood'])->name('earlyChildhood');

Route::get('/job_application',[PublicController::class,'job_applicaton'])->name('job_applicaton');

Route::get('photo_gallery',[PublicController::class,'photo_gallery'])->name('photo_gallery');

Route::get('video_gallery',[PublicController::class,'video_gallery'])->name('video_gallery');

Route::get('pages/{slug}',[PublicController::class,'pages'])->name('pages');

Route::get('all_notice/{notice_id}',[PublicController::class,'all_notice'])->name('all_notice');


Route::get('singaleEvent/{event_id}',[PublicController::class,'singaleEvent'])->name('singaleEvent');

Route::get('singalePhoto/{photo_id}',[PublicController::class,'singalePhoto'])->name('singalePhoto');

Route::get('singaleVideo/{video_id}',[PublicController::class,'singaleVideo'])->name('singaleVideo');

Route::get('singaleCard/{video_id}',[PublicController::class,'singaleCard'])->name('singaleCard');

Route::get('singaleNews/{news_id}',[PublicController::class,'singaleNews'])->name('singaleNews');

Route::get('contact',[PublicController::class,'contact'])->name('contact');

Route::resource('notice',\App\Http\Controllers\NoticeController::class);

Route::resource('service',\App\Http\Controllers\ServiceController::class);

Route::resource('slider',\App\Http\Controllers\SliderController::class);

Route::resource('slogan',\App\Http\Controllers\SloganController::class);



Route::resource('card',\App\Http\Controllers\CardController::class);
Route::resource('news',\App\Http\Controllers\NewsController::class);
Route::resource('importanLink',\App\Http\Controllers\ImportantLinkController::class);

Route::resource('event',\App\Http\Controllers\EventController::class);

Route::resource('websetting',\App\Http\Controllers\WebsiteSettingController::class);

Route::resource('manu',\App\Http\Controllers\MenuController::class);

Route::resource('page',\App\Http\Controllers\PageController::class);

Route::resource('photo_admin',\App\Http\Controllers\PhotoGalleryController::class);

Route::resource('videogal',\App\Http\Controllers\VideoGalleryController::class);
Route::resource('developinter',\App\Http\Controllers\DevelopInteController::class);

Route::resource('missionVision',\App\Http\Controllers\MissionController::class);
Route::resource('JobApplication',\App\Http\Controllers\JobApplicationController::class);

Route::resource('project',\App\Http\Controllers\ProjectController::class);

<?php


use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get("/","FrontController@front")->name("/");
Route::get("year_by_show/{id}","FrontController@year_by_show")->name("year_by_show");
Route::get("year_by_show_details/{id}","FrontController@year_by_show_details")->name("year_by_show_details");
Route::get('download/{id}','ArchiveController@download')->name('download');


Route::get("trainers", "FrontController@trainer")->name("trainers");
Route::get("board-of-directors", "FrontController@boardOfDirectors")->name("board-of-directors");
Route::get("board-of-editors", "FrontController@boardOfEditors")->name("board-of-editors");
Route::get("reviewers", "FrontController@reviewers")->name("reviewers");
Route::get("managing-editor", "FrontController@consltants")->name("consltants");
Route::get("publication-place", "FrontController@publication_place")->name("publication_place");
Route::get("workshops","FrontController@workshops")->name("workshops");
Route::get("workshop-details/{id}", "FrontController@workshopDetails")->name("workshop-details");
Route::get("seminars","FrontController@seminars")->name("seminars");
Route::get("seminars-details/{id}", "FrontController@seminarsDetails")->name("seminars-details");
Route::get("confarences","FrontController@confarences")->name("confarences");
Route::get("confarences-details/{id}", "FrontController@confarencesDetails")->name("confarences-details");
Route::get("trainings","FrontController@trainings")->name("trainings");
Route::get("trainings-details/{id}", "FrontController@trainingsDetails")->name("trainings-details");
Route::get("contacts","FrontController@contacts")->name("contacts");
Route::get("aboutus","FrontController@aboutus")->name("aboutus");
Route::get("callforpapers","FrontController@callforpapers")->name("callforpapers");
Route::get("submissionguidelines","FrontController@submissionglines")->name("submissionglines");
Route::get("submissionsteps","FrontController@submissionsteps")->name("submissionsteps");
Route::get("template","FrontController@template")->name("template");
Route::get("payment","FrontController@payment")->name("payment");






Auth::routes();

Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', 'HomeController@index')->name('home');

    //slider segment
    Route::resource('slider', 'sliderController');
    Route::get('slider_delete/{id}','sliderController@destroy')->name("sllider_delete");

    // trainer segment
    Route::resource('trainer', 'TrainerController');
    Route::get('delet_trainer/{id}', 'TrainerController@destroy')->name("sllider_delete");


    // course list segment
    Route::resource('courselist', 'courselistController');
    Route::get('delet_trainer/{id}', 'TrainerController@destroy')->name("sllider_delete");

    //director segment

    Route::resource('director', 'directorConatroller');
    Route::get('delet_director/{id}', 'directorConatroller@destroy')->name("delet_director");

    Route::resource('editor', 'editorConatroller');
    Route::get('delet_editor/{id}', 'editorConatroller@destroy')->name("delet_editor");


    //reviewer segment

    Route::resource('reviewer', 'reviewerController');
    Route::get('delet_reviewer/{id}', 'reviewerController@destroy')->name("delet_reviewer");
    //consaltans segment

    Route::resource('consaltans', 'consultansController');
    Route::get('delet_consultans/{id}', 'consultansController@destroy')->name("delet_consultans");


    //workshop segment

    Route::resource('workshop', 'workshopController');
    Route::get('delet_workshop/{id}', 'workshopController@destroy')->name("delet_workshop");

    //seminar segment

    Route::resource('seminar', 'seminarController');
    Route::get('delet_seminar/{id}', 'seminarController@destroy')->name("delet_seminar");



    //confarence segment
    Route::resource('confarence', 'confarenceController');
    Route::get('delet_confarence/{id}', 'confarenceController@destroy')->name("delet_confarence");

    //traning segment
    Route::resource('traning', 'traningController');
    Route::get('delet_traning/{id}', 'traningController@destroy')->name("delet_traning");

    //years segment
    Route::get('years', 'YearsController@index')->name('years');
    Route::post('save_years', 'YearsController@save_years')->name('save_years');
    // Route::get('delet_traning/{id}', 'traningController@destroy')->name("delet_traning");

    // month segment
    Route::get('month_view','MonthController@index')->name('month_view');
    Route::post('save_month','MonthController@save_month')->name('save_month');
    Route::get('edit_month/{id}','MonthController@edit_month')->name('edit_month');
    Route::post('update_month','MonthController@update_month')->name('update_month');


    //archive segment
    Route::get('archive_view','ArchiveController@archive_view')->name('archive_view');
    Route::post('save_archive','ArchiveController@save_archive')->name('save_archive');
    Route::get('archive_list','ArchiveController@archive_list')->name('archive_list');
    // Route::get('download/{id}','ArchiveController@download')->name('download');
    Route::get('archive_edit/{id}','ArchiveController@archive_edit')->name('archive_edit');
    Route::post('update_archive/','ArchiveController@update_archive')->name('update_archive');


});

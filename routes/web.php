<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\CoverLetterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BusinessNameController;
use App\Http\Controllers\ProductDescriptionController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\BusinessIdeaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CourseOutlineController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductNameController;
use App\Http\Controllers\PresentationTBSController;
use App\Http\Controllers\LectureSummarizerController;




Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/resume', [ResumeController::class, 'showForm'])->name('resume.form');
Route::post('/resume/generate', [ResumeController::class, 'generate'])->name('resume.generate');

Route::get('/resume/download', [ResumeController::class, 'downloadPDF'])->name('resume.download');



Route::get('/cover-letter', [CoverLetterController::class, 'showForm'])->name('cover.form');
Route::post('/cover-letter/generate', [CoverLetterController::class, 'generate'])->name('cover.generate');

Route::get('/cover-letter/pdf', [CoverLetterController::class, 'downloadPDF'])->name('coverLetter.pdf');

Route::get('/blog-form', [BlogController::class, 'showForm'])->name('blog.form');
Route::post('/blog-generate', [BlogController::class, 'generateBlog'])->name('blog.generate');

Route::get('/blog/download-pdf', [BlogController::class, 'downloadPDF'])->name('blog.downloadPDF');


Route::get('/business-name', [BusinessNameController::class, 'showForm'])->name('business.form');
Route::post('/business-name-generate', [BusinessNameController::class, 'generate'])->name('business.generate');


// product description routes
Route::get('/product-description', [ProductDescriptionController::class, 'showForm'])->name('product.description.form');
Route::post('/product-description/generate', [ProductDescriptionController::class, 'generate'])->name('product.description.generate');


// proposal routes
Route::get('/proposal', [ProposalController::class, 'showForm'])->name('proposal.form');
Route::post('/proposal/generate', [ProposalController::class, 'generate'])->name('proposal.generate');


// business idea
Route::get('/business-idea', [BusinessIdeaController::class, 'showForm'])->name('business.idea.form');
Route::post('/business-idea/generate', [BusinessIdeaController::class, 'generate'])->name('business.idea.generate');


//  Email generator route
Route::get('/email-generator', [EmailController::class, 'showForm'])->name('email.form');
Route::post('/email-generator', [EmailController::class, 'generate'])->name('email.generate');

//  Course Outline routes
Route::get('/course-outline', [CourseOutlineController::class, 'showForm'])->name('course.form');
Route::post('/course-outline', [CourseOutlineController::class, 'generateOutline'])->name('course.generate');
Route::get('/course-outline/download', [CourseOutlineController::class, 'downloadPDF'])->name('course.download');



// Article Generator Routes

Route::get('/article-generator', [ArticleController::class, 'showForm'])->name('article.form');
Route::post('/article-generator', [ArticleController::class, 'generateArticle'])->name('article.generate');
Route::get('/article-generator/download', [ArticleController::class, 'downloadPDF'])->name('article.download');




Route::get('/agenda-generator', [AgendaController::class, 'showForm'])->name('agenda.form');
Route::post('/agenda-generator', [AgendaController::class, 'generateAgenda'])->name('agenda.generate');
Route::get('/agenda-pdf', [AgendaController::class, 'downloadPDF'])->name('agenda.download');



Route::prefix('transcript')->group(function () {
    Route::get('/', [TranscriptController::class, 'showForm'])->name('transcript.form');
    Route::post('/generate', [TranscriptController::class, 'generateTranscript'])->name('transcript.generate');
    Route::get('/download', [TranscriptController::class, 'downloadPDF'])->name('transcript.download');
});



Route::get('/profile', [ProfileController::class, 'showForm'])->name('profile.form');
Route::post('/profile/generate', [ProfileController::class, 'generateProfile'])->name('profile.generate');



Route::get('/product-name', [ProductNameController::class, 'showForm'])->name('product-name.form');
Route::post('/product-name/generate', [ProductNameController::class, 'generateNames'])->name('product-name.generate');





// Route::get('/presentation-tbs', [PresentationTBSController::class, 'showForm'])->name('tbs.form');
// Route::post('/presentation-tbs/generate', [PresentationTBSController::class, 'generate'])->name('tbs.generate');
// Route::get('/presentation-tbs/preview', [PresentationTBSController::class, 'preview'])->name('tbs.preview');
// // Route::get('/presentation-tbs/download', [PresentationTBSController::class, 'download'])->name('tbs.download');
// Route::get('/presentation-tbs/templates', [PresentationTBSController::class, 'showTemplates'])->name('tbs.templates');

// Route::post('/presentation-tbs/download', [PresentationTBSController::class, 'download'])->name('tbs.download');

// use App\Http\Controllers\PresentationTBSController;

Route::get('/presentation-tbs', [PresentationTBSController::class, 'showForm'])->name('tbs.form');
Route::post('/presentation-tbs/generate', [PresentationTBSController::class, 'generate'])->name('tbs.generate');
Route::get('/presentation-tbs/preview', [PresentationTBSController::class, 'preview'])->name('tbs.preview');
Route::get('/presentation-tbs/templates', [PresentationTBSController::class, 'showTemplates'])->name('tbs.templates');
Route::post('/presentation-tbs/download', [PresentationTBSController::class, 'download'])->name('tbs.download'); // 🔥 POST route updated



// lecture summarizer 
Route::get('/lecture-summarizer', [LectureSummarizerController::class, 'index'])->name('lecture.index');
Route::post('/lecture-summarizer/generate', [LectureSummarizerController::class, 'generate'])->name('lecture.generate');
Route::post('/lecture-summarizer/download-questions', [LectureSummarizerController::class, 'downloadQuestions'])->name('lecture.downloadQuestions');
Route::post('/lecture-summarizer/download-assignment', [LectureSummarizerController::class, 'downloadAssignment'])->name('lecture.downloadAssignment');




// logout work
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');



Route::get('/new', function () {
    return view('new.topic');
});

Route::get('/', function () {
    return view('welcome');
});

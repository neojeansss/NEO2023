<?php

use App\Models\MessageFromSC;
use App\Models\PaymentProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DebateTeamController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AccessControlController;
use App\Http\Controllers\MessageFromSCController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\RequestInvitationController;
use App\Http\Controllers\RegistrationDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/tesaos', function () {
//     return view('tesaos');
// });

Route::get('/about', function () {
    return view('about',[
        'messageFromSCs' => MessageFromSC::where('is_active', true)->get(),
    ]);
});

Route::get('/event', function () {
    return view('event');
});

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('dashboard', [DashboardController::class, 'check'])->name('dashboard');
Route::get('userPayment',function (){
    return view('dashboards.user.userPayment',[
        'paymentProviders' => PaymentProvider::all(),
    ]);
});
// Route::resource('registration', RegistrationController::class);

Route::resource('message-from-SC', MessageFromSCController::class);
Route::resource('judges', JudgeController::class);
Route::resource("events", EventController::class);
Route::resource('supports', SupportController::class);
Route::resource('merchandises', MerchandiseController::class);

Route::resource("competitions", CompetitionController::class);
Route::resource("testimonies", TestimonyController::class);
Route::resource('companions', CompanionController::class);

Route::resource('environments', EnvironmentController::class);
Route::resource('accesses', AccessController::class);
Route::resource('access-controls', AccessControlController::class);
Route::resource('schedules', ScheduleController::class);

// Participant Login
Route::prefix('participant')->name('participant.')->group(function () {
    Route::get('login', [LoginController::class, 'showParticipantLoginForm'])->name('login');
    Route::post('login/auth', [LoginController::class, 'participantLogin'])->name('login-auth');
    Route::get('dashboard', ParticipantController::class)->name('dashboard');
    Route::get('submissions', [ParticipantController::class, 'showSubmissions'])->name('submissions');
});

// Registration Detail
Route::prefix('registration-details')->name('registration-details.')->group(function () {
    Route::put('{registrationDetail}/restore', [RegistrationDetailController::class, 'restore'])->name('restore');
});
Route::resource('registration-details', RegistrationDetailController::class);

// Registration
Route::prefix('registrations')->name('registrations.')->group(function () {
    Route::post('create', [RegistrationController::class, 'create'])->name('create');
    Route::get('manage', [RegistrationController::class, 'manage'])->name('manage');
    Route::get('getFaculties', [RegistrationController::class, 'getFaculties'])->name('getFaculties');
    Route::get('getMajors', [RegistrationController::class, 'getMajors'])->name('getMajors');
    Route::get('emailIsTaken', [RegistrationController::class, 'emailAddressIsTaken'])->name('emailIsTaken');
});
Route::resource('registrations', RegistrationController::class)->except('create');

// Participant
Route::prefix('participants')->name('participants.')->group(function () {
    Route::get('export', [ParticipantController::class, 'export'])->name('export');
    Route::get('{participant}/sendAccountInfo', [ParticipantController::class, 'sendAccountInfo'])->name('sendAccountInfo');
    Route::get('account', [ParticipantController::class, 'account'])->name('account');
    Route::get('withdrawal', [ParticipantController::class, 'withdrawal'])->name('withdrawal');
});
Route::resource('participants', ParticipantController::class);

// Show District
Route::prefix('districts')->name('districts.')->group(function () {
    Route::get('show', [DistrictController::class, 'show'])->name('show');
});

// Request Invitation
Route::prefix('request-invitations')->name('request-invitations.')->group(function () {
    Route::put('{requestInvitation}/accept', [RequestInvitationController::class, 'accept'])->name('accept');
});
Route::resource('request-invitations', RequestInvitationController::class);

// Show Major
Route::prefix('majors')->name('majors.')->group(function () {
    Route::get('show', [MajorController::class, 'show'])->name('show');
});

//faqs
Route::prefix('faqs')->name('faqs.')->group(function () {
    Route::get('manage', [FaqController::class, 'manage'])->name('manage');
});
Route::resource('faqs', FaqController::class);

// Re Registration
Route::prefix('qualifications')->name('qualifications.')->group(function () {
    Route::get('{round}/create/{competition}', [QualificationController::class, 'create'])->name('create');
    Route::get('{round}/edit/{competition}', [QualificationController::class, 'editRank'])->name('editRank');
    Route::post('updateRank', [QualificationController::class, 'updateRank'])->name('updateRank');
    Route::get('{qualification}/backRank/{round}', [QualificationController::class, 'backRank'])->name('backRank');
});
Route::resource('qualifications', QualificationController::class)->except('create');

// Submission
Route::prefix('submissions')->name('submissions.')->group(function () {
    Route::post('{submission}/download', [SubmissionController::class, 'download'])->name('download');
    Route::post('create', [SubmissionController::class, 'create'])->name('create');
});
Route::resource('submissions', SubmissionController::class)->except('create');

// Payment
Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('{registration}/create', [PaymentController::class, 'create'])->name('create');
    Route::put('{payment}/accept', [PaymentController::class, 'accept'])->name('accept');
    Route::put('{payment}/reject', [PaymentController::class, 'reject'])->name('reject');
    Route::get('{payment}/download-invoice', [PaymentController::class, 'downloadInvoice'])->name('download-invoice');
    Route::get('{payment}/resend-invoice', [PaymentController::class, 'resendInvoice'])->name('resend-invoice');
});
Route::resource('payments', PaymentController::class)->except('create');

// Refund
Route::prefix('refunds')->name('refunds.')->group(function () {
    Route::get('{registration}/create', [RefundController::class, 'create'])->name('create');
    Route::put('{refund}/accept', [RefundController::class, 'accept'])->name('accept');
    Route::put('{refund}/reject', [RefundController::class, 'reject'])->name('reject');
});
Route::resource('refunds', RefundController::class)->except('create');

// Debate Team Name
Route::prefix('debate-teams')->name('debate-teams.')->group(function () {
    Route::put('{debateTeam}/accept', [DebateTeamController::class, 'accept'])->name('accept');
    Route::put('{debateTeam}/reject', [DebateTeamController::class, 'reject'])->name('reject');

});
Route::resource('debate-teams', DebateTeamController::class);

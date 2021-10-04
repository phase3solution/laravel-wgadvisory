<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentTypeController;
use App\Http\Controllers\AssessmentLabelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssessmentGenerate;
use App\Http\Controllers\BcpAssessmentResultController;
use App\Http\Controllers\BcpRegisterResultController;
use App\Http\Controllers\BiaController;
use App\Http\Controllers\BiaDepartmentController;
use App\Http\Controllers\BiaServiceController;
use App\Http\Controllers\DrmAssessmentResultController;
use App\Http\Controllers\FacilityRiskAssessmentResultController;
use App\Http\Controllers\SwitchUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DrmRegisterResultController;
use App\Http\Controllers\ItManagementResultController;
use App\Http\Controllers\CloudReadinessResultController;
use App\Http\Controllers\CybersecurityMaturityResultController;
use App\Http\Controllers\CybersecurityMaturityRegisterResultController;
use App\Http\Controllers\SfiaCategoryController;
use App\Http\Controllers\SfiaController;
use App\Http\Controllers\SfiaResultController;
use App\Http\Controllers\SfiaRoleController;
use App\Http\Controllers\SfiaRoleUserController;
use App\Http\Controllers\SfiaSkillController;
use App\Http\Controllers\SfiaSubcategoryController;
use App\Http\Controllers\SfiaTeamController;
use App\Http\Controllers\SfiaTeamRoleController;
use App\Http\Controllers\SfiaUserController;
use App\Models\BiaDepartment;
use App\Models\BiaService;
use App\Models\CompanyAssessmentType;
use Illuminate\Support\Facades\Auth;

// Frontend

Route::get('/', function () {
	if(Auth::check()){
		return redirect()->route('dashboard');
	}else{
		return redirect()->route('signin');
	}
    
});


Route::get('/forget-password', [SigninController::class, 'forgetPasswordPage'])->name('forgetPasswordPage');
Route::post('/password-forget', [SigninController::class, 'passwordForget'])->name('passwordForget');
Route::get('/signin', [SigninController::class, 'signPage'])->name('signin');
Route::post('/signout', [SigninController::class, 'signOut'])->name('signout');
Route::post('/signin-check', [SigninController::class, 'signinCheck'])->name('signinCheck');
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

// User Profile
Route::get('/user/profile/{id}', [ProfileController::class, 'profile'])->name('userProfile');
Route::post('/user/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
// profilePassword
Route::post('/user/profile-password-update', [ProfileController::class, 'profilePassword'])->name('profilePassword');



// MTA 
Route::get('/assessment/{slug}/{id}', [AssessmentGenerate::class, 'index'])->name('assessment.type');
Route::get('/assessment-view/{slug}/{id}', [AssessmentGenerate::class, 'view'])->name('assessmentView.type');
Route::get('/find-scorecard/{id}',  [AssessmentGenerate::class, 'scoreCard'])->name('scoreCard');

// BCP
Route::post('bcp-assessment-result-store', [BcpAssessmentResultController::class, 'store'])->name('bcp.store');
Route::get('bcp-assessment-result-reset/{id}', [BcpAssessmentResultController::class, 'destroy'] )->name('bcp.destroy');
Route::get('bcp-assessment-result-publish/{id}', [BcpAssessmentResultController::class, 'publishAssessment'])->name('bcp.publishAssessment');

// BCP Register
Route::post('bcp-register-result-store', [BcpRegisterResultController::class, 'store'])->name('bcpRegister.store');
Route::get('bcp-register-result-reset/{id}', [BcpRegisterResultController::class, 'destroy'] )->name('bcpRegister.destroy');



// Facility Risk 
Route::post('facility-risk-assessment-result-store', [FacilityRiskAssessmentResultController::class, 'store'])->name('facility-risk.store');
Route::get('facility-risk-assessment-result-reset/{id}', [FacilityRiskAssessmentResultController::class, 'destroy'] )->name('facility-risk.destroy');
Route::get('facility-risk-assessment-result-publish/{id}', [FacilityRiskAssessmentResultController::class, 'publishAssessment'])->name('facility-risk.publishAssessment');

// DRM
Route::post('drm-assessment-result-store', [DrmAssessmentResultController::class, 'store'])->name('drm.store');
Route::get('drm-assessment-result-reset/{id}', [DrmAssessmentResultController::class, 'destroy'] )->name('drm.destroy');
Route::get('drm-assessment-result-publish/{id}', [DrmAssessmentResultController::class, 'publishAssessment'])->name('drm.publishAssessment');


// DRM Register
Route::post('drm-register-result-store', [DrmRegisterResultController::class, 'store'])->name('drmRegister.store');


// IT Management
Route::post('it-management-assessment-result-store', [ItManagementResultController::class, 'store'])->name('itManagement.store');
Route::get('it-management-assessment-result-reset/{id}', [ItManagementResultController::class, 'destroy'] )->name('itManagement.destroy');
Route::get('it-management-assessment-result-publish/{id}', [ItManagementResultController::class, 'publishAssessment'])->name('itManagement.publishAssessment');


// Cloud Readiness
Route::post('cloud-readiness-assessment-result-store', [CloudReadinessResultController::class, 'store'])->name('cloudReadiness.store');
Route::get('cloud-readiness-assessment-result-reset/{id}', [CloudReadinessResultController::class, 'destroy'] )->name('cloudReadiness.destroy');
Route::get('cloud-readiness-assessment-result-publish/{id}', [CloudReadinessResultController::class, 'publishAssessment'])->name('cloudReadiness.publishAssessment');

// Cybersecurity Maturity
Route::post('cybersecurity-maturity-assessment-result-store', [CybersecurityMaturityResultController::class, 'store'])->name('cybersecuirytMaturity.store');
Route::get('cybersecurity-maturity-assessment-result-reset/{id}', [CybersecurityMaturityResultController::class, 'destroy'] )->name('cybersecuirytMaturity.destroy');
Route::get('cybersecurity-maturity-assessment-result-publish/{id}', [CybersecurityMaturityResultController::class, 'publishAssessment'])->name('cybersecuirytMaturity.publishAssessment');

// Cybersecurity Maturity Register
Route::post('cybersecurity-maturity-register-assessment-result-store', [CybersecurityMaturityRegisterResultController::class, 'store'])->name('cybersecuirytMaturityRegister.store');

// BIA
Route::get('/bia/department/{departmentId}', [BiaController::class, 'biaDepartmentAssessment'])->name('bia.department');
Route::get('/bia/service/{departmentId}', [BiaController::class, 'biaServiceAssessment'])->name('bia.service');
Route::get('/bia/roles/{departmentId}', [BiaController::class, 'biaRolesAssessment'])->name('bia.roles');
Route::get('/bia/team/{departmentId}', [BiaController::class, 'biaTeamAssessment'])->name('bia.team');

Route::get('/bia-view/department/{departmentId}', [BiaController::class, 'biaDepartmentAssessmentView'])->name('biaView.department');
Route::get('/bia-view/service/{departmentId}', [BiaController::class, 'biaServiceAssessmentView'])->name('biaView.service');
Route::get('/bia-view/roles/{departmentId}', [BiaController::class, 'biaRolesAssessmentView'])->name('biaView.roles');
Route::get('/bia-view/team/{departmentId}', [BiaController::class, 'biaTeamAssessmentView'])->name('biaView.team');

Route::get('/bia-assessment-result-reset/{bia_id}', [BiaController::class, 'biaReset']);
Route::get('/bia-assessment-result-publish/{bia_id}', [BiaController::class, 'biaPublish']);

Route::get('/find-bia-scorecard/{id}', [BiaController::class, 'biaScoreCard']);
Route::get('/pdf-bia-scorecard/{id}', [BiaController::class, 'biaPdfView']);


Route::post('/bia-department-questionnarie-form-one', [BiaDepartmentController::class, 'questionnarieFormOne']);
Route::post('/bia-department-questionnarie-form-two', [BiaDepartmentController::class, 'questionnarieFormTwo']);
Route::post('/bia-department-questionnarie-form-five', [BiaDepartmentController::class, 'questionnarieFormFive']);
Route::post('/bia-department-tap-form', [BiaDepartmentController::class, 'teamForm']);
Route::post('/bia-department-role-form-two', [BiaDepartmentController::class, 'roleFormTwo']);
Route::post('/bia-department-service-form-six', [BiaDepartmentController::class, 'serviceFormSix']);


Route::post('/bia-department-questionnarie-form-three', [BiaServiceController::class, 'questionnarieFormThree']);
Route::post('/bia-department-questionnarie-form-four', [BiaServiceController::class, 'questionnarieFormFour']);
Route::post('/bia-department-role-form-one', [BiaServiceController::class, 'roleFormOne']);
Route::post('/bia-department-service-form-nine', [BiaServiceController::class, 'serviceFormNine']);
Route::post('/bia-department-service-form-two', [BiaServiceController::class, 'serviceFormTwo']);
Route::post('/bia-department-service-form-three', [BiaServiceController::class, 'serviceFormThree']);
Route::post('/bia-department-service-form-five', [BiaServiceController::class, 'serviceFormFive']);
Route::post('/bia-department-service-form-foura', [BiaServiceController::class, 'serviceFormFourA']);
Route::post('/bia-department-service-form-fourb', [BiaServiceController::class, 'serviceFormFourB']);
Route::post('/bia-department-service-form-one', [BiaServiceController::class, 'serviceFormOne']);



// SFIA
Route::get('/sfia-assessment/{id}', [SfiaController::class, 'assessment'])->name('sfia.assessment');
Route::get('/sfia-dashboard/{id}', [SfiaController::class, 'dashboard'])->name('sfia.dashboard');
Route::get('sfia-missing-skills', [SfiaController::class, 'missingSkills'])->name('sfia.missingSkills');

Route::resource('sfia', SfiaController::class);
Route::get('/edit-sfia/{id}', [SfiaController::class, 'editSfia'])->name('editSfia');


Route::get('/add-more-sfia-category/{row_id}', [SfiaCategoryController::class, 'addMoreSfiaCategory']);
Route::post('/sfia-category-store', [SfiaCategoryController::class, 'store' ]);
Route::get('/delete-sfia-category/{id}', [SfiaCategoryController::class, 'destroy']);

Route::get('/add-more-sfia-subcategory', [SfiaSubcategoryController::class, 'addMoreSfiaSubcategory']);
Route::post('/sfia-subcategory-store', [SfiaSubcategoryController::class, 'store']);
Route::get('/delete-sfia-sub-category/{id}', [SfiaSubcategoryController::class, 'destroy']);
Route::get('/sfia-subcategory-by-category-id/{category_id}', [SfiaSubcategoryController::class, 'subcategoryByCategory']);

Route::get('/add-more-sfia-skill', [SfiaSkillController::class, 'addMoreSfiaSkill']);
Route::post('/sfia-skill-store', [SfiaSkillController::class, 'store']);
Route::get('/delete-sfia-skill/{id}', [SfiaSkillController::class, 'destroy']);
Route::get('/sfia-skill-by-subcategory-id/{subcategory_id}', [SfiaSkillController::class, 'skillBySubcategory' ]);
Route::get('/sfia-skill-details-by-id/{id}', [SfiaSkillController::class, 'sfiaSkillDetails']);



Route::resource('sfiaTeam', SfiaTeamController::class);
Route::resource('sfiaRole', SfiaRoleController::class);
Route::resource('sfiaTeamRole', SfiaTeamRoleController::class);
Route::resource('sfiaUser', SfiaUserController::class);
Route::resource('sfiaRoleUser', SfiaRoleUserController::class);

Route::get('/find-sfia-role-by-team/{team_id}', [SfiaTeamRoleController::class, 'findRoleByTeam']);
Route::get('/find-sfia-user-by-role/{role_id}', [SfiaRoleUserController::class, 'findUserByRole']);
Route::get('/find-sfia-add-more-categories', [SfiaRoleUserController::class, 'addMoreCategories']);

Route::resource('sfiaResult', SfiaResultController::class);







// USER SWITCHING
Route::get('/user/switch/admin', [SwitchUserController::class, 'switchToAdmin'])->name('switch-back');
Route::get('/user/switch/{id}', [SwitchUserController::class, 'switchToUser'])->name('switch-user');
















// Dashboard

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('admin');
Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::resource('role', RoleController::class)->middleware('administrator');
Route::resource('assessmentType', AssessmentTypeController::class)->middleware('administrator');


Route::group(['middleware' => 'auth'], function () {


	Route::resource('user', UserController::class);

	Route::post('change-password', [UserController::class, 'updatePassword' ])->name('change.password');

	Route::resource('company', CompanyController::class);

	Route::get('/company-assign-user', [CompanyController::class, 'assignUserList'])->name('company.assign.user');
	Route::post('/company-insert-user', [CompanyController::class, 'assignUserInsert'])->name('company-user-insert');
	Route::post('/company-update-user', [CompanyController::class, 'assignUserUpdate'])->name('company-user-update');
	Route::post('/company-delete-user/{id}', [CompanyController::class, 'assignUserDelete'])->name('company-user-delete');



	Route::get('/company-assign-assessment', [CompanyController::class, 'assignAssessmentList'])->name('company.assign.assessment');
	Route::post('/assignAssessmentInsert', [CompanyController::class, 'assignAssessmentInsert'])->name('company-assessment-insert');
	Route::post('/company-assessment-delete/{id}', [CompanyController::class, 'assignAssessmentDelete'])->name('company-assessment-delete');

	Route::resource('assessmentLabel', AssessmentLabelController::class);

	Route::resource('assessment', AssessmentController::class);

	Route::get('/assessment-type/{typeId}', [AssessmentController::class, 'index'])->name('assessmentList');
	Route::get('/add-new-assessment-type/{typeId}', [AssessmentController::class, 'create']);
	// Route::post('/assessment-store', [AssessmentController::class, 'store'])->name('assessmentStore');
	// Route::post('/assessmentStore', [AssessmentController::class, 'store'])->name('assessmentStore');
	Route::post('/assessment-update', [AssessmentController::class, 'update']);
	Route::get('/edit-assessment/{assessmentId}', [AssessmentController::class, 'edit']);

	Route::get('/assessment-parent-edit/{assessmentId}', [AssessmentController::class, 'editParent']);
	Route::post('/assessment-parent-update', [AssessmentController::class, 'updateParent']);
	Route::get('/delete-parent/{assessmentId}', [AssessmentController::class, 'deleteParent'])->name('deleteParent');
	Route::post('/delete-assessment', [AssessmentController::class, 'deleteAssessment'])->name('deleteAssessment');

	Route::post('/find-tab-Content', [AssessmentController::class, 'findTabContent'])->name('findTabContent');
	Route::post('/find-assessment', [AssessmentController::class, 'findAssessment' ])->name('findAssessment');

	Route::post('/find-assessment-by-type', [AssessmentController::class, 'findAssessmentByType'])->name('findAssessmentByType');



	Route::resource('bia', BiaController::class);
	Route::get('/edit-bia/{id}', [BiaController::class, 'editBia'])->name('editBia');

	Route::resource('biaDepartment', BiaDepartmentController::class);
	Route::post('/bia-department-store', [BiaDepartmentController::class, 'biaDepartmentStore']);
	Route::get('/add-more-bia-department/{rowID}', [BiaDepartmentController::class, 'addMoreBiaDepartment']);
	Route::get('/delete-bia-department/{id}', [BiaDepartmentController::class, 'deleteBiaDepartment']);
	
	Route::resource('biaService', BiaServiceController::class);
	Route::post('/bia-service-store', [BiaServiceController::class, 'biaServiceStore']);
	Route::get('/add-more-bia-service/{serviceRow}/{departmentId}', [BiaServiceController::class, 'addMoreBiaService']);
	Route::get('/delete-bia-service/{id}', [BiaServiceController::class, 'deleteBiaServie']);




});

Route::group(['middleware' => 'auth'], function () {
	// Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

	Route::post('profile/password', [ProfileController::class, 'password'] )->name('update.password');
});




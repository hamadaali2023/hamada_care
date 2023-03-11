<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*x
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Chat 

Route::post('patient/loginadmin', 'Api\Patient\PatientAuthController@loginAdmin');
 


 


Route::group(['middleware' => ['api','changeLanguage'], 'namespace' => 'Api'], function () {
    //   Route::group(['middleware' => ['api','changeLanguage','checkDoctor:patient-api'], 'namespace' => 'Api'], function () {
   
    // Route::group(['middleware' => ['auth:patient-api','changeLanguage'], 'namespace' => 'Api'], function () {

    Route::post('live/create', 'LifeController@create');
    Route::post('live/update', 'LifeController@update');
    Route::post('live/delete', 'LifeController@delete');
    Route::post('live/get', 'LifeController@get');


    Route::post('shop/create', 'ShopController@create');
    Route::post('shop/update', 'ShopController@update');
    Route::post('shop/delete', 'ShopController@delete');
    Route::post('shop/get', 'ShopController@get');



    Route::post('contactinfo', 'HomeController@contactInfo');
    Route::post('countries', 'HomeController@Countries'); 
    Route::post('cities', 'HomeController@Cities');
    Route::post('languages', 'HomeController@languages');
    Route::post('categotries', 'HomeController@categotries');
    Route::post('subcategory', 'HomeController@subcategory');
    Route::post('getorders', 'HomeController@getOrders');
    Route::post('order-status', 'HomeController@orderStatus');
    
    Route::post('userschats', 'ChatsController@doctorChat');
    Route::post('usersgetmessages', 'ChatsController@usersGetMessages');
    Route::post('userssendmessage', 'ChatsController@doctorSendMessage');
    Route::post('userscreatorgetmessages', 'ChatsController@creatOrGetMessages');
   
    Route::group(['prefix' => 'doctor','namespace'=>'Doctor'],function (){

        Route::post('login', 'DoctorAuthController@login');
        Route::post('register', 'DoctorAuthController@register');
        Route::post('change_password', 'DoctorAuthController@change_password');
        Route::post('forgetpassword', 'DoctorAuthController@forgetPassword');


        Route::post('doctordata', 'DoctorAuthController@getDoctorData');
        Route::post('personal_data_update', 'DoctorAuthController@personalDataUpdate');
        Route::post('certificate_update', 'DoctorAuthController@certificatesUpdate');
        Route::post('lang_update', 'DoctorAuthController@langUpdate');
        Route::post('service_update', 'DoctorAuthController@serviceUpdate');
        Route::post('experience_update', 'DoctorAuthController@experienceUpdate');
        Route::post('education_update', 'DoctorAuthController@educationUpdate');
        Route::post('insurance_update', 'DoctorAuthController@insuranceUpdate');
        Route::post('license_update', 'DoctorAuthController@licenseUpdate');
        Route::post('locationupdate', 'DoctorAuthController@locationUpdate');
        Route::post('bankupdate', 'DoctorAuthController@bankUpdate');

        Route::post('myservices', 'HomeController@MyServices');
        Route::post('addnewservice', 'HomeController@addNewService');
        Route::post('servicescount', 'HomeController@MyServicesCount');
        
        Route::post('doctor_not_status', 'HomeController@doctorNotStatus');

        Route::post('doctor_servic_status', 'HomeController@doctorServicStatus');
        
        Route::post('wallet_withdraw', 'HomeController@walletWithdraw');
        Route::post('get_balance_transaction', 'HomeController@getBalanceTransaction');

        Route::post('home', 'HomeController@index');
        Route::post('getcount', 'HomeController@getcount');
        Route::post('degrees', 'HomeController@degrees');
        Route::post('companies_insurance', 'HomeController@companies_insurance');
        Route::post('doctorupdate', 'DoctorAuthController@doctorUpdate');
        

        // Route::post('addnewservice', 'HomeController@addNewService');
        
        Route::post('getworkdays', 'HomeController@getWorkDays');

        Route::post('addworkdays', 'HomeController@addWorkDays');
        Route::post('editapointment', 'HomeController@EditApointment');


        // Route::post('addServices', 'DoctorAuthController@addNewServices');
        // Route::post('doctorofferbyid', 'HomeController@getDoctorOffer');

        // Route::post('appointmentstatus', 'HomeController@appointmentStatus');
        // Route::post('getpayment', 'HomeController@getPaymentById');
        // Route::post('deleteoffer', 'HomeController@deleteOffer');
        // Route::post('sendfile', 'HomeController@sendfile');

        
        
        // Route::post('doctor/specialities', 'HomeController@doctorSpecialities');
        
        // Route::post('doctorappointment', 'HomeController@getAppointmentById');
        // Route::post('addnewoffer', 'HomeController@addNewOffer');
        // Route::post('updateoffer', 'HomeController@UpdateOffer');
        // Route::post('addnewservices', 'HomeController@addNewServices');
        // Route::post('updateservices', 'HomeController@updateServices');
        // Route::post('getservices', 'HomeController@getServices');
        // Route::post('addarticle', 'HomeController@addArticle');
        // Route::post('articledelete', 'HomeController@articleDelete');
        
        // Route::post('updatearticle', 'HomeController@updateArticle');
        // Route::post('getdiagnosis', 'HomeController@getDiagnosis');
        // Route::post('adddiagnosis', 'HomeController@addDiagnosis');
        

        // Route::post('workday', 'HomeController@getWorkDay');
        // Route::post('removeworkingways', 'HomeController@removeWorkingDays');
        // Route::post('updateapointment', 'HomeController@updateApointment');

    });
  
    Route::post('patientchat', 'Patient\ChatsController@patientChat');
    Route::post('getmessages', 'Patient\ChatsController@patientFetchMessages');
    Route::post('sendmessage', 'Patient\ChatsController@patientSendMessage');
    Route::post('creatorgetmessages', 'Patient\ChatsController@creatOrGetMessages');
    Route::group(['prefix' => 'patient','namespace'=>'Patient'],function (){
        
        Route::post('login', 'PatientAuthController@login');
        Route::post('register', 'PatientAuthController@register');
        
        Route::post('patientdata', 'PatientAuthController@getPatientData');
        Route::post('patient_not_status', 'PatientAuthController@PatientNotStatus');
        Route::post('patient_data_update', 'PatientAuthController@patientDataUpdate');
        
        Route::post('patient_location', 'HomeController@patientLocation');
        Route::post('patient_people_under_care', 'HomeController@patient_people_under_care');
        Route::post('get_people_under_care', 'HomeController@getPeopleUnderCare');
        Route::post('remove_under_care', 'HomeController@removeUnderCare');
        Route::post('get_patient_location', 'HomeController@getPatientLocation');
        Route::post('remove_patient_location', 'HomeController@removePatientLocation');
        Route::post('createorder', 'HomeController@createOrder');
        
        Route::post('change_password', 'DoctorAuthController@change_password');
        Route::post('forgetpassword', 'DoctorAuthController@forgetPassword');
        
        Route::post('wallet_charge', 'HomeController@walletCharge');
        Route::post('wallet_transfer', 'HomeController@walletTransfer');
        
        Route::post('get_balance_transaction', 'HomeController@getBalanceTransaction');

        

        Route::post('doctors-blocked-favorites-all-by-service', 'HomeController@getDoctorsBlockedFavoritesAllByService');
        Route::post('addfavorite', 'HomeController@addToFavorite');
        Route::post('addblock', 'HomeController@addToBlocks');
         
        Route::post('paymentstatus', 'HomeController@paymentStatus');
        
        Route::post('change_password', 'PatientAuthController@change_password');
        Route::post('forgetpassword', 'PatientAuthController@forgetPassword');
        Route::post('home', 'HomeController@index');
        Route::post('sliders', 'HomeController@sliders');
        Route::post('addrate', 'HomeController@addRate');
        
        
        Route::post('doctors_speciality_byid', 'HomeController@getDoctorsSpecialityById');
        
        // Route::post('register', 'PatientAuthController@register');
        
        Route::post('getpatient', 'PatientAuthController@getPatient');
        Route::post('gettime', 'HomeController@getTime');
        Route::post('addbooking', 'HomeController@addBooking');
        Route::post('addpayment', 'HomeController@addPayment');
        
        Route::post('getpayment', 'HomeController@getPaymentById');
        Route::post('searchondoctor', 'HomeController@searchOnDoctor');
        Route::post('getdiagnosis', 'HomeController@getDiagnosis');
        Route::post('appointmentbyid', 'HomeController@getAppointmentById');
        Route::post('patientupdate', 'HomeController@patientUpdate');
        Route::post('reviewsdoctorid', 'HomeController@getReviewsOfDoctorId');
        Route::post('getfavoritebyid', 'HomeController@getfavoriteById');
       
        Route::post('removefavorite', 'HomeController@removeFavorite');
        
        Route::post('appointmentstatus', 'HomeController@appointmentStatus');




        // Route::post('specialities', 'SpecialityController@index');
        // Route::post('sliders', 'SliderController@index');
        // Route::post('doctors', 'DoctorController@index');
        // Route::post('articles', 'ArticleController@index');
        // Route::post('pannars', 'BannerController@index');
    });


});







// Route::group(['middleware' => 'api', 'namespace' => 'Api'], function () {
//  Route::post('get-main-categoriess', 'CategoriesController@index');
//  });


Route::group(['middleware' => ['api','checkPassword','changeLanguage'], 'namespace' => 'Api'], function () {
    Route::post('get-main-categories', 'CategoriesController@index');
    Route::post('get-category-byId', 'CategoriesController@getCategoryById');
    Route::post('change-category-status', 'CategoriesController@changeStatus');

    Route::group(['prefix' => 'admin','namespace'=>'Admin'],function (){
        Route::post('login', 'AuthController@login');
    });

});



Route::group(['middleware' => ['api','checkPassword','changeLanguage','CheckPatient:patient-api'], 'namespace' => 'Api'], function () {
    Route::get('offers', 'CategoriesController@index');
});
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//---------LOGOUT-----
$route['logout'] = 'Login/logoutAdmin';

//------------------Questions-----------------
$route['question'] = 'Question';
$route['question/:num'] = 'Question';

$route['question/transcription'] = 'Question/questionTranscription';
$route['question/transcription/:num'] = 'Question/questionTranscription';

//------------------Story-----------------
$route['story'] = 'Story';
$route['story/:num'] = 'Story';

$route['story/transcription'] = 'Story/storyTranscription';
$route['story/transcription/:num'] = 'Story/storyTranscription';

//------------------Comment-----------------
$route['comment'] = 'Story/getCommentsOfStories';
$route['comment/:num'] = 'Story/getCommentsOfStories';

$route['comment/transcription'] = 'Story/commentTranscription';
$route['comment/transcription/:num'] = 'Story/commentTranscription';

//------------------Answer-----------------
$route['answer'] = 'Answer/answerUploadByVoiceArtist';
$route['answer/:num'] = 'Answer/answerUploadByVoiceArtist';

//------------------Doctor-----------------
$route['doctor'] = 'Doctor/getDoctorProfile';
$route['doctors'] = 'Doctor';
$route['doctors/:num'] = 'Doctor';

$route['doctor_new'] = 'Doctor/newDocSignup';
$route['doctor_new/:num'] = 'Doctor/newDocSignup';

$route['help'] = 'Doctor/getDoctorHelp';
$route['help/:num'] = 'Doctor/getDoctorHelp';

//------------------User-----------------
$route['users'] = 'User';
$route['users/:num'] = 'User';
$route['user'] = 'User/getUserProfile';
$route['user_questions'] = 'User/getUserQuestions';
$route['user_questions/:num'] = 'User/getUserQuestions';

$route['user_stories'] = 'User/getUserStories';
$route['user_stories/:num'] = 'User/getUserStories';

$route['user_feedback'] = 'User/getUserFeedback';
$route['user_feedback/:num'] = 'User/getUserFeedback';

//------------------Feedback-----------------
$route['feedback'] = 'Feedback';
$route['feedback/:num'] = 'Feedback';

$route['feedback/transcription'] = 'Feedback/feedbackTranscription';
$route['feedback/transcription/:num'] = 'Feedback/feedbackTranscription';
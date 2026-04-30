<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// APP
$route['login'] = 'user/view';
$route['monespace/register'] = 'user/regi';

$route['membres'] = 'user/get_users';
$route['membre/new'] = 'user/create';
$route['membre/modifier/(:any)'] = 'user/edit_member/$1';
$route['membres/(:any)'] = 'user/get_user_detail/$1';

$route['profile'] = 'user/get_user';
$route['profile/edit'] = 'user/edit';

$route['caisses'] = 'caisses/index';
$route['caisses/(:any)'] = 'caisses/view/$1';

$route['credits'] = 'credits/index';

$route['aides'] = 'aides/index';

$route['tontines'] = 'tontine/index';
$route['tontine/new'] = 'tontine/create_tontine';
$route['tontines/(:any)'] = 'tontine/view/$1';
$route['tontines/t/fermees'] = 'tontine/closed';
$route['tontines/sessions/(:any)'] = 'tontine/get_session/$1';
$route['tontines/sessions/seance/(:any)'] = 'tontine/get_seance/$1';

$route['sessions/new/(:any)'] = 'tontine/create_session/$1';
// $route['monespace/(:any)'] = 'app/view/$1';

$route['(:any)'] = 'app/view/$1';
$route['default_controller'] = 'app/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

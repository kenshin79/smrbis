<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['app_root'] = '/smrbis';

$config['app_name'] = 'SMRB Information System';

$config['jquery'] = $config['app_root'].'/js/jquery-1.11.1.min.js';

$config['bootstrap_css'] = $config['app_root'].'/bootstrap/css/bootstrap.min.css';

$config['bootstrap_js'] = $config['app_root'].'/bootstrap/js/bootstrap.min.js';

$config['datatables_css'] = $config['app_root'].'/datatables/jquery.dataTables.min.css';

$config['datatables_js'] = $config['app_root'].'/datatables/jquery.dataTables.min.js';

$config['datepicker_css'] = $config['app_root'].'/datepicker/datepicker.css';

$config['datepicker_js'] = $config['app_root'].'/datepicker/bootstrap-datepicker.js';

$config['admin_js'] = $config['app_root'].'/js/admin.js';

$config['pricelist_js'] = $config['app_root'].'/js/pricelist.js';

$config['common_js'] = $config['app_root'].'/js/common.js';

$config['logged_startpage'] = $config['app_root'].'/index.php/welcome';

$config['access_type']['0'] = "Administrator";
$config['access_type']['1'] = "Manager";
$config['access_type']['2'] = "Sales";

$config['pw_changed']['0'] = "No";
$config['pw_changed']['1'] = "Yes";

$config['icon']['admin'] = $config['app_root'].'/img/admin.png';
$config['icon']['pricelist'] = $config['app_root'].'/img/pricelist.png';
$config['icon']['search'] = $config['app_root'].'/img/edit_find.png';
$config['icon']['user'] = $config['app_root'].'/img/users.png';
$config['icon']['log_out'] = $config['app_root'].'/img/log_out.png';
$config['icon']['sales'] = $config['app_root'].'/img/sales.png';
$config['logo']['software'] = $config['app_root'].'/img/my_logo.png';
$config['logo']['store_logo'] = $config['app_root'].'/img/store_logo.png';
$config['logo']['store_name'] = $config['app_root'].'/img/store_name.png';
$config['logo']['maglens'] = $config['app_root'].'/img/maglens.png';
$config['logo']['all_prices'] = $config['app_root'].'/img/all_prices.png';

$config['saletype']['0'] = "Wholesale";
$config['saletype']['1'] = "Retail";

$config['salestatus']['0'] = "Open";
$config['salestatus']['1'] = "Closed";

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\File;


class HomeController extends Controller{

    function shwoInfoFromDb(){
        $results = DB::select('select * from wp_s3cu_form_on_landing');

        $accessLogs = [];
        $errorsLog = [];
        $files = scandir('log/apache2', SCANDIR_SORT_DESCENDING);
        foreach ($files as $file) {
            if (explode(('.'), $file)[0] == 'access') {
                foreach (file('log/apache2/' . $file) as $id => $line) {
                    $item = explode(" ", $line);
                    $accessLogs[$file][$id]['ip'] = isset($item[0]) ? $item[0] : '-';
                    $accessLogs[$file][$id]['date'] = (isset($item[3]) ? $item[3] : '-') . (isset($item[4]) ? $item[4] : '-');
                    $accessLogs[$file][$id]['method'] = (isset($item[5]) ? $item[5] : '-') . '"';
                    $accessLogs[$file][$id]['url'] = isset($item[6]) ? $item[8] : '-';
                    $accessLogs[$file][$id]['status'] = isset($item[8]) ? $item[8] : '-';
                    $browser = explode('"', $line);
                    $accessLogs[$file][$id]['browser'] = isset($browser[5]) ? $browser[5] : '-';
                }
            } else if (explode(('.'), $file)[0] == 'error') {
                foreach (file('log/apache2/' . $file) as $id => $line) {
                    $item = explode("]", $line);
                    $errorsLog[$file][$id]['date'] = (isset($item[0]) ? $item[0] : '-') . ']';
                    $errorsLog[$file][$id]['type'] = (isset($item[1]) ? $item[1] : '-') . ']';
                    $errorsLog[$file][$id]['pid'] = (isset($item[2]) ? $item[2] : '-') . ']';
                    $errorsLog[$file][$id]['message'] = (isset($item[3]) ? $item[3] : '-') . ']';
                }
            }else{
                continue;
            }
        }

        return view('welcome', ['results' => $results, 'accessLogs' => $accessLogs, 'errorsLog' => $errorsLog]);
    }
}

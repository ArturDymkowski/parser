<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\DomCrawler\Crawler;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function export() {
        $crawler = new Crawler(file_get_contents('../wo_for_parse.html'));
        $tmp = explode(" ",$crawler->filter('a#location_address')->text());

        return Excel::download(new DataExport([
            [
                'tracking_number' => $crawler->filter('#wo_number')->text(),
                'po_number' => $crawler->filter('#po_number')->text(),
                'date' => date('Y-m-d H:i',strtotime($crawler->filter('#scheduled_date')->text())),
                'customer' => $crawler->filter('#customer')->text(),
                'trade' => $crawler->filter('#trade')->text(),
                'nte' => floatval(preg_replace("/[^-0-9\.]/","",$crawler->filter('#nte')->text())),
                'store_id' => $crawler->filter('#location_name')->text(),
                'street' => $tmp[0] . " " . $tmp[1] . " " . $tmp[2],
                'city' => $tmp[3],
                'state' => $tmp[4],
                'postcode' => $tmp[5],
                'phone' => floatval(str_replace("-","",$crawler->filter('#location_phone')->text()))
            ],
        ]), 'data.csv');


    }
}

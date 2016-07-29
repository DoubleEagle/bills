<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use DebugBar;
use App\Http\Requests;
use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\Transaction;

class FinanceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('overview');
    }

    public function import()
    {
        return view('import');
    }

    public function process(Request $request)
    {
        $file = $request->file('file');
        $csv = Reader::createFromPath($file);
        $ing = preg_match("/(joanne|spijker|eagle|double|joe)/i",Auth::user()->email);
        $rows = [];
        if ($ing) {
            foreach ($csv as $index => $row)
            {
                if ($index != 0)
                {
                    $rows[$index]['amount'] = $row[6];
                    $rows[$index]['title'] = $row[1]." - ".$row[8];
                    $rows[$index]['date'] = new DateTime($row[0]);
                    $rows[$index]['hash'] = hash("sha256",$row[6].$row[1].$row[8].$row[0]);
                }
            }
        } else {
            foreach ($csv as $index => $row)
            {
                $rows[$index]['amount'] = $row[4];
                $rows[$index]['title'] = $row[6]." - ".$row[10];
                $rows[$index]['date'] = new DateTime($row[7]);
                $rows[$index]['hash'] = hash("sha256",$row[4].$row[6].$row[10].$row[7]);
            }
        }
        return view('select')->with('rows',$rows);
    }

    public function save(Request $request)
    {
        foreach ($request->transactions as $transaction)
        {
            $model = new Transaction($transaction);
            DebugBar::info($model);
            return true;
        }
    }
}

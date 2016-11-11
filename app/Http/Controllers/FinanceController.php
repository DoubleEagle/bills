<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use DebugBar;
use App\Http\Requests;
use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\Transaction;
use App\Models\User;

class FinanceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joanne = Transaction::whereHas('user', function($query) {
            $query->where('email','like','%joanne%')->orWhere('email','like','%spijker%')->orWhere('email','like','%eagle%')->orWhere('email','like','%double%')->orWhere('email','like','%joe%');
        })->sum('amount');
        $rien = Transaction::whereHas('user', function($query) {
            $query->where('email','not like','%joanne%')->where('email','not like','%spijker%')->where('email','not like','%eagle%')->where('email','not like','%double%')->where('email','not like','%joe%');
        })->sum('amount');
        return view('overview')->with('joanne',$joanne)->with('rien',$rien);
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
                if ($index != 0 && strtolower($row[5]) != "bij")
                {
                    $rows[$index]['amount'] = str_replace(",",".",$row[6]);
                    $rows[$index]['title'] = $row[1]." - ".$row[8];
                    $rows[$index]['date'] = new DateTime($row[0]);
                    $rows[$index]['hash'] = hash("sha256",$row[6].$row[1].$row[8].$row[0]);
                }
            }
        } else {
            foreach ($csv as $index => $row)
            {
                if (strtolower($row[3]) != "c") {
                    $rows[$index]['amount'] = $row[4];
                    $rows[$index]['title'] = $row[6]." - ".$row[10];
                    $rows[$index]['date'] = new DateTime($row[7]);
                    $rows[$index]['hash'] = hash("sha256",$row[4].$row[6].$row[10].$row[7]);
                }
            }
        }
        return view('select')->with('rows',$rows);
    }

    public function save(Request $request)
    {
        foreach ($request->transactions as $transaction)
        {
            if (isset($transaction['checked'])) {
                $model = new Transaction($transaction);
                Auth::user()->transactions()->save($model);
            }
        }
        return redirect("/")->with('status', 'Transacties succesvol geïmporteerd');
    }

    public function view() {
      echo "test";
    }
}

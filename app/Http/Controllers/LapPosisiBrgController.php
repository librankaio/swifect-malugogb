<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LapPosisiBrgController extends Controller
{
    public function index(Request $request){
        if (isset($request->dtfrom)) {
            if ($request->searchtext == null) {

                $dtfr = $request->input('dtfrom');
                $dtto = $request->input('dtto');
                $datefrForm = Carbon::createFromFormat('d/m/Y', $dtfr)->format('Y-m-d');
                $datetoForm = Carbon::createFromFormat('d/m/Y', $dtto)->format('Y-m-d');
                $compcode = session()->get('comp_code');
                $results = DB::select('EXEC sp_LaporanPosisiBarang(?,?)', [$datefrForm, $datetoForm]);

                return view('reports.lapposisibrg', [
                    'results' => $results
                ]);
            } else if ($request->searchtext != null) {
                $searchtext = $request->searchtext;
                $dtfr = $request->input('dtfrom');
                $dtto = $request->input('dtto');
                $jenisdok = $request->input('jenisdok');
                $datefrForm = Carbon::createFromFormat('d/m/Y', $dtfr)->format('Y-m-d');
                $datetoForm = Carbon::createFromFormat('d/m/Y', $dtto)->format('Y-m-d');

                $results = DB::select('EXEC sp_LaporanPosisiBarang(?,?)', [$datefrForm, $datetoForm]);

                return view('reports.lapposisibrg', [
                    'results' => $results
                ]);
            }
        }
        return view('reports.lapposisibrg');
    } 
    
    public function exportExcel(Request $request)
    {
        $dtfr = $request->input('dtfrom');
        $dtto = $request->input('dtto');
        $datefrForm = Carbon::createFromFormat('d/m/Y', $dtfr)->format('Y-m-d');
        $datetoForm = Carbon::createFromFormat('d/m/Y', $dtto)->format('Y-m-d');
        $comp_code = session()->get('comp_code');
        $comp_name = session()->get('comp_name');

        $results = DB::select('EXEC sp_LaporanPosisiBarang(?,?)', [$datefrForm, $datetoForm]);

        // dd($results);

        return view('print.excel.lapposisibrg_report', compact('results', 'datefrForm', 'datetoForm', 'comp_name'));
    }

    public function exportPdf(Request $request)
    {
        $dtfr = $request->input('dtfrom');
        $dtto = $request->input('dtto');
        $datefrForm = Carbon::createFromFormat('d/m/Y', $dtfr)->format('Y-m-d');
        $datetoForm = Carbon::createFromFormat('d/m/Y', $dtto)->format('Y-m-d');
        $compcode = session()->get('comp_code');
        $comp_name = session()->get('comp_name');

        $results = DB::select('EXEC sp_LaporanPosisiBarang(?,?)', [$datefrForm, $datetoForm]);

        // dd($results);

        return view('print.pdf.lapposisibrg_report', compact('results', 'datefrForm', 'datetoForm', 'compcode','comp_name'));
    }
}

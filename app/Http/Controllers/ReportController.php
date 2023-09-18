<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {       
        $dateStart = date('d-m-Y', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $dateEnd = date('d-m-Y');

        if ($request->has('date_start') && $request->date_start != "" && $request->has('date_end') && $request->date_end) {
            $dateStart = $request->date_start;
            $dateEnd = $request->date_end;
        }

        return view('report.index', compact('dateStart', 'dateEnd'));
    }

    public function getData($first, $last)
    {
        $startDate = date('d-m-Y', strtotime($first));
        $endDate = date('d-m-Y', strtotime($last));

        $pasiens = Pasien::with('dokter', 'room', 'penjamin')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $no = 1;
        $data = array();

        foreach ($pasiens as $pasien) {
            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['no_rm'] = $pasien->no_rm;
            $row['name'] = $pasien->name;
            $row['address'] = $pasien->address;
            $row['phone'] = $pasien->phone;
            $row['gender'] = $pasien->gender;
            $row['dokter_id'] = $pasien->dokter->name;
            $row['room_id'] = $pasien->room->name;
            $row['penjamin_id'] = $pasien->penjamin->name;
            $row['tgl_registrasi'] = date('d-m-Y', strtotime($pasien->created_at));
            $row['tgl_keluar'] = date('d-m-Y', strtotime($pasien->tgl_keluar));

            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'no_rm' => '',
            'name' => '',
            'address' => '',
            'phone' => '',
            'gender' => '',
            'dokter_id' => '',
            'room_id' => '',
            'penjamin_id' => '',
            'tgl_registrasi' => '',
            'tgl_keluar' => '',
        ];

        return $data;
    }

    public function data($first, $last)
    {
        $data = $this->getData($first, $last);

        return datatables()
            ->of($data)
            ->make(true);
    }

    public function exportPDF($first, $last)
    {
        $data = $this->getData($first, $last);
        $pdf = PDF::loadView('report.pdf', compact('first', 'last', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Daftar-Pasien-'. date('d-m-Y-his') .'.pdf');
    }
}

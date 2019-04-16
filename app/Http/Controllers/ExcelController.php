<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use App\Santri;
class ExcelController extends Controller
{
    public function get_import()
    {
        return view('santri.import');
    }
    public function post_import(Request $request)
    {
        if ($request->hasFile('file_data_santri')) {
            $file = $request->file('file_data_santri');
            $reader = ReaderFactory::create(Type::XLSX);
            $reader->open($file);

            // loop semua shwwr dandapatkan sheet 
            foreach($reader->getSheetIterator() as $sheet){
                if($sheet->getName() === 'santri'){
                    $this->readSantriSheet($sheet); //baca sheet
                }
            }
            return redirect()->route('santri.index')->with('status','Berhasil Melakukan Import Data');
        }
    }

    public function readSantriSheet($sheet){
        foreach ($sheet->getRowIterator() as $idx => $row) {
            if ($idx>1) { //skip baris pertama excel (judul)
                $data = [
                    'nama_lengkap'=> $row[0],
                    'nama_panggilan'=> $row[1],
                    'tgl_lahir'=> $this->formatTanggal($row[2]),
                    'RT'=> $row[3],
                    'RW'=> $row[4],
                    'no_rumah'=> $row[5],
                    'tahun_masuk_tpa'=> $row[6],
                    'nama_orang_tua'=> $row[7],
                    'jenis_kelamin'=> $row[8],
                    'isActive'=> $row[9]=='aktif'?'1':'0',
                ];
                $santri = new Santri();
                $santri->fill($data);
                $santri->save();
            }
        }
       
    }

    public function formatTanggal($row){
        $tanggal = date_create($row);
        $formated = date_format($tanggal, 'Y-m-d');
        return $formated;
    }

    public function exportExcel()
    {
        $title =    ['id','nama_lengkap','nama_panggilan','tgl_lahir','RT','RW','no_rumah', 'url_foto','sekolah_id',
                    'tahun_masuk_tpa','nama_orang_tua','jenis_kelamin','aktif','added_by','kelas_id','created_at','updated_at'];
        
        $fileName = 'Data Santri Exported SI-TPA.xlsx';

        $writer = WriterFactory::create(Type::XLSX);

        $santris = Santri::all();

        $writer->openToBrowser($fileName); //stream data directly to the browser

        $writer->addRow($title); //add title at first line

        foreach ($santris as $idx => $data) {
            $writer->addRow($data->toArray());  //tambahkan data perbaris
        }
        $writer->close();

    }
}

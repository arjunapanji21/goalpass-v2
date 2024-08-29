<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Klub;
use App\Models\Kota;
use App\Models\Wasit;
use Illuminate\Http\Request;

use Imagick;
use ImagickPixel;

use setasign\Fpdi\Tcpdf\Fpdi;
use Intervention\Image\Facades\Image;
use Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WasitController extends Controller
{
    public function index()
    {
        $wasit = Wasit::orderBy('nama', 'asc');
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit->paginate(30),
        ];
        return inertia()->render('wasit/index', compact('master'));
    }
    public function create()
    {
        $master = [
            'title' => 'Input Data Wasit',
            'kota' => Kota::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('wasit/create', compact('master'));
    }
    public function edit($kd_kartu)
    {
        $wasit = Wasit::where('kd_kartu', $kd_kartu)->get()->first();
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit,
            'kota' => Kota::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('wasit/edit', compact('master'));
    }
    public function show($kd_kartu)
    {
        $wasit = Wasit::where('kd_kartu', $kd_kartu)->get()->first();
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit,
            'kota' => Kota::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('wasit/show', compact('master'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'kd_gender' => 'required',
            'foto' => 'required',
            'nik' => 'required|unique:wasits',
        ]);

        $data = $request->all();
        // dd($data);

        try {
            $kota = Kota::find($data['kota_kab']);
            $data['kd_kota'] = $kota->kd_kota;
            $data['kota_kab'] = $kota->nama;
            mkdir(public_path('uploads/wasit/' . $data['nama']));
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_foto_profil.jpg';
                $file->move(public_path('foto_wasit'), $filename);
                $data['foto'] = $filename;
            }
            if ($request->hasFile('KTP')) {
                $file = $request->file('KTP');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_KTP.pdf';
                $file->move(public_path('uploads/wasit/' . $data['nama']), $filename);
                $data['KTP'] = $filename;
            }
            if ($request->hasFile('KK')) {
                $file = $request->file('KK');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_KK.pdf';
                $file->move(public_path('uploads/wasit/' . $data['nama']), $filename);
                $data['KK'] = $filename;
            }
            if ($request->hasFile('sertifikat')) {
                $file = $request->file('sertifikat');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_sertifikat.pdf';
                $file->move(public_path('uploads/wasit/' . $data['nama']), $filename);
                $data['sertifikat'] = $filename;
            }
            if($data['license'] == 'C1'){
                $license = "1";
            }
            else if($data['license'] == 'C2'){
                $license = "2";
            }
            else if($data['license'] == 'C3'){
                $license = "3";
            }
            else if($data['license'] == 'MC'){
                $license = "0";
            }
            if(Wasit::where('kd_kota', $data['kd_kota'])->orderBy('kd_urutkota', 'desc')->first() != null){
                $data['kd_urutkota'] = Wasit::where('kd_kota', $data['kd_kota'])->orderBy('kd_urutkota', 'desc')->first()->kd_urutkota + 1;
            }else{
                $data['kd_urutkota'] = 1;
            }
            if ($data['kd_urutkota'] < 10) {
                $data['kd_kartu'] = $data['kd_kota'] . $data['kd_gender'] . "00" . $data['kd_urutkota'] . date('dmY', strtotime($data['tgl_lahir'])) . $license;
            } else if ($data['kd_urutkota'] < 100) {
                $data['kd_kartu'] = $data['kd_kota'] . $data['kd_gender'] . "0" . $data['kd_urutkota'] . date('dmY', strtotime($data['tgl_lahir'])) . $license;
            } else {
                $data['kd_kartu'] = $data['kd_kota'] . $data['kd_gender'] . $data['kd_urutkota'] . date('dmY', strtotime($data['tgl_lahir'])) . $license;
            }
            $data['tgl_rilis'] = date('Y-m-d H:i:s');
            $data['expired'] = date('Y-m-d H:i:s', strtotime('+2 years', strtotime($data['tgl_rilis'])));
            Wasit::create($data);
            if($license == "0"){
                ActivityLog::create([
                    'ip_add' => $request->ip(),
                    'user' => auth()->user()->nama,
                    'role' => auth()->user()->role,
                    'activity' => "Menambahkan data matchcommisioner a.n. ".$data['nama']." kedalam database.",
                ]);
                return redirect(route('wasit.index'))->with('alert', "Data Matchcommisioner Berhasil Disimpan!");
            }else{
                ActivityLog::create([
                    'ip_add' => $request->ip(),
                    'user' => auth()->user()->nama,
                    'role' => auth()->user()->role,
                    'activity' => "Menambahkan data wasit a.n. ".$data['nama']." kedalam database.",
                ]);
                return redirect(route('wasit.index'))->with('alert', "Data Wasit Berhasil Disimpan!");
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function update(Request $request)
    {
        $wasit = Wasit::orderBy('nama', 'asc');
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit->paginate(30),
        ];
        return inertia()->render('wasit/index', compact('master'));
    }
    public function destroy()
    {
        $wasit = Wasit::orderBy('nama', 'asc');
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit->paginate(30),
        ];
        return inertia()->render('wasit/index', compact('master'));
    }

    public function cetakKartu($kd_kartu)
    {
        $wasit = Wasit::where("kd_kartu", $kd_kartu)->get()->first();
        $pdf = new Fpdi();

        // Get the path to the existing PDF file
        if ($wasit->license == "C1") {
            $existingPdfPath = public_path('template_kartu/wasit/1.pdf');
        } else if ($wasit->license == "C2") {
            $existingPdfPath = public_path('template_kartu/wasit/2.pdf');
        } else if ($wasit->license == "C3") {
            $existingPdfPath = public_path('template_kartu/wasit/3.pdf');
        } else if ($wasit->license == "MC") {
            $existingPdfPath = public_path('template_kartu/wasit/0.pdf');
        } 

        // Set the source file
        $pdf->setSourceFile($existingPdfPath);

        // Import the first page
        $templateId = $pdf->importPage(1);

        // Get the size of the imported page
        $size = $pdf->getTemplateSize($templateId);
        $pdf->SetAutoPageBreak(false);



        // Add a new page with the same size as the imported page
        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $marginLeft = 0;    // Left margin
        $marginTop = 0;     // Top margin
        $marginRight = 0;   // Right margin
        $marginBottom = 0;  // Bottom margin

        $pdf->SetMargins($marginLeft, $marginTop, $marginRight, $marginBottom);

        // Use the imported page as a template
        $pdf->useTemplate($templateId);

        // Set the font and font size for the text
        $pdf->SetFont('Bahnschrift', 'B', 10);
        $pdf->SetTextColor(255, 255, 255);

        // Add the text to the new page
        $pdf->Text(10, 18, strtoupper("Wasit") . ' / ' . $wasit->kota_kab);

        $pdf->SetFont('Bahnschrift', 'B', 18);
        $pdf->SetTextColor(255, 255, 255);

        // Add the text to the new page
        //$pdf->Text(10, 22, '0099 0909 0909 0909');

        $pdf->SetFont('Bahnschrift');

        $pdf->SetTextColor(255, 255, 255);

        // Add the text to the new page
        if (strlen($wasit->nama) > 28)
            $pdf->SetFontSize(8.5);
        else
            $pdf->SetFontSize(9.5);

        $pdf->Text(28, 31, strtoupper($wasit->nama));

        // Add the text to the new page
        $pdf->Text(28, 35, date('d / m / Y', strtotime($wasit->tgl_lahir)));

        $pdf->SetFontSize(10);

        $pdf->Text(35.2, 46.5, date('m/y', strtotime($wasit->expired)));

        // Path to the source image
        $sourceImagePath = public_path('foto_wasit/' . $wasit->foto);

        $image = new Imagick($sourceImagePath);
        $image->roundCorners(20, 20);
        // Set the background color (optional)

        $savePath = public_path('foto_rounded.png'); // Path to save the image

        $image->writeImage($savePath);


        $pdf->Image($savePath, 9.7, 32.2, 15.7, 19); // Adjust the coordinates and dimensions as needed

        $qrCodeImagePath = $this->generateQrCode($wasit->kd_kartu);
        $pdf->Image($qrCodeImagePath, 50.65, 38.5, 14.3, 14.3);

        $umur = $wasit->umur;
        $length = strlen($umur);
        $umurangka = substr($umur, $length - 2);

        // Output the modified PDF
        $file_path = public_path('kartu_wasit/') . $wasit->id . '-' . $wasit->nama . '-' . $wasit->kd_kartu . '.pdf';

        $url =  url('kartu_wasit') . '/' . $wasit->id . '-' . $wasit->nama . '-' . $wasit->kd_kartu . '.pdf';

        $wasit->update([
            'jml_cetak' => $wasit->jml_cetak + 1
        ]);

        $pdf->Output($file_path, 'F');

        echo '<embed src="' . $url . '" type="application/pdf" width="100%" height="600px" />';
    }

    // public function batchDownload(Request $request)
    // {
    //     $data = $request->all();
    //     $queue = [];
    //     foreach ($data['id_anggota'] as $row) {
    //         array_push($queue, Wasit::find($row));
    //     }

    //     $zip_file = 'batch_' . date('YmdHis') . '.zip';

    //     // // Initializing PHP class
    //     $zip = new \ZipArchive();
    //     $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

    //     foreach ($queue as $wasit) {
    //         $pdf = new Fpdi();

    //         // Get the path to the existing PDF file
    //         if ($wasit->umur == "U-9") {
    //             if ($wasit->kd_gender == "01") {
    //                 $existingPdfPath = public_path('template_kartu/u-9.pdf');
    //             } else {
    //                 $existingPdfPath = public_path('template_kartu/srikandi/u-9.pdf');
    //             }
    //         } else if ($wasit->umur == "U-11") {
    //             if ($wasit->kd_gender == "01") {
    //                 $existingPdfPath = public_path('template_kartu/u-11.pdf');
    //             } else {
    //                 $existingPdfPath = public_path('template_kartu/srikandi/u-11.pdf');
    //             }
    //         } else if ($wasit->umur == "U-13") {
    //             if ($wasit->kd_gender == "01") {
    //                 $existingPdfPath = public_path('template_kartu/u-13.pdf');
    //             } else {
    //                 $existingPdfPath = public_path('template_kartu/srikandi/u-13.pdf');
    //             }
    //         } else if ($wasit->umur == "U-15") {
    //             if ($wasit->kd_gender == "01") {
    //                 $existingPdfPath = public_path('template_kartu/u-15.pdf');
    //             } else {
    //                 $existingPdfPath = public_path('template_kartu/srikandi/u-15.pdf');
    //             }
    //         } else if ($wasit->umur == "U-17") {
    //             if ($wasit->kd_gender == "01") {
    //                 $existingPdfPath = public_path('template_kartu/u-17.pdf');
    //             } else {
    //                 $existingPdfPath = public_path('template_kartu/srikandi/u-17.pdf');
    //             }
    //         } else if ($wasit->umur == "SENIOR") {
    //             if ($wasit->kd_gender == "01") {
    //                 $existingPdfPath = public_path('template_kartu/senior.pdf');
    //             } else {
    //                 $existingPdfPath = public_path('template_kartu/srikandi/senior.pdf');
    //             }
    //         }

    //         // Set the source file
    //         $pdf->setSourceFile($existingPdfPath);

    //         // Import the first page
    //         $templateId = $pdf->importPage(1);

    //         // Get the size of the imported page
    //         $size = $pdf->getTemplateSize($templateId);
    //         $pdf->SetAutoPageBreak(false);

    //         // Add a new page with the same size as the imported page
    //         $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
    //         $marginLeft = 0;    // Left margin
    //         $marginTop = 0;     // Top margin
    //         $marginRight = 0;   // Right margin
    //         $marginBottom = 0;  // Bottom margin

    //         $pdf->SetMargins($marginLeft, $marginTop, $marginRight, $marginBottom);

    //         // Use the imported page as a template
    //         $pdf->useTemplate($templateId);

    //         // Set the font and font size for the text
    //         $pdf->SetFont('Bahnschrift', 'B', 10);
    //         $pdf->SetTextColor(255, 255, 255);

    //         // Add the text to the new page
    //         $pdf->Text(10, 18, strtoupper($wasit->klub) . ' / ' . $wasit->kota_kab);

    //         $pdf->SetFont('Bahnschrift', 'B', 18);
    //         $pdf->SetTextColor(255, 255, 255);

    //         // Add the text to the new page
    //         //$pdf->Text(10, 22, '0099 0909 0909 0909');

    //         $pdf->SetFont('Bahnschrift');

    //         $pdf->SetTextColor(255, 255, 255);

    //         // Add the text to the new page
    //         if (strlen($wasit->nama) > 28)
    //             $pdf->SetFontSize(8.5);
    //         else
    //             $pdf->SetFontSize(9.5);

    //         $pdf->Text(28, 31, strtoupper($wasit->nama));

    //         // Add the text to the new page
    //         $pdf->Text(28, 35, date('d / m / Y', strtotime($wasit->tgl_lahir)));

    //         $pdf->SetFontSize(10);

    //         $pdf->Text(35.2, 46.5, $wasit->expired);

    //         // Path to the source image
    //         $sourceImagePath = public_path('foto_anggota/' . $wasit->foto);

    //         $image = new Imagick($sourceImagePath);
    //         $image->roundCorners(20, 20);
    //         // Set the background color (optional)

    //         $savePath = public_path('foto_rounded.png'); // Path to save the image

    //         $image->writeImage($savePath);


    //         $pdf->Image($savePath, 9.7, 32.2, 15.7, 19); // Adjust the coordinates and dimensions as needed

    //         $qrCodeImagePath = $this->generateQrCode($wasit->kd_kartu);
    //         $pdf->Image($qrCodeImagePath, 50.65, 38.5, 14.3, 14.3);

    //         $umur = $wasit->umur;
    //         $length = strlen($umur);
    //         $umurangka = substr($umur, $length - 2);

    //         // Output the modified PDF
    //         $file_path = public_path('kartu_anggota/') . $umurangka . '-' . $wasit->id . '-' . $wasit->nama . '-' . $wasit->kd_kartu . '.pdf';

    //         $wasit->update([
    //             'jml_cetak' => $wasit->jml_cetak + 1
    //         ]);

    //         $pdf->Output($file_path, 'F');

    //         $zip->addFile($file_path);
    //     }
    //     $zip->close();
    //     return back()->with('download', $zip_file);
    // }

    public function cekKartu($kd_kartu)
    {
        // $wasit = Anggota::where("kd_kartu", $kd_kartu)->get()->first();


        // $umur = $wasit->umur;
        // $length = strlen($umur);
        // $umurangka = substr($umur, $length - 2);


        // // Output the modified PDF
        // $file_path = public_path('kartu_anggota/') . $umurangka . '-' . $wasit->no_xls . '-' . $wasit->nama . '-' . $wasit->kd_kartu . '.pdf';

        // $url =  url('kartu_anggota') . '/' . $umurangka . '-' . $wasit->no_xls . '-' . $wasit->nama . '-' . $wasit->kd_kartu . '.pdf';


        // return view('pdfviewer', compact('url'));
        $wasit = Wasit::where('kd_kartu', $kd_kartu)->get()->first();
        if ($wasit->license == "C1") {
            $templateKartu = public_path('template_kartu/wasit/1.pdf');
        } else if ($wasit->license == "C2") {
            $templateKartu = public_path('template_kartu/wasit/2.pdf');
        } 

        $master = [
            'title' => 'Profil Wasit',
            'anggota' => $wasit,
            'template_kartu' => $templateKartu,
        ];

        return inertia()->render('anggota_profile_public', compact('master'));
    }

    public function generateQrCode($kd_kartu)
    {
        // QR code content (e.g., a URL)
        $content = 'https://goalpass-asprovjabar.id/cekdata/wasit/' . $kd_kartu;

        // Generate the QR code image
        $qrCodeImagePath = public_path('qr/qrcode.png');
        QrCode::size(200)->format('png')->generate($content, $qrCodeImagePath);

        // Return the path to the QR code image
        return $qrCodeImagePath;
    }
}

<?php

namespace App\Controllers;

use App\Models\DataModel;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Home extends BaseController
{
    protected $qrnya;


    public function index()
    {
        return view('qr_code');
    }


    public function createQR()
    {
        $inputan =  $_POST['kalimat'];
        // $inputan = "babi";
        $writer = new PngWriter();
        $qrCode = QrCode::create($inputan)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // $label = Label::create("id = " . $idlog)
        // ->setTextColor(new Color(255, 0, 0));
        $result = $writer->write($qrCode, null, null);
        // header('Content-Type: ' . $result->getMimeType());

        $result->saveToFile(WRITEPATH . "uploads\\" . $inputan . ".png");
        $dataUri = $result->getDataUri();
        $data['img'] = $dataUri;
        return view('qr_code', $data);
        // return "<img src='{$result->getDataUri()}'/>";
    }
}

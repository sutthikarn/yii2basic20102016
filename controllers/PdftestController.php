<?php


namespace app\controllers;

use kartik\mpdf\Pdf;

class PdftestController extends \yii\web\Controller {

    public function actionIndex() {
        
        //step 1 logic processing
        //สร้างการเชื่อมต่อ
        
        $conn=\Yii::$app->db;
        $sql='select * from com_type';
        $cmd=$conn->createCommand($sql);
        $data=$cmd->queryAll();
        
               
        
        //ดึงค่าจากview indexมาแสดงpdf
        $content = $this->renderPartial('index',['data'=>$data]);
        //รูปแบบคำสั่งpdf
        $pdf = new Pdf([
// set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
// A4 paper format
            'format' => Pdf::FORMAT_A4,
// portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
// stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
// your html content input
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
// any css to be embedded if required
            'cssInline' => 'body{font-family: "Garuda";font-size: 12pt;}',
// set mPDF properties on the fly
            'options' => ['title' => 'บันทึกข ้อความ'],
// call mPDF methods on the fly
            'methods' => [
//'SetHeader' => ['Krajee Report Header'],
//'SetFooter' => ['{PAGENO}'],
            ]
        ]);
// return the pdf output as per the destination setting
        return $pdf->render();
    }

}

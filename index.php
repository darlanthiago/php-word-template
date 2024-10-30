<?php
include 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;



try {

    $templateProcessor = new TemplateProcessor('template.docx');

    // Gerado por https://www.4devs.com.br/gerador_de_pessoas
    $templateProcessor->setValue('name', 'Eduarda Isabella Nair Nascimento');
    $templateProcessor->setValue('datebirth', '15/08/2000');
    $templateProcessor->setValue('email', 'eduarda-nascimento99@spires.com.br');
    $templateProcessor->setValue('whatsapp', '(81) 99316-2732');

    $random = md5(rand(1, 100000));

    $templateProcessor->saveAs("./exports/{$random}.docx");


    Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
    Settings::setPdfRendererPath('.');

    $phpWord = IOFactory::load("./exports/{$random}.docx", 'Word2007');
    $phpWord->save("./exports/{$random}.pdf", 'PDF');

    echo "Success";
} catch (\Throwable $th) {
    echo $th->getMessage();
}

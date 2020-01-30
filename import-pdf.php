<?php
/*
Using PDFParser without Composer
Folder structure
================
webroot
  pdfdemos
    INV001.pdf # test PDF file to extract text from for demo
    test.php # our operational demo file
  vendor
    autoload.php
    tecnickcom
      tcpdf # unpack v6.2.12 from release at https://github.com/tecnickcom/TCPDF/archive/6.2.12.tar.gz
    smalot
      pdfparser # unpack from git master https://github.com/smalot/pdfparser/archive/master.zip release is 0.9.25 dated 2015-09-15
        docs # optional
        samples # optional
        src
          Smalot
            PdfParser
*/

$vendorDir = '';
$tcpdf_files = Array(
    'Datamatrix' => $vendorDir . 'TCPDF-master/include/barcodes/datamatrix.php',
    'PDF417' => $vendorDir . 'TCPDF-master/include/barcodes/pdf417.php',
    'QRcode' => $vendorDir . 'TCPDF-master/include/barcodes/qrcode.php',
    'TCPDF' => $vendorDir . 'TCPDF-master/tcpdf.php',
    'TCPDF2DBarcode' => $vendorDir . 'TCPDF-master/tcpdf_barcodes_2d.php',
    'TCPDFBarcode' => $vendorDir . 'TCPDF-master/tcpdf_barcodes_1d.php',
    'TCPDF_COLORS' => $vendorDir . 'TCPDF-master/include/tcpdf_colors.php',
    'TCPDF_FILTERS' => $vendorDir . 'TCPDF-master/include/tcpdf_filters.php',
    'TCPDF_FONTS' => $vendorDir . 'TCPDF-master/include/tcpdf_fonts.php',
    'TCPDF_FONT_DATA' => $vendorDir . 'TCPDF-master/include/tcpdf_font_data.php',
    'TCPDF_IMAGES' => $vendorDir . 'TCPDF-master/include/tcpdf_images.php',
    'TCPDF_IMPORT' => $vendorDir . 'TCPDF-master/tcpdf_import.php',
    'TCPDF_PARSER' => $vendorDir . 'TCPDF-master/tcpdf_parser.php',
    'TCPDF_STATIC' => $vendorDir . 'TCPDF-master/include/tcpdf_static.php'
);

foreach ($tcpdf_files as $key => $file) {
    include_once $file;
}

include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Parser.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Document.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Header.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/PDFObject.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Encoding.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Font.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Page.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Pages.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementArray.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementBoolean.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementString.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementDate.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementHexa.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementMissing.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementName.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementNull.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementNumeric.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementStruct.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Element/ElementXRef.php";

include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Encoding/StandardEncoding.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Encoding/ISOLatin1Encoding.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Encoding/ISOLatin9Encoding.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Encoding/MacRomanEncoding.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Encoding/WinAnsiEncoding.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Font/FontCIDFontType0.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Font/FontCIDFontType2.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Font/FontTrueType.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Font/FontType0.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/Font/FontType1.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/XObject/Form.php";
include_once  $vendorDir . "pdfparser-master/src/Smalot/PdfParser/XObject/Image.php";

/*
// Information for comparison with composer
use Datamatrix;
use PDF417;
use QRcode;
use TCPDF;
use TCPDF2DBarcode;
use TCPDFBarcode;
use TCPDF_COLORS;
use TCPDF_FILTERS;
use TCPDF_FONTS;
use TCPDF_FONT_DATA;
use TCPDF_IMAGES;
use TCPDF_IMPORT;
use TCPDF_PARSER;
use TCPDF_STATIC;
*/
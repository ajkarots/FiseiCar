</?php
require_once __DIR__ . '../mpdf/vendor/autoload.php'; // Importa autoload de composer

// Crear una instancia de Mpdf
$mpdf = new \Mpdf\Mpdf();

// Capturar el contenido HTML desde un archivo o cadena
$html = file_get_contents('pagina.html'); // O usa directamente una cadena con HTML

// Agregar el contenido al PDF
$mpdf->WriteHTML($html);




// Generar el PDF y forzar la descarga
$mpdf->Output('mi_archivo.pdf', \Mpdf\Output\Destination::DOWNLOAD);
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require 'vendor/autoload.php';  // Ensure this path is correct
use Dompdf\Dompdf;

// Initialize Dompdf
$dompdf = new Dompdf();

// URL or path to the page with dynamic content
$contentUrl = 'preview?id=1';  // Adjust this URL/path as needed

// Fetch content from the specified URL
function fetchContent($url) {
    // Use cURL to fetch the content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

// Get dynamic content from the specified URL
$dynamicContent = fetchContent($contentUrl);

// Extract only the content of the div with id="sectionToPrint"
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Disable errors due to malformed HTML
$dom->loadHTML($contentUrl);
libxml_clear_errors();
$xpath = new DOMXPath($dom);
$sectionToPrint = $xpath->query('//div[@id="sectionToPrint"]')->item(0);

if ($sectionToPrint) {
    // Remove unwanted text
    $content = $dom->saveHTML($sectionToPrint);

    // Remove "Preview" and "Print" text
    $content = str_replace(['Print'], '', $content);

    // Optionally: remove any specific buttons if needed
    $buttons = $xpath->query('//button[contains(text(), "Print")]');
    foreach ($buttons as $button) {
        $button->parentNode->removeChild($button);
    }
} else {
    $content = '<p>No content found for the specified ID.</p>';
}

// Add Bootstrap CSS inline
$bootstrapCss = file_get_contents('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

// Add custom CSS inline if needed
$customCss = "
<style>
    /* Add your custom CSS here */
    body { margin: 0; padding: 0; }
</style>
";

// Inject CSS into the HTML content
$dynamicContentWithCss = "<style>{$bootstrapCss}</style>{$customCss}{$content}";

// Load content into Dompdf
$dompdf->loadHtml($dynamicContentWithCss);

// Set paper size and orientation (optional)
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to browser (force download)
$dompdf->stream("dynamic_content.pdf", ["Attachment" => 1]);

exit;
?>

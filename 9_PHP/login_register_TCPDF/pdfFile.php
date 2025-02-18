<?php
require 'vendor/tecnickcom/tcpdf/tcpdf.php';

function printToPDF($user)
{
    // variables
    $username = $user['name'];
    $useremail = $user['email'];
    $userstatus = $user['status'] == 1 ? 'Active' : 'Inactive';
    $userdate = $user['date'];

    // Create a new TCPDF object
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set the PDF metadata
    // $pdf->SetCreator(PDF_CREATOR);
    // $pdf->SetAuthor('Your Name');
    // $pdf->SetTitle('User Details');
    // $pdf->SetSubject('User Details');
    // $pdf->SetKeywords('User, Details');

    // Add a page to the PDF
    $pdf->AddPage();

    // Set the font and font size
    $pdf->SetFont('Helvetica', '', 12);

    // Add the user details to the PDF
    $pdf->Ln(20);
    $pdf->Cell(0, 10, 'Username: ' . $username, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Email: ' . $useremail, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Status: ' . $userstatus, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Date created: ' . $userdate, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Einde van het document', 0, 1, 'C');

    // Output the PDF
    $pdf->Output('user_details.pdf', 'I');
}

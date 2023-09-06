<?php

namespace Classes;
use Dompdf\Dompdf;
require 'vendor/autoload.php';
class pdfGenerator
{
    private $outputDirectory = "storage/ReportStorage";
    public function generatePDF($appointmentNo, $template)
    {
        $dompdf = new Dompdf();

        $dompdf->loadHtml($template);

        $dompdf->setPaper('A4', 'portrait'); // Change to portrait mode for regular header

        $dompdf->render();



        $output = $dompdf->output();

        $pdfFilePath = $this->outputDirectory . '/' . $appointmentNo.".pdf";

        file_put_contents($pdfFilePath, $output); // Save the PDF to the specified directory

        return $pdfFilePath;
    }

//    public function generateUrineTemplate($customer, $data): string
//    {
//        return '
//    <style>
//    body {
//        border: 2px solid black; /* Add border to the whole page */
//        padding: 10px; /* Add some padding to the content */
//    }
//
//    table {
//        width: 100%;
//        border-collapse: collapse;
//    }
//    th, td {
//        border: 1px solid black;
//        padding: 8px;
//        text-align: center;
//    }
//    /* Footer styles */
//    .footer {
//        position: fixed;
//        bottom: 20px;
//        left: 0;
//        right: 0;
//        text-align: center;
//    }
//    </style>
//        <div style="text-align: center;">
//            <img src="logo.png" alt="Laboratory Logo" width="100" height="100">
//            <h1 style="color: blue;">Lab Report: Urine Test</h1>
//            <p>Randox Laboratory</p>
//        </div>
//
//        <h2>Report Details:</h2>
//        <p>Patient Name: ' . $customer . '</p>
//        <p>Test Date: ' . date('Y-m-d') . '</p>
//        <!-- Add more report details here -->
//
//        <h2>Urine Parameters and Values:</h2>
//        <table>
//            <tr>
//                <th>Parameter</th>
//                <th>Value</th>
//            </tr>
//            <tr>
//                <td>Red Blood Count</td>
//                <td>' . $data['urine'] . '</td>
//            </tr>
//            <tr>
//                <td>Protein</td>
//                <td>' . $data['urine'] . '</td>
//            </tr>
//            <tr>
//                <td>Glucose</td>
//                <td>' . $data['urine'] . '</td>
//            </tr>
//            <tr>
//                <td>Specific Gravity</td>
//                <td>' . $data['urine'] . '</td>
//            </tr>
//            <tr>
//                <td>Color</td>
//                <td>' . $data['urine'] . '</td>
//            </tr>
//            <!-- Add more rows as needed -->
//        </table>
//        <!-- Footer section -->
//
//        <div class="footer">
//            <p><h3>Your health, Our Commitment<h3></p><br>
//            <p>We are dedicated to providing you with a great service</P>
//        </div>';
//    }

    public function generatelipidprofileTemplate($customer, $data): string
    {

        $template = '
    <style>
    body {
        border: 2px solid black; /* Add border to the whole page */
        padding: 10px; /* Add some padding to the content */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
    /* Footer styles */
    .footer {
        position: fixed;
        bottom: 20px;
        left: 0;
        right: 0;
        text-align: center;
    }
    
   
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left; /* Set text alignment to left */
            padding: 8px;
            border: 1px solid black;
        }
   
    </style>
        <div style="text-align: center;">
            <img src="assets/images/logo/logo.png" alt="Laboratory Logo" width="100" height="100">
            <h1>RANDOX LABORATORY</h1>
        <h3>PASSARA ROAD, BADULLA</h3>
        <h4>TEL: 0705063342</h4>
        <h4>EMAIL: randox@gmail.com</h4>
            <h1 style="color: blue;">Lab Report: Lipid Profile</h1>
            <p>Randox Laboratory</p>
        </div>

         <h2>Report Details:</h2>
        <p><b>Patient Name:</b> Kalana Piyumantha Gamage</p>
        <p><b>Age:</b> 38 years</p>
        <p><b>Gender:</b> Male</p>
        <p><b>Test Date:<b></b> ' . date('Y-m-d') . '</p>     
   
        <h2>Lipid profile</h2>
        <table>
            <tr>
                <th>Test</th>
                <th>Result</th>
                 <th>Reference Value</th>
            </tr>
            <tr>
                <td>Cholestrol-Total</td>
                <td>' . $data["chol-total"] . '</td>
                     <td>140.0 - 239.0</td>
            </tr>
            <tr>
                <td> Triglycerides </td>
                <td>' . $data["chol-tri"] . '</td>
                 <td>10.0 - 200.0</td>
            </tr>
            <tr>
                <td>Cholestrol - H.D.L</td>
                <td>' . $data["chol-H"] . '</td>
                 <td>35.0 - 85.0</td>
            </tr>
            <tr>
                <td>Cholestrol - L.D.L</td>
                <td>' . $data["chol-L"] . '</td>
                 <td>75.0 - 159.0</td>
            </tr>
           
       
            
            <!-- Add more rows as needed -->
        </table>
        <!-- Footer section -->

        <div class="footer">
            <p><h3>Your health, Our Commitment<h3></p><br>
            <p>We are dedicated to providing you with a great service</P>
        </div>';
        return $template;
    }

    public function generateFullBloodTemplate($customer, $data): string
    {

        $template = '
    <style>
    body {
        border: 2px solid black; /* Add border to the whole page */
        padding: 10px; /* Add some padding to the content */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
    /* Footer styles */
    .footer {
        position: fixed;
        bottom: 20px;
        left: 0;
        right: 0;
        text-align: center;
    }
    </style>
        <div style="text-align: center;">
            <!--<img src="assets/images/logo/logo.png" alt="Laboratory Logo" width="100" height="100">-->
             <div>
              <img src="assets/images/logo/logo.png" alt="Laboratory Logo" width="100" height="100">
        <h1>RANDOX LABORATORY</h1>
        <h3>PASSARA ROAD, BADULLA</h3>
        <h4>TEL: 0705063342</h4>
        <h4>EMAIL: randox@gmail.com</h4>
</div>
            <h1 style="color: blue;">Lab Report: Full Blood Report</h1>
            <hr>
        </div>
       
   <table style="border: none;"> 
   <tr style="border: none;float: left;">
   <h2>Report Details:</h2>
   </tr>
   <tr >
   <td style="border: none;text-align: left;"><p><b>Patient Name:</b> Kalana Piyumantha Gamage</p></td>
   <td style="border: none;text-align: left;"> <p><b>Age:</b> 38 years</p></td>
</tr>
<tr>
<td style="border: none;text-align: left;"><p><b>Gender:</b> Male</p></td>
<td style="border: none;text-align: left;"><p><b>Test Date:</b> ' . date('Y-m-d') . '</p></td>
</tr>
   
       
        
       
</table>
      <!--  <h2>Report Details:</h2>
        <p>Patient Name: Kalana Piyumantha Gamage</p>
        <p>Age: 38 years</p>
        <p>Gender: Male</p>
        <p>Test Date: ' . date('Y-m-d') . '</p>-->

        <!-- Add more report details here -->
<h2>Full Blood Report</h2>
        <table>
            <tr>
                <th>Test</th>
                <th>Result</th>
                 <th>Reference Value</th>
            </tr>
            <tr>
                <td>Haemoglobin</td>
                <td>' . $data["blood-haemoglobin"] . '</td>
                     <td>135.0 - 180.0</td>
            </tr>
            <tr>
                <td>White Blood Count x10<sup>9</sup>/L</td>
                <td>' . $data["wbc"] . '</td>
                 <td>4.0 - 11.00</td>
            </tr>
            <tr>
                <td>Platelets  x10<sup>9</sup>/L</td>
                <td>' . $data["platelets"] . '</td>
                 <td>150.0-400.0</td>
            </tr>
            <tr>
                <td>MCV</td>
                <td>' . $data["mcv"] . '</td>
                 <td>75.0 - 159.0</td>
            </tr>
              <tr>
                <td>PCV</td>
                <td>' . $data["pcv"] . '</td>
                 <td>0.37 - 0.47</td>
            </tr>
              <tr>
                <td>RDW</td>
                <td>' . $data["rdw"] . '</td>
                 <td>11.5 - 15.0</td>
            </tr>
            
            <!-- Add more rows as needed -->
        </table>
        <!-- Footer section -->

        <div class="footer">
            <p><h3>Your health, Our Commitment<h3></p><br>
            <p>We are dedicated to providing you with a great service</P>
        </div>';
        return $template;
    }



}
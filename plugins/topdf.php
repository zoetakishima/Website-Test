<?php
require "pdfcrowd.php";

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("murashi", "24fc1a56217fb223de8fb99714e1e1a5");

    // run the conversion and store the result into the "pdf" variable
    $pdf = $client->convertUrl("http://www.example.com");

    // at this point the "pdf" variable contains PDF raw data and
    // can be sent in an HTTP response, saved to a file, etc.
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebpagesLink; // Assuming you have a WebpageLink model

class SSLController extends Controller
{
    public function getCertificateInfo()
    {
        $links = WebpagesLink::all(); // Fetch all links from the database

        $linksWithCertInfo = $links->map(function ($link) {
            $context = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
            $read = stream_socket_client("ssl://" . $link->link . ":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);
            $cert = stream_context_get_params($read);
            $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

            // Add the certificate expiration date to the link object
            $link->cert_expiration_date = date('Y-m-d H:i:s', $certinfo['validTo_time_t']);

            return $link;
        });

        return view('certificate', ['links' => $linksWithCertInfo]);
    }
}
<?php

class Objavi extends ZaposlenPage {

    protected $page_title = "Objava obaveze";

    protected function rows() {

        $data['obaveza'] = $this->Zaposlen_model->novaObaveza();
        $this->load->view('zaposlen/objavi.php', $data);
    }

    public function post() {
        //funkcija kontrolera koja preuzima podatke od forme Obavesi i stavlja ih u bazu
        //ovde samo ispisujem da vidim da ce biti upisanu u bazu ali ne upisujem jos!

        $obaveza_id = $this->input->get_post('obaveza_id', TRUE);
        $naslov = $this->input->get_post('naslov', TRUE);
        $predmet = $this->input->get_post('predmet', TRUE);
        $datum = $this->input->get_post('datum', TRUE);
        $vreme = $this->input->get_post('vreme', TRUE);
        $tip = $this->input->get_post('tip', TRUE);
        $obavestenje = $this->input->get_post('obavestenje', TRUE);

        $this->Zaposlen_model->sacuvajObavezu($obaveza_id, $naslov, $predmet, $datum, $vreme, $obavestenje,$tip);
        //slanje mejla na mejling listu
        $this->email->from(UserData::getUserID().'@etf.bg.ac.rs', UserData::getUserName());
        $this->email->to('nikolamaxa93@gmail.com');// za testiranje koriscena sm120507d@student.etf.rs
        $this->email->subject($predmet." - $naslov");
        $this->email->message("$obavestenje\r\nRok za predaju je $datum $vreme");
        if(!$this->email->send()) echo 'Mejl sa obaveštenjem nije poslat!';
        
        echo TRUE;
    }

    protected function jsscripts() {
        $this->load->view('zaposlen/jsscripts.php');
    }

    public function upload_tekst($obaveza_id) {
        if (!$_FILES['uploadfile']['error']) {
            $targetDir = '/';

            $file = $_FILES['uploadfile'];

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);




            $fileName = $file['name'];

            if (!file_exists('files/obaveza/' . $obaveza_id))
                @mkdir('files/obaveza/' . $obaveza_id);

            $destinationfile = 'files/obaveza/' . $obaveza_id . "/" . "tekst_zadatka." . $ext;



            if (move_uploaded_file($file['tmp_name'], $destinationfile)) {
                echo $fileName;
            } else {
                echo 'upload_error';
            }
        } else {
            echo 'upload_error';
        }

        $config['upload_path'] = 'files/obaveza/';

        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        $data = array('uploadfile' => $this->upload->data());
    }

    public function upload($obaveza_id) {

        /**
         * upload.php
         *
         * Copyright 2009, Moxiecode Systems AB
         * Released under GPL License.
         *
         * License: http://www.plupload.com/license
         * Contributing: http://www.plupload.com/contributing
         */
// HTTP headers for no cache etc
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

// Settings
//$targetDir = ini_get("files") . DIRECTORY_SEPARATOR . "obaveza";
        // $folder_id = $this -> input ->post('obavezaid');


        $targetDir = 'files/obaveza/' . $obaveza_id . '/';

        //  $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
// 5 minutes execution time
        @set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);
// Get parameters
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

// Clean the fileName for security reasons
        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

// Make sure the fileName is unique but only if chunking is disabled
        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);

            $count = 1;
            while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;

            $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Create target dir
        if (!file_exists($targetDir))
            @mkdir($targetDir);

// Remove old temp files	
        if ($cleanupTargetDir) {
            if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    // Remove temp file if it is older than the max age and is not the current file
                    if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            } else {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
        }

// Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];

// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Open temp file
                $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = @fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    @fclose($in);
                    @fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = @fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                @fclose($in);
                @fclose($out);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

// Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off 
            rename("{$filePath}.part", $filePath);
        }

        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }

}

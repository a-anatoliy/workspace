<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 14.02.2018
 * Time: 14:55
 */
class Utils {

    /**
     * @param $directoryPath
     */
    public function readDirectory($directoryPath) {
        if ($handle = opendir($directoryPath)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    echo "$entry\n";
                }
            }
            closedir($handle);
        }
    }

    /**
     * check if filename exists in provided path
     * propose new filename if given filename already exists
     * @param $path
     * @param $filename
     * @return string
     */
    public function checkFileName($path, $filename) {
        if ($pos  = strrpos($filename, '.')) {
            $name = substr($filename, 0, $pos);
            $ext  = substr($filename, $pos);
        } else {
            $name = $filename;
        }

        $newpath = $path.'/'.$filename;
        $newname = $filename;
        $counter = 0;
        while (file_exists($newpath)) {
            $newname = $name .'_'. $counter . $ext;
            $newpath = $path.'/'.$newname;
            $counter++;
        }
        return $newname;
    }

    /**
     * @param $availableLanguages
     * @param string $default
     * @return bool|string
     */
    public function get_client_language($availableLanguages, $default='en'){
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $langs=explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);

            foreach ($langs as $value){
                $choice=substr($value,0,2);
                if(in_array($choice, $availableLanguages)){
                    return $choice;
                }
            }
        }
        return $default;
    }

    /**
     * @param $string
     * @param $limit
     * @return bool|string
     */
    public function trimString($string,$limit) {
        $string = strip_tags($string);
        $string = substr($string, 0, $limit);
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
        $string.="… ";
        return $string;
    }

    public function writeFile($file,$entry) {
        $fp = fopen($file, 'a+', LOCK_EX)
            or die("ERROR: Can't write to [".$file."], please make sure that your path is correct and you have
                    appropriate permissions on the target directory and/or file!");
        fputs($fp, $entry);
        fclose($fp);
    }

    public function dumpObjToFile($fileName,$obj) {
//        $data = array('one', 'two', 'three');
        $fh = fopen($fileName, 'w') or die("Can't open file $fileName");
        // output the value as a variable by setting the 2nd parameter to true
        $results = print_r($obj, true);
        fwrite($fh, $results);
        fclose($fh);
    }

    public function checkFileExists( $filename ) {
        return (file_exists($filename) ? true : false);
    }

    public function extractEmail($string){
//      preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string, $matches);
      preg_match_all("/([a-z0-9_\.\-])+(\@|\[at\])+(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i", $string, $matches);
      return $matches[0];
    }

    public function getHtml($url, $post = null) {
      $ch = curl_init();
      $userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
      curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      if(!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      }
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }

}


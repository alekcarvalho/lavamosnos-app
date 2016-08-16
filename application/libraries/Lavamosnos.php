<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('service/vendor/autoload.php');

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class Lavamosnos {

  protected $__keyword = 'ln-apps';

  public function __construct() {}
  
  public function curl($url, $result = 'json', $params = array(), $header = array()){

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);

      if(!empty($header))
          curl_setopt($ch,CURLOPT_HTTPHEADER, $header);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      if(!empty($params))
          curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($params));

      $return = curl_exec($ch);

      if($result == 'array')
          $return = json_decode($return, true);

      curl_close($ch);

      return $return;

  }

  public function pointPolygon($polygon, $point){

    $onPolygon = false;

    $pX = floatval($point[0]);
    $pY = floatval($point[1]);

    $totalPoints = count($polygon);
    $j = $totalPoints - 1;

    for ($i = 0; $i < $totalPoints; $i++) {

      $pIni = $polygon[$i];
      $pEnd = $polygon[$j];

      if (
        floatval($pIni['x']) <  $pX &&
        floatval($pEnd['x']) >= $pX ||
        floatval($pEnd['x']) <  $pX &&
        floatval($pIni['x']) >= $pX
      ) {
        if (
          floatval($pIni['y']) +
          ($pX - floatval($pIni['x'])) /
          (floatval($pEnd['x']) - floatval($pIni['x'])) *
          (floatval($pEnd['y']) - floatval($pIni['y'])) <
          $pY
        ) {
          $onPolygon = !$onPolygon;
        }
      }

      $j = $i;

    }

    return $onPolygon;

  } 

  public function salveFileS3Local($file,$path, $name){

    if (!class_exists('S3')) require_once 'S3/S3.class.php';
    if (!class_exists('S3Request')) require_once 'S3/S3Request.class.php';
    if (!class_exists('S3Wrapper')) require_once 'S3/S3Wrapper.class.php';

    $s3 = new S3(awsAccessKey, awsSecretKey);

    $s3->putObjectFile($file, awsBucket, $path.'/'.baseName($name), S3::ACL_PUBLIC_READ);
          
  }


  public function salveFileS3($dataIMG, $path, $novo_nome){

    if (!class_exists('S3')) require_once 'S3/S3.class.php';
    if (!class_exists('S3Request')) require_once 'S3/S3Request.class.php';
    if (!class_exists('S3Wrapper')) require_once 'S3/S3Wrapper.class.php';

    S3::setAuth(awsAccessKey, awsSecretKey);

    $bucket = awsBucket;
    
    list($type, $dataIMG) = explode(';', $dataIMG);
    list(, $dataIMG)      = explode(',', $dataIMG);
    $dataIMG = base64_decode($dataIMG);

    $stream = fopen("s3://{$bucket}/".$path.'/'.$novo_nome, 'w');

    fwrite($stream, $dataIMG);
    fclose($stream);

    return true;

  }

  public function validaPost(){

    if($_SERVER['REQUEST_METHOD'] !== 'POST') 
      return false;

    return true;

  }

  public function authUser($session){

    if(!isset($session->user['ln-' . APPTYPE]['ln-login']) || ($session->user['ln-' . APPTYPE]['ln-login'] !== true)){

      if($this->checkCookie($session) === null){

        redirect('/login');

        die;
        
      }

    }

  }

  public function authUserReverse($session){

    if((isset($session->user['ln-' . APPTYPE]['ln-login']) && ($session->user['ln-' . APPTYPE]['ln-login'] !== false)) || ($this->checkCookie($session) !== null)){

      redirect('/');

      die;

    }

  }

  private function checkCookie($session){

      if(isset($_COOKIE['ln-'.APPTYPE.'-connect'])){

        $auto = json_decode($this->service('user','delivery','checkCookie',['code_auth' => $_COOKIE['ln-'.APPTYPE.'-connect']]),true);

        if($auto['response']['check'] !== false){

          unset($session->user);

          $auto['response']['data']['ln-login'] = true;

          $session->user = ['ln-'.APPTYPE => $auto['response']['data']];

          return true;

        }

        unset($_COOKIE['ln-'.APPTYPE.'-connect']);
        
        return false;
        
      }

  }

  public function service($mod,$type,$method,$args = array()){

    $header = array(
                      'tkn : ' . $this->jwtGen($mod),
                      'call : ' . $this->callGen($mod,$type,$method)
                   );

    $args['csm'] = APPTYPE;

    return $this->curl(site_url('api'),'json',$args,$header);

  }

  private function jwtGen($mod){

    $signer = new Sha256();

    $token = (new Builder())->setIssuer('lavamosnos.co')
                            ->set('dthm', date('YmdH'))
                            ->set('csm', APPTYPE)
                            ->set('mod', $mod)
                            ->sign($signer, 'bG4tYXBwcw==')
                            ->getToken();

    return $token;

  }

  private function callGen($mod,$type,$method){

    return base64_encode($mod) . '.' . base64_encode($type) . '.' . base64_encode($method);

  }

  public function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){

    $lmin = 'abcdefghijklmnopqrstuvwxyz';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
    $simb = '!@#$%*-';
    $retorno = '';
    $caracteres = '';
  
    $caracteres .= $lmin;

    if ($maiusculas) $caracteres .= $lmai;
    if ($numeros) $caracteres .= $num;
    if ($simbolos) $caracteres .= $simb;
  
    $len = strlen($caracteres);

    for ($n = 1; $n <= $tamanho; $n++) {

      $rand = mt_rand(1, $len);
      $retorno .= $caracteres[$rand-1];

    }

    return $retorno;

  }

}

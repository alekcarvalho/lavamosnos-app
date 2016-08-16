<?php

class Push {

	public $logFile = 'log.log';

	public function __construct(){


	}
	
	public static function send($data){

		$push = new self;
		
		if(!isset($data['token']){

			error_log("No device token given" . PHP_EOL, 3, $push->logFile);
			return false;

		}
		
		if(!isset($data['device']){

			error_log("No device Type given" . PHP_EOL, 3, $push->logFile);
			return false;

		}
		
		if( ($data['device'] != 'iOS') && ($data['device'] != 'Android') ){

			error_log("Device type unknown" . PHP_EOL, 3, $push->logFile);
			return false;

		}
		
		if( ($data['device'] == 'iOS') && (strlen($data['token']) != 64) ){

			error_log("token seems to be of wrong size for deviceType ios" . PHP_EOL, 3, $push->logFile);
			return false;

		}
		
		if(!isset($data['message'])
			error_log("No messgae given, sending default message to ". $data['token'] . " on " . $data['device'] . PHP_EOL, 3, $push->logFile);
		
		if($data['device'] == 'iOS'){

			$push->sendIos($data['token'], $data['message'], $data['data']);

		}else if($data['device'] == 'Android'){

			$push->sendAndroid($data['token'], $data['message'], $data['data']);

		}
		
	}
	
	private function sendIos($token, $message, $data){

		$development = true;
		
    	$deviceToken = $token ? : 'TOKEN_LN';

	    $message = $message ? : 'Aviso de lavamosnos.co';

		$passphrase = 'L4v4m05N05!2016';
		
    	$ctx = stream_context_create();

		if($development !== false){

			$gateway = 'ssl://gateway.sandbox.push.apple.com:2195';
			stream_context_set_option($ctx, 'ssl', 'local_cert', 'certs/apns-dev-5.pem');
			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

		}else{

			$gateway = 'ssl://gateway.push.apple.com:2195';
			stream_context_set_option($ctx, 'ssl', 'local_cert', 'certs/apns-dist-5.pem');
			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

		}
		
		$fp = stream_socket_client($gateway, $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
    	if ($fp === false){

			error_log("Failed to connect: $err $errstr" . PHP_EOL, 3, $this->logFile);
      		return false;
			
		}
    
		stream_set_blocking($fp, 0);

	    $body['aps'] = array(
				'alert' => $message,
				'sound' => 'default',
				'custom' => $data,
				//idDistribuidor => $idDist,
				//idCliente => $idCliente,
				//...
			);

	    $payload = json_encode($body);

	    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
			
	    $result = fwrite($fp, $msg, strlen($msg));

	    if (!$result){

			error_log('Message not delivered! I dont know why :(' . PHP_EOL, 3, $this->logFile);

	    }else{
			
			error_log('ios Push: Message successfully delivered (' . $result . ' bytes)' . PHP_EOL, 3, $this->logFile);
		
		}

	    fclose($fp);
		
	}
	
	private function sendAndroid($token, $message, $data){

		$key = $token;
		$msg = $message ? : 'Aviso de lavamosnos.co';
		$title = 'lavamosnos.co';

		define('API_ACCESS_KEY', $api_access_key);

		$registrationIds = array( $key );

		$msg = array(
						'body'		=> $msg,
						'title'		=> $title,
						'custom'	=> $data
					);

		$fields = array(
						'registration_ids'	=> $registrationIds,
						'data'				=> $msg
					);
		 
		$headers = array(
						'Authorization: key=' . API_ACCESS_KEY,
						'Content-Type: application/json'
					);
		 
		$ch = curl_init();

		curl_setopt( $ch,CURLOPT_URL, 'https://gcm-http.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

		$result = curl_exec($ch );

		curl_close( $ch );
		
		error_log('Android Push: ' . $result . PHP_EOL, 3, $this->logFile);
		
	}
	
}
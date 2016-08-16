<?php

final class checkin{

	private $token;
	private $call;
	private $request;
	private $requestFormat;
	
	function __construct(){

		$this->r = new response;

		$headers = getallheaders();

		$this->token = @$headers['tkn'];

		$this->call = @$headers['call'];

	}

	public function startWs(){

		if(!$this->treatRequest())
			throw new Exception($this->r->show(400));

		if(!security::authRequest($this->token, $this->call, $this->request['csm']))
			throw new Exception($this->r->show(401));

		if(!$this->actionRequest())
			throw new Exception($this->r->show(503));

	}

	private function treatRequest(){

		$this->request = security::SQLAntiInjection((!empty($_POST) ? $_POST : (!empty($_GET) ? $_GET : (!empty($_REQUEST) ? $_REQUEST : false))));

		if(!$this->request)
			return false;

		if(empty($this->token))
			throw new Exception($this->r->show(503));

		if(empty($this->call))
			throw new Exception($this->r->show(403));

		if(!isset($this->request['csm']) || empty($this->request['csm']))
			throw new Exception($this->r->show(403));

		if(!isset($this->request['frt']) || empty($this->request['frt']))
			$this->request['frt'] = 'json';

		return true;

	}

	private function actionRequest(){

		$call = explode('.', $this->call);

		$modulo = base64_decode($call[0]);

		$fileModule = 'service' . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $modulo  . DIRECTORY_SEPARATOR . $modulo  . '.php';

		if( !file_exists($fileModule) )
			throw new Exception($this->r->show(403));

	    require_once $fileModule;

	    $class_o = $modulo .'Module';

	    if( !class_exists($class_o) )
            throw new Exception($this->r->show(400));

		$this->f = new $class_o(base64_decode($call[1]));

		$this->a = base64_decode($call[2]);

        if(!method_exists($this->f, $this->a))
            throw new Exception($this->r->show(405));

		$acao = $this->f->{$this->a}($this->request);

		$this->r->show(200, $acao);

		return true;

	}

}
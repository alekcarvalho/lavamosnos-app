<?php

require_once('phpmailer/PHPMailer.class.php');
require_once('phpmailer/SMTP.class.php');

class email{

	private $destiny_mail;
	private $destiny_name;
	private $subject;
	private $content;

	protected $config = array();

	function __construct($data){

		$this->destiny_mail = $data['destiny_mail'];
		$this->destiny_name = $data['destiny_name'];
		$this->subject = $data['subject'];
		$this->content = $data['content'];

		$config = json_decode(file_get_contents('./service/core/data/config.json'),true);

		$this->config = $config['notification']['email'];

	}

	public function send(){

		$mail = new PHPMailer();
	
		$mail->isSMTP();

		$mail->SMTPDebug = 0;

		$mail->CharSet = $this->config['charset'];

		$mail->Debugoutput = 'html';

		$mail->Host = $this->config['host'];

		$mail->Port = $this->config['port'];

		$mail->SMTPAuth = true;

		$mail->SMTPSecure = $this->config['secure'];

		$mail->Username = $this->config['user'];

		$mail->Password = $this->config['pass'];

		$mail->setFrom($this->config['from-mail'], $this->config['from-name']);

		$mail->addAddress($this->destiny_mail, $this->destiny_name);

		$mail->Subject = $this->subject;

		$mail->msgHTML($this->content);

		if(!$mail->send())
			return 'Error to send email';

		return 'Email successfully sent';

	}

}
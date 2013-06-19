<?php
class Resetpassword extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this -> load -> model('users_model');
		$this -> load -> model('reset_model');
	}

	public function index() {

		$this -> load -> view('resetpassword/email_form');

	}

	public function resetpw() {
		if ($this -> users_model -> get_users_by_email($this -> input -> post('email'))) {
			$reset_nonce = mt_rand();
			$this -> reset_model -> set_reset($reset_nonce);

			$url = "http://localhost/index.php/resetpassword/activate/" . $reset_nonce;
			$emailtext = "Please click the following link to reset your password.";

			mail(($this -> input -> post('email')), "Reset password", $emailtext . "\n\n" . $url);

			echo 'An email is sent to your mail box, click the URL provided by the email to reset your password!';
		} else {
			throw new Exception("email does not exist!", 1);
			return false;
		}

	}

	public function activate($nonce) {

		$data['nonce'] = $nonce;
		$this -> load -> view('resetpassword/password_form', $data);

	}

	public function confirm() {

		$this -> load -> helper('form');
		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('password', 'password', 'required|xss_clean');

		if ($this -> form_validation -> run() === FALSE) {
			redirect('resetpassword/activate/' . $this -> input -> post('nonce'), 'refresh');
		} else {
			if ($record = $this -> reset_model -> get_by_nonce()) {
				$this -> users_model -> reset_pw($record);
				redirect('login', 'refresh');
			} else {
				throw new Exception("Wrong hyperlink!", 1);
				return false;
			}
		}

	}

}
?>
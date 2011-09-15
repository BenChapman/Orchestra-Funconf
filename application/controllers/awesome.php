<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awesome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('awesome');
	}
	
	public function does_train_have_wifi() {
		$this->load->model("trains");
		$day = intval($this->input->get('day'));
		$month = intval($this->input->get('month'));
		$year = intval($this->input->get('year'));
		$hour = intval($this->input->get('hour'));
		$minute = intval($this->input->get('minute'));
		$route = $this->input->get('route');
		$wifi = $this->trains->does_it_have_wifi($day,$month,$year,$hour,$minute,$route);
		if($wifi) {
			$positive = array("Yay","Woohoo","Yipee","Yahooo");
			echo $positive[rand(0,3)]."! You'll have WiFi on your train. Enjoy the sites of the internet.";
		} else {
			$negative = array("Boo","Darn","Drat","Dang","D'oh");
			$d = $this->trains->get_me_a_download();
			$message = "";
			if($d['link'] != NULL) {
				$message .= "<a href=\"".$d['link']."\">";
			}
			$message .= $d['message'];
			if($d['link'] != NULL) {
				$message .= "</a>";
			}
			echo $negative[rand(0,3)]."! No wifi. Why not ".$message." It's free :)";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

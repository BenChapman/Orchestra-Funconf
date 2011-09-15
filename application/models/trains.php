<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Trains model
 *
 * @author	Ben Chapman
 */
class Trains extends CI_Model
{
	function does_it_have_wifi($day,$month,$year,$hour,$minute,$route) {
		$this->db->where(array(
			"day"=>$day,
			"month"=>$month,
			"year"=>$year,
			"hour"=>$hour,
			"minute"=>$minute,
			"route"=>$route,
		));
		$r = $this->db->get('trains');
		if($r->num_rows() === 0){
			return false;
		} else {
			return true;
		}
	}
	
	function get_me_a_download() {
	    $this->db->order_by('id', 'RANDOM');
	    $this->db->limit(1);
	    $query = $this->db->get('downloadables');
	    $result = $query->result_array();
	    return $result[0];
	}
}

/* End of file trains.php */
/* Location: ./application/models/trains.php */

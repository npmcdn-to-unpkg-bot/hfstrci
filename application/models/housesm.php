<?php
class Housesm extends CI_Model {
	 function __construct()
    {
        $this->load->database();
    }
	 function searchDB($saletype,$searchquery,$resultsnumber,$pag=1){
	 	$pag--;
	 	$startnum = $pag*$resultsnumber;
	 	$this->db->select('full_address_feed,key_feed,property_type_feed,display_address_feed,full_description_feed,photo_feed,num_bedrooms_feed,price_feed');
		$this->db->where('listing_type_feed =', $saletype);
	 	$this->db->where("MATCH (full_address_feed) AGAINST (REPLACE(REPLACE('$searchquery','-',','),' ',','))", NULL, FALSE);
	 	$query = $this->db->get('feed', $resultsnumber,$startnum);
		return $query->result();
       }

       function searchDBrows($saletype,$searchquery){
	 	$this->db->select('full_address_feed');
		$this->db->where('listing_type_feed =', $saletype);
	 	$this->db->where("MATCH (full_address_feed) AGAINST (REPLACE(REPLACE('$searchquery','-',','),' ',','))", NULL, FALSE);
	 	$query = $this->db->get('feed', 500);
		return $query->num_rows();
       }

        function getredirectUrl($key){
	 	$this->db->select('url_feed');
		$this->db->where('key_feed =', $key);
		$query = $this->db->get('feed', 1);
		return $query->result();
       }
       function getcountrydist($country){
       		$this->db->select('district,iso');
			$this->db->where('country =', $country);
			$query = $this->db->get('district');
			return $query->result();
       }
       function getdistbyiso($iso){
       		$this->db->select('district');
			$this->db->where('iso =', $iso);
			$query = $this->db->get('district', 1);
			return $query->result();
       }
       function getdisttown($district){
       		$this->db->select('town,district');
			$this->db->where('district =', $district);
			$query = $this->db->get('town');
			return $query->result();
       }
       function gettownareas($town,$district){
       		$this->db->select('ward,town,district');
			$this->db->where('town =', $town);
			$this->db->where('district =', $district);
			$query = $this->db->get('ward');
			return $query->result();
       }
       function getareacode($town,$ward){
       		$this->db->select('TOWN,WARD,DISTRICT,POSTCODE,STREET');
			$this->db->where('TOWN =', $town);
			$this->db->where('WARD =', $ward);
			$query = $this->db->get('postcodes');
			return $query->result();
       }

       function getcodeinfo($postcode){
       		$this->db->select('price,date,proptype,PAON,street,locality,town,county');
			$this->db->where('postcod =', $postcode);
			$this->db->order_by("PAON", "asc");
			$query = $this->db->get('landregs');
			return $query->result();
       }
        function getisobydist($dist){
       		$this->db->select('iso');
			$this->db->where('district =', $dist);
			$query = $this->db->get('district', 1);
			return $query->result();
       }
}

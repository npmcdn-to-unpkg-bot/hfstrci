<?php
class Housesm extends CI_Model {
	 function __construct()
    {
        $this->load->database();
    }

	function makelatlongsearch($saletype,$lat,$lng,$resultnumber,$pag = 1,$filters=false){
	$pag--;
	$startnum = $pag*$resultnumber;   
	if($startnum == 0)
		$startnum = 1;
	$where = "WHERE listing_type_feed = '".$saletype."'";
	$wherefilters = "";
	
	if($filters){
		if(isset($filters["price1"]))
			$wherefilters .= " and price_feed >= ".(int)$filters["price1"];
		if(isset($filters["price2"]))
			$wherefilters .= " and price_feed <= ".(int)$filters["price2"]; 
			
		if(isset($filters["bedroom1"]))
			$wherefilters .= " and num_bedrooms_feed >= ".(int)$filters["bedroom1"];
		if(isset($filters["bedroom2"]))
			$wherefilters .= " and num_bedrooms_feed <= ".(int)$filters["bedroom2"];	    	
	
		if(isset($filters["sortby"]))
			if($filters["sortby"] == "distance")
				$sort = "distance";
			elseif($filters["sortby"] == "recent")
				$sort = "timestamp_feed ASC";
			elseif($filters["sortby"] == "pricelow")
				$sort = "price_feed ASC";
			elseif($filters["sortby"] == "pricehigh")
				$sort = "price_feed DESC";
			else
				$sort = "distance";
		else
			$sort = "distance";
			
		if(isset($filters["range"]))
			$range = $filters["range"];
		else
			$range = (int)1;
			
		if(isset($filters["propertytype"])){
			$proplist = '';
			$flist = true;
			foreach($filters["propertytype"] as $ptype){
				if($flist === true)
					$proplist .= '"'.$ptype.'"';
				else
					$proplist .= ', "'.$ptype.'"';
				$flist=false;
				
			}
			$wherefilters .= ' and property_type_feed IN ('.$proplist.')';	
		}
	}
	$query1 = $this->db->query("
                SELECT id_feed, SQRT(
                POW(69.1 * (latitude_feed - ".$lat."), 2) +
                POW(69.1 * (".$lng." - longitude_feed ) * COS(latitude_feed / 57.3), 2)) AS distance
                FROM feed $where AND 
                longitude_feed between (".$lng." - ".(float)$range."/69.1) and (".$lng." + ".(float)$range."/69.1) and latitude_feed between (".$lat." - ".(float)$range."/69.1) and (".$lat." + ".(float)$range."/69.1)
                HAVING distance < ".(float)$range." ORDER BY distance");
		
	//$rowcount = $query1->num_rows();
	$allrows = $query1->result();
	if(!$allrows){
		return false;
	}
	$rows = "";
	$first = true;
	foreach ($allrows as $key => $value) {
		if($first){
			$first = false;
			$rows = $value->id_feed;
		}else
			$rows .= ",".$value->id_feed;      	
	}
		// get page results
	if($sort == "distance")
		$srt = "";
	else 
		$srt = " ORDER BY ".$sort;
		
	$queryforrows = $this->db->query("
				SELECT id_feed
				FROM feed WHERE id_feed IN($rows) $wherefilters");
	$rowcount = $queryforrows->num_rows();

	$query3 = $this->db->query("
				SELECT latitude_feed, longitude_feed, full_address_feed,key_feed,property_type_feed,display_address_feed,full_description_feed,photo_feed,num_bedrooms_feed,price_feed
				FROM feed WHERE id_feed IN($rows) $wherefilters ".$srt." LIMIT ".$startnum.", ".$resultnumber);
	$pageresult = $query3->result();

	$query4 = $this->db->query("
                SELECT MAX(price_feed) as maxp, MIN(price_feed) as minp, AVG(price_feed) as avgp FROM (
                SELECT price_feed
                FROM feed where id_feed IN($rows) $wherefilters and price_feed > 0) as tt");

	$prices = $query4->result();
                
	$query5 = $this->db->query("
                SELECT property_type_feed, COUNT(property_type_feed) AS popularity, AVG(price_feed) as avgp, AVG(num_bedrooms_feed) as avgb FROM (
                SELECT price_feed, property_type_feed, num_bedrooms_feed
                FROM feed where id_feed IN($rows)) as tt GROUP BY property_type_feed ORDER by popularity DESC");
             
	$proptypes = $query5->result();


	return array( $rowcount,  $pageresult, $prices  ,$proptypes   );

}

    	function verifysearch($value){
    		$this->db->select('*');
		$this->db->where('`search` =', $value);
		$query = $this->db->get('latlng', 1);
		if($res = $query->result()){
			$id =  $res['0']->id;
			$latlng = array("lat" => $res['0']->lat, "lng" => $res['0']->lng , "formatted_address" => $res['0']->formatted_address, "type" =>$res['0']->loctype);
			
			$this->db->select('*');
			$this->db->where('`idlatlng` =', $id);
			$query2 = $this->db->get('latlng_details');
			$res2 = $query2->result();	
			
			return array($latlng, $res2);
		}else
			return false;
    	}
    	
    	function insertlatlong($search, $lat, $lng, $formatted_address, $type, $compontents){    		
    		$this->db->insert('latlng', array('search'=>$search,"lat"=>"$lat","lng"=>"$lng","formatted_address"=> $formatted_address, "loctype"=>$type)); 
    		$id = $this->db->insert_id();
    		foreach($compontents as $com){
    			$com["idlatlng"] = $id;
    			$this->db->insert('latlng_details', $com);     		
    		}
    	}
    	
    	function searchpropertylatlong($saletype,$lat,$lng,$resultnumber,$pag = 1,$filters=false){    	    	

    	    	
    	    	$pag--;
		$startnum = $pag*$resultnumber;   
		if($startnum == 0)
			$startnum = 1;	    	
    	    	$where = "WHERE listing_type_feed = '".$saletype."'";	
    	    	if($filters){
    	    		if(isset($filters["price1"]))
    	    			$where .= " and price_feed >= ".(int)$filters["price1"];
    	    		if(isset($filters["price2"]))
    	    			$where .= " and price_feed <= ".(int)$filters["price2"]; 
    	    			
    	    		if(isset($filters["bedroom1"]))
    	    			$where .= " and num_bedrooms_feed >= ".(int)$filters["bedroom1"];
    	    		if(isset($filters["bedroom2"]))
    	    			$where .= " and num_bedrooms_feed <= ".(int)$filters["bedroom2"];	    	
    	    	
    	    		if(isset($filters["sortby"]))
    	    			if($filters["sortby"] == "distance")
    	    				$sort = "distance";
    	    			elseif($filters["sortby"] == "recent")
    	    				$sort = "timestamp_feed ASC";
    	    			elseif($filters["sortby"] == "pricelow")
    	    				$sort = "price_feed ASC";
    	    			elseif($filters["sortby"] == "pricehigh")
    	    				$sort = "price_feed DESC";
    	    			else
    	    				$sort = "distance";
    	    		else
    	 			$sort = "distance";
    	 			
    	 		if(isset($filters["range"]))
    	    			$range = $filters["range"];
    	    		else
    	 			$range = (int)1;
    	 			
    	 		if(isset($filters["propertytype"])){
    	 			$proplist = '';
    	 			$flist = true;
    	 			foreach($filters["propertytype"] as $ptype){
    	 				if($flist === true)
    	 					$proplist .= '"'.$ptype.'"';
    	 				else
    	 					$proplist .= ', "'.$ptype.'"';
    	 				$flist=false;
    	 				
    	 			}
    	 			$where .= ' and property_type_feed IN ('.$proplist.')';	
    	 		}
    	    			
    	    			
    	    	}  		
    		$query = $this->db->query("
				SELECT latitude_feed, longitude_feed, full_address_feed,key_feed,property_type_feed,display_address_feed,full_description_feed,photo_feed,num_bedrooms_feed,price_feed, SQRT(
			    POW(69.1 * (latitude_feed - ".$lat."), 2) +
			    POW(69.1 * (".$lng." - longitude_feed ) * COS(latitude_feed / 57.3), 2)) AS distance
				FROM feed $where HAVING distance < ".(float)$range." ORDER BY ".$sort." LIMIT ".$startnum.", ".$resultnumber);
			
    		return $query->result();
    	}
    	
    	 function gettopandminprice($saletype,$lat,$lng,$filters=false){
        	
		 	$where = "WHERE listing_type_feed = '".$saletype."'";	
    	    	if($filters){
    	    		if(isset($filters["price1"]))
    	    			$where .= " and price_feed >= ".(float)$filters["price1"];
    	    		if(isset($filters["price2"]))
    	    			$where .= " and price_feed <= ".(float)$filters["price2"]; 
    	    			
    	    		if(isset($filters["bedroom1"]))
    	    			$where .= " and num_bedrooms_feed >= ".(float)$filters["bedroom1"];
    	    		if(isset($filters["bedroom2"]))
    	    			$where .= " and num_bedrooms_feed <= ".(float)$filters["bedroom2"];
    	    		
    	    		if(isset($filters["range"]))
    	    			$range = $filters["range"];
    	    		else
    	 			$range = (int)1;
    	 		
    	 		if(isset($filters["propertytype"])){
    	 			$proplist = '';
    	 			$flist = true;
    	 			foreach($filters["propertytype"] as $ptype){
    	 				if($flist === true)
    	 					$proplist .= '"'.$ptype.'"';
    	 				else
    	 					$proplist .= ', "'.$ptype.'"';
    	 				$flist=false;
    	 				
    	 			}
    	 			$where .= ' and property_type_feed IN ('.$proplist.')';	
    	 		}
    	    	}   	

    		$query = $this->db->query("
				SELECT MAX(price_feed) as maxp, MIN(price_feed) as minp, AVG(price_feed) as avgp FROM (
				SELECT price_feed
				FROM feed $where and price_feed > 0 and SQRT(POW(69.1 * (latitude_feed - ".$lat."), 2) + POW(69.1 * (".$lng." - longitude_feed ) * COS(latitude_feed / 57.3), 2)) < ".(float)$range.") as tt");
				
		$where = "WHERE listing_type_feed = '".$saletype."'";
		$query2 = $this->db->query("
				SELECT property_type_feed, COUNT(property_type_feed) AS popularity, AVG(price_feed) as avgp, AVG(num_bedrooms_feed) as avgb FROM (
				SELECT price_feed, property_type_feed, num_bedrooms_feed
				FROM feed $where and price_feed > 0 and SQRT(POW(69.1 * (latitude_feed - ".$lat."), 2) + POW(69.1 * (".$lng." - longitude_feed ) * COS(latitude_feed / 57.3), 2)) < ".(float)$range.") as tt GROUP BY property_type_feed ORDER by popularity DESC");
				
		
				
		

	       
	       	return array($query->result(),$query2->result());
       }
    	function searchpropertylatlongrows($saletype,$lat,$lng,$filters=false){
    	    	
    	    		    	
    	    	$where = "WHERE listing_type_feed = '".$saletype."'";	
    	    	if($filters){
    	    		if(isset($filters["price1"]))
    	    			$where .= " and price_feed >= ".(float)$filters["price1"];
    	    		if(isset($filters["price2"]))
    	    			$where .= " and price_feed <= ".(float)$filters["price2"]; 
    	    			
    	    		if(isset($filters["bedroom1"]))
    	    			$where .= " and num_bedrooms_feed >= ".(float)$filters["bedroom1"];
    	    		if(isset($filters["bedroom2"]))
    	    			$where .= " and num_bedrooms_feed <= ".(float)$filters["bedroom2"];
    	    		
    	    		if(isset($filters["range"]))
    	    			$range = $filters["range"];
    	    		else
    	 			$range = (int)1;
    	 		
    	 		if(isset($filters["propertytype"])){
    	 			$proplist = '';
    	 			$flist = true;
    	 			foreach($filters["propertytype"] as $ptype){
    	 				if($flist === true)
    	 					$proplist .= '"'.$ptype.'"';
    	 				else
    	 					$proplist .= ', "'.$ptype.'"';
    	 				$flist=false;
    	 				
    	 			}
    	 			$where .= ' and property_type_feed IN ('.$proplist.')';	
    	 		}
    	    	}   	
    	    		
    		$query = $this->db->query("
				SELECT key_feed, SQRT(
			    POW(69.1 * (latitude_feed - ".$lat."), 2) +
			    POW(69.1 * (".$lng." - longitude_feed ) * COS(latitude_feed / 57.3), 2)) AS distance
				FROM feed $where HAVING distance < ".(float)$range." LIMIT 500");
			
    		return $query->num_rows();
    	}
	function searchDB($saletype,$searchquery,$resultsnumber,$pag=1,$filters=false){
		 	$pag--;
		 	$startnum = $pag*$resultsnumber;
		 	$this->db->select('full_address_feed,key_feed,property_type_feed,display_address_feed,full_description_feed,photo_feed,num_bedrooms_feed,price_feed');
			$this->db->where('listing_type_feed =', $saletype);
			if($filters){
				$this->db->where('price_feed >=', $filters["price1"]);
				$this->db->where('price_feed <=', $filters["price2"]);
				
				//$this->db->where('num_bedrooms_feed >=', $filters["bedrooms1"]);
				//$this->db->where('num_bedrooms_feed <=', $filters["bedrooms2"]);
			}
				
		 	$this->db->where("MATCH (full_address_feed) AGAINST (REPLACE(REPLACE('$searchquery','-',','),' ',','))", NULL, FALSE);
		 	$this->db->or_where("MATCH (postalcode_feed) AGAINST ('$searchquery')", NULL, FALSE);
		 	$query = $this->db->get('feed', $resultsnumber,$startnum);
			return $query->result();
       }

       function searchDBrows($saletype,$searchquery,$filters=false){
		 	$this->db->select('full_address_feed');
			$this->db->where('listing_type_feed =', $saletype);
			if($filters){
				$this->db->where('price_feed >=', $filters["price1"]);
				$this->db->where('price_feed <=', $filters["price2"]);
				
				//$this->db->where('num_bedrooms_feed >=', $filters["bedrooms1"]);
				//$this->db->where('num_bedrooms_feed <=', $filters["bedrooms2"]);
			}
		 	$this->db->where("MATCH (full_address_feed) AGAINST (REPLACE(REPLACE('$searchquery','-',','),' ',','))", NULL, FALSE);
		 	$this->db->or_where("MATCH (postalcode_feed) AGAINST ('$searchquery')", NULL, FALSE);
		 	$query = $this->db->get('feed', 500);
		 	
			return $query->num_rows();
		
       }
       
      

        function getredirectUrl($key){
		 	$this->db->select('url_feed');
			$this->db->where('id_feed =', (int)$key);
			$query = $this->db->get('feed', 1);
			
			$data = array(
			 'ip' => $_SERVER['REMOTE_ADDR'] ,
			 'fkey' => $key,
			);
			$this->db->insert('sends', $data); 
			
			return $query->result();
       }
       function savesearch($search,$style = "sale"){
       	
	       	$data = array(
			 'ipsearch' => $_SERVER['REMOTE_ADDR'] ,
			 'search' => $search,
			 'saleorrent' => $style,
			);
			$this->db->insert('search', $data); 
       	
       }
       function savecanonical($url,$canonical){
       			$this->db->select('id');
			$this->db->where('url =', $url);
			$query = $this->db->get('canonicallinks');
			if(!$query->result()){
				$this->db->insert('canonicallinks', array("url"=>$url,"canonical"=>$canonical)); 	
				
			}
       	
       	
       }
       function getcountrydist($country){
       		$this->db->select('district,iso');
			$this->db->where('country =', $country);
			$this->db->order_by("district", "asc"); 
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
			$this->db->order_by("town", "asc");
			$query = $this->db->get('town');
			return $query->result();
       }
       function gettownareas($town,$district){
       		$this->db->select('ward,town,district');
			$this->db->where('town =', $town);
			$this->db->where('district =', $district);
			$this->db->order_by("ward", "asc");
			$query = $this->db->get('ward');
			return $query->result();
       }
       function getareacode($town,$ward){
       		$this->db->select('TOWN,WARD,DISTRICT,POSTCODE,STREET');
			$this->db->where('TOWN =', $town);
			$this->db->where('WARD =', $ward);
			$this->db->order_by("POSTCODE", "asc");
			$query = $this->db->get('postcodes');
			return $query->result();
       }

       function getcodeinfo($postcode){
       		$this->db->select('price,date,proptype,PAON,street,locality,town,county');
			$this->db->where('postcod =', '"'.$postcode.'"');
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
       function footerlinks(){
       			$this->db->select('*');			
			$query = $this->db->get('footerlinks');
			return $query->result();
       }
}

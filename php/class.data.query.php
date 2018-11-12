<?php 
/**
* File: 		php/class.guest.entries
* Date: 		Nov 29, 2014
* Author: 		MD KHAN 
* Desciption:	This Class insert guest informatin in to data base. Before inserting data 
*			:	This class requres three class: 
*			:	1) class.dbconnect.php and  (2 class.datafilter 
*			:   All data will be valided and sanitized before sebd to database	
* Dependency:	processing_registration.php
*			
*/
require("class.dbconnect.php");
require("class.datafilter.php");

class DataQuery{
	private $db;
	
	
		// Construction 
		public function __construct() {
			$this->db = new Dbconnection();
			$this->db = $this->db->dbCon();
		}
		
		//Retriving all customer information
		public function retriveCustomerInformation() {
				# using the shortcut ->query() method here since there are no variable
                # values in the select statement.
                $STH = $this->db->query('SELECT * FROM car_customer');
 
               # setting the fetch mode
               $STH->setFetchMode(PDO::FETCH_ASSOC);
               echo '<table width="100%" border="1">
			   	   <tr>
				      <td colspan="9">
					  <h2 style="margin:0; padding:0; color:#009F00">Customer Information:</h2>
					  </td>
				  </tr>					
				<tr>
				 <td width="13%"><strong>Row</strong></td>
    			  <td width="13%"><strong>First Name</strong></td>
   				  <td width="13%"><strong>Last Name</strong></td>
   				  <td width="10%"><strong>Address</strong></td>
 				  <td width="8%"><strong>Phone</strong></td>
  			     <td width="8%"><strong>Email</strong></td>
   				 <td width="19%"><strong>Registraion</strong> <strong>Time</strong></td>
 				 <td width="12%"><strong>Customer</strong> <strong>IP</strong></td>
    			<td width="8%"><strong>ID</strong></td>
    			<td width="9%"><strong>Action</strong></td>
 				 </tr>
					';
					   $i=1;
               while( $row = $STH->fetch()) {
				            echo '<tr>
				  			<td>'.$i++.'</td>
    						<td>'.ucfirst($row['customer_fname']).'</td>
    						<td>'.ucfirst($row['customer_lname']).'</td>
   							<td>'.ucfirst($row['customer_address']).'</td>
   						    <td>'.ucfirst($row['customer_phone']).'</td>
    					    <td>'.ucfirst($row['customer_email']).'</td>
   						    <td>'.ucfirst($row['registration_time']).'</td>
   						    <td>'.ucfirst($row['customer_ip']).'</td>
   						  <td>'.ucfirst($row['cus_id']).'</td>
    					<td><a href="#">update/delete</a></td>
 					 </tr>';
					}
					
			 echo '</table>';
			}//retriveCustomerInformation()
	
			
	
	
	}
	
//testing 
$customerinfo = new DataQuery();
$customerinfo->retriveCustomerInformation();


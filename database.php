<?php   
 //database.php  
 class Databases{  
      public $con;  
      public $error;  
      public function __construct()  
      {  
           $this->con = mysqli_connect("localhost", "root", "", "chaiya");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      }  
      public function insert($table_name, $data)  
      {  
           $string = "INSERT INTO ".$table_name." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
		   $string .= "'" . implode("','", array_values($data)) . "')";  
		   
           if(mysqli_query($this->con, $string))  
           {  
                return true;  
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }  
	  }
	 public function updateTable($table_name, $id){
			$sql = "Update ".$table_name." SET status='approved' WHERE id=".$id."";
			if(mysqli_query($this->con, $sql))  
           	{  
                return true;  
           	}  
           	else  
           	{  
                echo mysqli_error($this->con);  
           	} 
	}
	 public function deleteBid($table_name, $id){
		$sql = "DELETE FROM ".$table_name." WHERE id=".$id."";
			if(mysqli_query($this->con, $sql))  
           	{  
                return true;  
           	}  
           	else  
           	{  
                echo mysqli_error($this->con);  
           	}
     }
     public function updateTime($table_name, $tm, $id){
          $sql = "Update ".$table_name." SET time='$tm' WHERE id = 3";
          if(mysqli_query($this->con, $sql))  
           {  
           return true;  
           }  
           else  
           {  
           echo mysqli_error($this->con);  
           } 
} 
 }  
 ?>
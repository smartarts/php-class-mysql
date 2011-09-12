<?
class mysql_string extends mysql{
	
	function query($x){
	
		$this->query=$x;
	
	}
	
	function run(){
	
		$this->rs=mysql_query($this->query);
		$this->numrows=mysql_num_rows($this->rs);
		
		
		$id=0;
		while($row=mysql_fetch_array($this->rs)){
			$this->rows[$id]=$row;
			$id++;
		}
		
		if($this->numrows==1){
			$this->get($this->rows[0]);
			$this->cntr=0;
		}
		
		
	}

}

?>
<?
class mysql_insert extends mysql{
	
	function run(){
		
		$this->query="INSERT INTO ".$this->table." VALUES (".$this->values.")";
		
		$this->rs=mysql_query($this->query);
		
		$this->insertid=mysql_insert_id();
		
		if($this->rs) $this->status=TRUE; else $this->status=FALSE;
		

	}
	
}
?>
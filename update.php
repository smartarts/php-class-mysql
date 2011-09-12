<?
class mysql_update extends mysql{
	
	function run(){
		
		$this->query="UPDATE ".$this->table." SET ".$this->values." WHERE ".$this->where;
		
		$this->rs=mysql_query($this->query);
		
		if($this->rs) $this->status=TRUE; else $this->status=FALSE;
		

	}
	
}
?>
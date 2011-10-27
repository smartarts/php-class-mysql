<?
class mysql_delete extends mysql{
	
	function run(){
		
		$this->query="DELETE FROM ".$this->table." where ".$this->where;
		
		$this->rs=mysql_query($this->query);
		
		if($this->rs) $this->status=TRUE; else $this->status=FALSE;
		

	}
	
}
?>
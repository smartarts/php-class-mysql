<?
class mysql_select extends mysql{
	
	function run(){
	
		$this->query="SELECT ".$this->fields." FROM ".$this->table;
		if($this->where) $this->query.=" WHERE ".$this->where;
		if($this->order) $this->query.=" ORDER BY ".$this->order;
		if($this->limit) $this->query.=" LIMIT ".$this->limit;
	
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
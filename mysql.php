<?
class mysql{
		
		//internal vars
		protected $dbid;
		protected $type;
		protected $fields="*";
		protected $table;
		protected $query;
		protected $where;
		protected $order;
		protected $limit;
		protected $values;
		protected $dbvar=array();
		protected $expvar=array();
		
		//external vars
		public $error;
		public $result;
		public $rows=array();
		public $numrows;
		public $sql;
		public $insertid;
		public $status;
		public $cntr=0;
		
		function __construct($dbid=1){
			
			if($dbid==1) $this->connect(DBUSER,DBPASS,DBHOST,DBNAME);
			
		}
		
		function connect($username,$password,$host,$db){
			
			$connect=mysql_connect($host,$username,$password) or die("db fail");
			$db=mysql_select_db($db,$connect);
		
		}
		
		function fields($x){
			$this->set($x);
			$this->fields="";
			foreach($this->dbvar as $v){
				$this->fields.=$seperate.$v;
				$seperate=",";
			}
		}
		
		function table($x){
			$this->table=$x;
		}
		
		function values($x){
			if($this->values=='') $this->values=$x;
			else $this->values.=",".$x;
		}
		
		function where($x){
			if($this->where=='') $this->where=$x;
			else $this->where.=" AND ".$x;
		}
		
		function order($x){
			$this->order=$x;
		}
		
		function limit($x){
			$this->limit=$x;
		}
		
		function set($x){
			$tmp=explode(",",$x);
			foreach($tmp as $t){
				$parts=explode("=",$t);
				if($parts[1]=='') $parts[1]=$parts[0];	
				array_push($this->dbvar,$parts[0]);
				array_push($this->expvar,$parts[1]);
			}
		}
		
		function get($x){
			foreach($x as $field => $value){
					
					if(in_array($field,$this->dbvar)){
						$key=array_keys($this->dbvar,$field);
						$field=$this->expvar[$key[0]];
					}
					
					$GLOBALS[$field]=$value;
					$this->$field=$value;
			
			}
			$this->cntr++;
		}
		
		
		
		function status(){
	
			if($this->status==TRUE) echo "<div class='ok'>Update OK</div>"; else echo "<div class='error'>Update Failed</div>";
	
		}
		
		function debug($x){
			if($x==0) echo "<div>".$this->query."</div>";
			else mail("andrew@smartarts.co.uk","SQL Debug",$this->query,"From: debug@smartarts.co.uk");
		}
}

require(getdir(__FILE__)."select.php");
require(getdir(__FILE__)."insert.php");
require(getdir(__FILE__)."update.php");
require(getdir(__FILE__)."delete.php");
require(getdir(__FILE__)."string.php");
?>
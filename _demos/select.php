<?
//REQUIRE SITE VARS
require("db_config.php");


//REQUIRE MAIN CLASS FILE
require($sa_classpath."mysql/mysql.php");


//SELECT EXAMPLE 1 - as mysql_num_rows equals 1 all db vars are returned automatically - no need for foreach() loop
$sql=new mysql_select();
$sql->table('page');
$sql->where("pname='index'");
$sql->set('pname=name');
$sql->run();

echo $sql->pid; //$sql->VARNAME is column name in db
echo $sql->name; //$sql->VARNAME is variable specified in $sql->set();


//SELECT EXAMPLE 2 - as we are selecting multi rows the foreach() loop is needed along with get() to cycle through all data
$q=new mysql_select();
$q->fields('pid=id,pname=name'); //sets pid column to var id | pname column to var name
$q->fields('pdesc'); //as no variable specified var will remain as column name
$q->table('page');
$q->where("pid>0");
$q->where("pid<1000 AND pid!=999");
$q->order("pid ASC");
$q->limit("0,10");
$q->run();
$q->debug(0); //0 - prints sql | 1 - mail to andrew@smartarts.co.uk

$q->numrows; //returns total rows

foreach($q->rows as $row){
	
	$q->get($row);

	echo $q->name;
	echo "<br/>";
}

?>
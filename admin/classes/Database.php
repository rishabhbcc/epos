<?php
class Database extends Mailer
{
	protected $dbc;
	private $esc;
	protected $rows;
	public $result;
	private $row;
	private $ids;
	var $id;
	var $error;
	function connect()
	{
		$this->dbc=@new mysqli('localhost','root','go@23p)83*7@&!PO#^Sell&er','goeasypos_cash');
		try
		{	
			if($this->dbc->connect_error){
			throw new customException($this->dbc->connect_error);
			}
		}
		catch(customException $error)
		{
			$error->sendError();
		}
	}
	
	function disconnect()
	{
		$this->dbc->close();
	}
	
	function sql_injection($value)
	{
		$value=(get_magic_quotes_gpc())?stripslashes($value):$value;
		$val=trim($this->dbc->real_escape_string($value));
		return $val;
	}
	
	function generate()
	{
		$this->connect();
		$result = $this->dbc->query("SHOW TABLES FROM `".DB_DATABASE."`");
		if ($result->num_rows > 0)
		{
		  while ($row = $result->fetch_array())
		  {
			  $const=explode("_",$row[0]);
			  define(strtoupper($const[1]),$row[0]);
		  }
		}
		$this->disconnect();
	}
	
	function fetch_field($tables)   // to fetch field name of table
	{
		$qry = '';
		$this->connect();
		$field=array();
		$result = $this->dbc->query("SHOW COLUMNS FROM `".$tables."`");
		try{
		if($result){}else{throw new customException('<i>"'.$qry.'".</i><br /> '.$this->dbc->error);}
		}
		catch (customException $error)
		{
			$error->sendError();
		}
		if ($result->num_rows > 0)
		{
		  while ($row = $result->fetch_assoc())
		  {
		  $field[]=$row['Field'];
		  }
		}
		$this->disconnect();
		return $field;
	}
	
	function insert($tablename,$data)                          
	{
		$table=$this->fetch_field($tablename);
		$this->connect();
		$fields = '';
		$filedsvalue = '';
		//receive all data like fileds and values in a for each loop
		foreach($data as $keys=>$value)
		{
			if(in_array($keys,$table))
			{
				$fields.="`".$keys."`,";            //insert all fields in a one variable
			    $filedsvalue.="'".($this->sql_injection($value))."',";
			}
		}
		$fields=rtrim($fields,",");
		$filedsvalue=rtrim($filedsvalue,",");
		
		$ins="INSERT INTO ".$tablename." (".$fields.") VALUES (".$filedsvalue.")";
		//echo $ins;exit;
		$que=$this->dbc->query($ins);
		
		$this->error=$this->dbc->error;
		try{
		if($que){$this->id=$this->dbc->insert_id;}else{
		//throw new customException('<i>"'.$ins.'".</i><br /> '.$this->dbc->error);
		}
		}
		catch (customException $error)
		{
			//$error->sendError();
		}
		$this->disconnect();
		return $this->id;
	}
	
	function update($tablename,$data,$cond,$check=false)
	{
		$updid = '';
		$table=$this->fetch_field($tablename);
		$this->connect();
		$tb=explode("_",$tablename);
		$id=$tb[1]."_id";
		foreach($data as $key=>$value)
		{
			if(in_array($key,$table))
			{
				$updid.="`".$key."` = '".($this->sql_injection($value))."',";
			}
		}
		$updid=rtrim($updid,",");
		if($check==true){$qry="UPDATE `".$tablename."` SET ".$updid." WHERE `".$id."`=".$cond."";}
		else{$qry="UPDATE `".$tablename."` SET ".$updid." WHERE ".$cond."";}
		//echo $qry;
		$res=$this->dbc->query($qry);
		$this->error=$this->dbc->error;
		try{
		if($res){}else{
			//throw new customException('<i>"'.$qry.'".</i><br /> '.$this->dbc->error);
			}
		}
		catch (customException $error)
		{
			$error->sendError();
		}
		$this->disconnect();
		return $res;	
	}
	
	function select($table,$type,$cond,$check=false,$orderby="",$flow=false,$flds="*")
	{
		$this->connect();
		$fields=$flds;
		$tb=explode("_",$table);
		$id=$tb[1]."_id";
		$orderby=(empty($orderby))?$id:$orderby;
		if(is_array($flds)){foreach($flds as $i=>$j){$fields.='`'.$temp[$i].'`,'; $fields=rtrim($fields,",");}}
		$order=($flow==true)?"DESC":"";
		if($check==true){$qry="SELECT ".$fields." FROM `".$table."` WHERE `".$id."`=".$cond." ORDER BY `".$orderby."` ".$order;}
		else{$qry="SELECT ".$fields." FROM `".$table."` WHERE ".$cond." ORDER BY `".$orderby."` ".$order;}
		//print $qry.'<br >';
		$sql=$this->dbc->query($qry);
		$this->rows=$sql->num_rows;
		try{
		if($sql){}else{throw new customException('<i>"'.$qry.'".</i><br /> '.$this->dbc->error);}
		}
		catch (customException $error)
		{
			$error->sendError();
		}
		switch($type)
		{
			case "object" :
			{
				$run=$sql->fetch_object();
				break;
			}
			
			case "assoc" :
			{
				$run=$sql->fetch_assoc();
				break;
			}
			
			case "array" :
			{
				$run=$sql->fetch_array();
				break;
			}
		}
		$this->disconnect();
		return $run;
	}
	
	function select_all($table,$cond,$orderby="",$flow=false,$limits=array(),$flds="*",$groupby="")  /*To fetch all the data*/
	{
		
		$this->connect();
		$fields=$flds;
		$tb=explode("_",$table);
		$id=$tb[1]."_id";
		$orderby=(empty($orderby))?"":" ORDER BY ".$orderby;
		$groupby=(empty($groupby))?"":$groupby;
		if(is_array($flds))
		{
			foreach($flds as $i=>$j)
			{
				$fields.='`'.$temp[$i].'`,'; 
				$fields=rtrim($fields,",");
			}
		}
		
		$order=($flow==true)?"":"DESC";
		$limit=(count($limits)==0)?"":" LIMIT ".$limits[0].",".$limits[1];
		//$limit=" ";
		
		if($cond!=""){$qry="SELECT ".$fields." FROM `".$table."` WHERE ".$cond." ".$groupby." ".$orderby." ".$order.$limit ;}
		else{$qry="SELECT ".$fields." FROM `".$table."` ".$orderby."  ".$groupby." ".$order.$limit ;}
		//print $qry;
		//exit;
		try
		{
			$result =array();
			$sql=$this->dbc->query($qry);
			if($sql)
			{
				$this->rows=$sql->num_rows;
				if($this->rows>0)
				{
					$i=1;
					while($run=$sql->fetch_assoc())
					{
						$result[] = $run;
						if(!isset($temp)){$temp=array_keys($run);}
						//print_r($run);
						/*
						foreach($run as $key=>$value)
						{
							$$key.=$value."||";
						}
						$i++;*/
					}
					/*		
					foreach($temp as $val)
					{
						//$result[$val]=explode("||",rtrim($$val,"||"));
						//$result[$val] = $run[$val];
					}*/
				}
			}
		    else{throw new customException('<i>"'.$qry.'".</i><br /> '.$this->dbc->error);}
		}
		catch (customException $error)
		{
			$error->sendError();
		}
		$this->disconnect();
		return $result;
	}
	
	function total_rows($table,$cond=NULL)
	{
		$this->connect();
		$tablename=explode("_",$table);
		$id=$tablename[1]."_id";
		$condition=($cond!=NULL)?"WHERE ".$cond:"";
		$qry="SELECT `".$id."` FROM `".$table."` ".$condition;
		$sql=$this->dbc->query($qry);
		
		try{
		if($sql){}else{throw new customException('<i>"'.$qry.'".</i><br /> '.$this->dbc->error);}
		}
		catch (customException $error)
		{
			$error->sendError();
		}
		$this->disconnect();
		return $sql->num_rows;	
	}
	
	
	function delrec($table,$attr,$cond)
	{
	
		$this->connect();
		
		
		$qry="DELETE FROM ".$table." WHERE `".$attr."`=".$cond."";
		
		$sql=$this->dbc->query($qry);
		/*
		try{
		if($sql){}else{throw new customException('<i>"'.$qry.'".</i><br /> '.$this->dbc->error);}
		}
		catch (customException $error)
		{
			$error->sendError();
		}*/
		$this->disconnect();
		return $sql;
	}
	
	
	function delete($table,$attr,$cond,$check=false)
	{
	
		$this->connect();
		$tablename=explode("_",$table);
		$id=$tablename[1]."_id";
		if($check==true){print $qry="DELETE FROM `".$table."` WHERE `".$attr."`=".$cond."";}
		else{print $qry="DELETE FROM `".$table."` WHERE ".$cond."";}
		$sql=$this->dbc->query($qry);
		try{
		if($sql){}else{throw new customException('<i>"'.$qry.'".</i><br /> '.$this->dbc->error);}
		}
		catch (customException $error)
		{
			$error->sendError();
		}
		$this->disconnect();
		return $sql;
	}
	
}
?>
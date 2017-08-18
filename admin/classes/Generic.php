<?php
	include_once('Database.php');
	class Generic extends Database
	{
		function get_table_name($tableName)
		{
			return 'tbl_'.$tableName;
		}
		function generate_random_alphanumeric_string($length=6)
		{
			$sequence = str_split('abcdefghijklmnopqrstuvwxyz'
					.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
					.'0123456789'); 
			shuffle($sequence); 
			$string = '';
			foreach (array_rand($sequence, $length) as $index) $string .= $sequence[$index];
			return $string;
		}
		function manage_row($data)
		{ 
			$tableName = $this->get_table_name($data['handler']);
			$response = array();
			$sql = 0;
			$columnToDelete = 'id';
			if(isset($data['columnToDelete']))
				$columnToDelete = $data['columnToDelete'];
			if($data['type']=="Add")
			{ 	
				$data['createdOn']=date('Y-m-d h:m:s');
				$sql=$this->insert($tableName,$data); 
			}
			else if($data['type']=="Edit") 
			{
				$data['modifiedOn']=date('Y-m-d h:m:s');
				$sql=$this->update($tableName,$data,"`id`='".$data['editId']."'");
				$tab="View";
			}		
			elseif($data['type']=="Delete") 
			{
				$sql = $this->delrec($tableName,$columnToDelete,$data['id']);
			}
			return $sql;
		}
		/*
		 * [param] = @Array @Required @{array of condition columns and values}
		 * [fieldOperator] = @String @Optional @{operator between column name and value} 
		 * [operator] = @String @Optional @{opertor between multiple clauses}
		 * [conditionType] = @String @Optional @{flag to generate complex condition}
		 * [condition] = @String @Required in aggregate condition
		 * [condition][] =@Array @Required in aggregate condition. Array index will be same as simple condition.
		 *                @clauseOperator @String @operator to be used between clauses 
		 * */
		function generate_condition($conditionParam)
		{
			$condition = '';
			$Database = new Database();
			$Database->connect();
			$fieldOperator = '='; // defaults to EQUAL TO field operator
			if(!isset($conditionParam['conditionType'])) // generate simple condition with one operator
			{
				$operator = ' AND '; // defaults to AND operator in condition
				if(isset($conditionParam['fieldOperator']))
					$fieldOperator = $conditionParam['fieldOperator'];
				if(isset($conditionParam['operator']))
					$operator = $conditionParam['operator'];
				$keys = array_keys($conditionParam['param']);
				for($count=0;$count<count($keys);$count++)
				{
					$condition.= " ".$keys[$count]." ".$fieldOperator." '".$Database->sql_injection($conditionParam['param'][$keys[$count]])."' ";
					if($count<(count($keys)-1)) $condition.= " ".$operator." ";
				}
			}
			else if($conditionParam['conditionType']=='aggregate') // generate complex condition with multiple operators
			{
				$clauses = $conditionParam['condition'];
				for($count=0;$count<count($clauses);$count++)
				{
					$clauseOperator = ' AND '; // defaults to AND operator in clauses
					$operator = ' AND '; // defaults to AND operator in condition
					$fieldOperator = ' = ';
					if(isset($clauses[$count]['fieldOperator']))
						$fieldOperator = $clauses[$count]['fieldOperator'];
					if(isset($clauses[$count]['operator']))
						$operator = $clauses[$count]['operator'];
					if(isset($clauses[$count]['clauseOperator']))
						$clauseOperator = $clauses[$count]['clauseOperator'];
					$keys = array_keys($clauses[$count]['param']);
					$condition.= ' (';
					for($countInner=0;$countInner<count($keys);$countInner++)
					{
						$condition.= " ".$keys[$countInner]." ".$fieldOperator." '".$Database->sql_injection($clauses[$count]['param'][$keys[$countInner]])."' ";
						if($countInner<(count($keys)-1)) $condition.= " ".$operator." ";
					}
					$condition.= ' ) ';
					if($count<(count($clauses)-1))
						$condition.= ' '.$clauseOperator.' ';
				}
			}
			return $condition;
		}
		function get_list($data)
		{	
			$limits = array();
			$orderBy = 'id';
			$orderByFlow = true; // defaults to ASC 
			if(isset($data['fields']))
				$fields = $data['fields'];
			else $fields = '*';
			if(isset($data['limits']))
				$limits = $data['limits'];
			if(isset($data['orderBy'])) $orderBy = $data['orderBy'];
			if(isset($data['orderByFlow'])) $orderByFlow = $data['orderByFlow'];
			$tableName = $this->get_table_name($data['handler']);
			$response = array();
			$condition = $data['condition']; 
			$response=$this->select_all($tableName,$condition,$orderBy,$orderByFlow,$limits,$fields);
			return $response;
		}
		function get_column_list($data)
		{	
			$tableName = $this->get_table_name($data['handler']);
			$response = array();
			$response=$this->fetch_field($tableName);
			return $response;
		}
		function get_details($data,$returnType='object')
		{	
			$tableName = $this->get_table_name($data['handler']);
			$response = array();
			$condition = $data['condition']; 
			$response=$this->select($tableName,$returnType,$condition,false,'id','DESC');
			return $response;
		}
		function raw_query($qry)
        {

        $result =array();
         $Database = new Database();
         $Database->connect();

        $sql=$Database->dbc->query($qry);
         //print_r($sql);
         if($sql)
         {
           $Database->rows=$sql->num_rows;
           if($Database->rows>0)
           {
             $i=1;
             while($run=$sql->fetch_assoc())
             {

              $result[] = $run;
               if(!isset($temp)){$temp=array_keys($run);}
             }
             return $result;
  
          }
         }
  
   
        }
	}
?>
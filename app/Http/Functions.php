<?php  
//key value from Json
function kvfj($json, $key)
{
	if($json == null){
		return false;
	}
	else{
		$json = json_decode($json, true);
		if(array_key_exists($key, $json)){
			return $json[$key];
		}
		else{
			return false;
		}
	}
}
function getModulesArray()
{
	$a = [
		'0' => 'Productos',
		'1' => 'Blog',
		'2' => 'Deportes'
	];
	return $a;
}
function getRoleUserArray($mode, $id)
{
	$roles = ['0' => 'Usuario normal', '1' => 'Administrador'];
	if(!is_null($mode)){
		return $roles;
	}else{
		return $roles[$id];		
	}

}
function getUserStatusArray($mode, $id)
{
	$status = ['0' => 'Registrado', '1' => 'Verificado', '100' => 'Baneado'];
	if(!is_null($mode)){
		return $status;
	}else{
		return $status[$id];
	}
}
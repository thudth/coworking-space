<?php
class rolesLogic
{
	public static function instance(){
		return new rolesLogic();
	}
	public function getAll()
	{
		return rolesDao::instance()->getAll();
	}
	public function getOne($id)
	{
		return rolesDao::instance()->getOne($id);
	}
	public function insert($rolesDto)
	{
		return rolesDao::instance()->insert($rolesDto);
	}
	public function update($rolesDto)
	{
		return rolesDao::instance()->update($rolesDto);
	}
	public function delete($id)
	{
		return rolesDao::instance()->delete($id);
	}
}
?>
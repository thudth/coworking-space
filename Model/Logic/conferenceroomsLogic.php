<?php 	
	class conferenceroomsLogic
	{	
		public static function instance()
		{
			return new conferenceroomsLogic();
		}
		public function getAll()
		{			
			return conferenceroomsDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return conferenceroomsDao::instance()->getOne($id);
		}
		public function insert($conferenceroomsDto)
		{
			conferenceroomsDao::instance()->insert($conferenceroomsDto);	
		}
		public function update($conferenceroomsDto)
		{
			conferenceroomsDao::instance()->update($conferenceroomsDto);
		}
		public function delete($id)
		{
			conferenceroomsDao::instance()->delete($id);	
		}
	}
?>
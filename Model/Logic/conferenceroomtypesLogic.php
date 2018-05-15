<?php 	
	class conferenceroomtypesLogic
	{	
		public static function instance()
		{
			return new conferenceroomtypesLogic();
		}
		public function getAll()
		{			
			return conferenceroomtypesDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return conferenceroomtypesDao::instance()->getOne($id);
		}
		public function insert($conferenceroomtypesDto)
		{
			conferenceroomtypesDao::instance()->insert($conferenceroomtypesDto);	
		}
		public function update($conferenceroomtypesDto)
		{
			conferenceroomtypesDao::instance()->update($conferenceroomtypesDto);
		}
		public function delete($id)
		{
			conferenceroomtypesDao::instance()->delete($id);	
		}
	}
?>
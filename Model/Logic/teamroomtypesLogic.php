<?php 	
	class teamroomtypesLogic
	{	
		public static function instance()
		{
			return new teamroomtypesLogic();
		}
		public function getAll()
		{			
			return teamroomtypesDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return teamroomtypesDao::instance()->getOne($id);
		}
		public function insert($teamroomtypesDto)
		{
			teamroomtypesDao::instance()->insert($teamroomtypesDto);	
		}
		public function update($teamroomtypesDto)
		{
			teamroomtypesDao::instance()->update($teamroomtypesDto);
		}
		public function delete($id)
		{
			teamroomtypesDao::instance()->delete($id);	
		}
	}
?>
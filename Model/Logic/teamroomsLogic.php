<?php 	
	class teamroomsLogic
	{	
		public static function instance()
		{
			return new teamroomsLogic();
		}
		public function getAll()
		{			
			return teamroomsDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return teamroomsDao::instance()->getOne($id);
		}
		public function insert($teamroomsDto)
		{
			teamroomsDao::instance()->insert($teamroomsDto);	
		}
		public function update($teamroomsDto)
		{
			teamroomsDao::instance()->update($teamroomsDto);
		}
		public function delete($id)
		{
			teamroomsDao::instance()->delete($id);	
		}
	}
?>
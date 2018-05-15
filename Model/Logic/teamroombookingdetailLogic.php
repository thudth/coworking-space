<?php 	
	class teamroombookingdetailLogic
	{	
		public static function instance()
		{
			return new teamroombookingdetailLogic();
		}
		public function getAll()
		{			
			return teamroombookingdetailDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return teamroombookingdetailDao::instance()->getOne($id);
		}
		public function insert($teamroombookingdetailDto)
		{
			teamroombookingdetailDao::instance()->insert($teamroombookingdetailDto);	
		}
		public function update($teamroombookingdetailDto)
		{
			teamroombookingdetailDao::instance()->update($teamroombookingdetailDto);
		}
		public function delete($id)
		{
			teamroombookingdetailDao::instance()->delete($id);	
		}
	}
?>
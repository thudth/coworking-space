<?php 	
	class conferenceroombookingdetailLogic
	{	
		public static function instance()
		{
			return new conferenceroombookingdetailLogic();
		}
		public function getAll()
		{			
			return conferenceroombookingdetailDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return conferenceroombookingdetailDao::instance()->getOne($id);
		}
		public function insert($conferenceroombookingdetailDto)
		{
			conferenceroombookingdetailDao::instance()->insert($conferenceroombookingdetailDto);	
		}
		public function update($conferenceroombookingdetailDto)
		{
			conferenceroombookingdetailDao::instance()->update($conferenceroombookingdetailDto);
		}
		public function delete($id)
		{
			conferenceroombookingdetailDao::instance()->delete($id);	
		}
	}
?>
<?php 	
	class seatbookingdetailLogic
	{	
		public static function instance()
		{
			return new seatbookingdetailLogic();
		}
		public function getAll()
		{			
			return seatbookingdetailDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return seatbookingdetailDao::instance()->getOne($id);
		}
		public function insert($seatbookingdetailDto)
		{
			seatbookingdetailDao::instance()->insert($seatbookingdetailDto);	
		}
		public function update($seatbookingdetailDto)
		{
			seatbookingdetailDao::instance()->update($seatbookingdetailDto);
		}
		public function delete($id)
		{
			seatbookingdetailDao::instance()->delete($id);	
		}
	}
?>
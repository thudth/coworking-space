<?php 	
	class orderstateLogic
	{	
		public static function instance()
		{
			return new orderstateLogic();
		}
		public function getAll()
		{			
			return orderstateDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return orderstateDao::instance()->getOne($id);
		}
		public function insert($orderstateDto)
		{
			orderstateDao::instance()->insert($orderstateDto);	
		}
		public function update($orderstateDto)
		{
			orderstateDao::instance()->update($orderstateDto);
		}
		public function delete($id)
		{
			orderstateDao::instance()->delete($id);	
		}
	}
?>


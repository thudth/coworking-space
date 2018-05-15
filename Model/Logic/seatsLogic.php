<?php 	
	class seatsLogic
	{	
		public static function instance()
		{
			return new seatsLogic();
		}
		public function getAll()
		{			
			return seatsDao::instance()->getAll();
		}
		public function getOne($id)
		{
			return seatsDao::instance()->getOne($id);
		}
		public function insert($seatsDto)
		{
			seatsDao::instance()->insert($seatsDto);	
		}
		public function update($seatsDto)
		{
			seatsDao::instance()->update($seatsDto);
		}
		public function delete($id)
		{
			seatsDao::instance()->delete($id);	
		}
	}
?>


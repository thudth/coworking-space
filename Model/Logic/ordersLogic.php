<?php 	
	class ordersLogic
	{	
		public static function instance()
		{
			return new ordersLogic();
		}
//Admin------------------------------------------------------------------------------------------
	//Order List
		public function getAll()
		{			
			return ordersDao::instance()->getAll();
		}
	//Order Detail	
		public function getSeatDetail($id)
		{
			return ordersDao::instance()-> getSeatDetail($id);
		}	
		public function getTeamRoomDetail($id)
		{
			return ordersDao::instance()-> getTeamRoomDetail($id);
		}		
		public function getConferenceRoomDetail($id)
		{
			return ordersDao::instance()-> getConferenceRoomDetail($id);
		}
	//Allocate
		//Danh sach phong phu hop voi don hang (FIT)
		public function getSeatsFit($seatbookingdetailDto)
		{
			return ordersDao::instance()->getSeatsFit($seatbookingdetailDto);
		}
		public function getTeamroomsFit($teamroombookingdetailDto)
		{
			return ordersDao::instance()->getTeamroomsFit($teamroombookingdetailDto);
		}
		public function getConferenceRoomFit($ConferenceRoombookingdetailDto)
		{
			return ordersDao::instance()->getConferenceRoomFit($ConferenceRoombookingdetailDto);
		}
		//Update Status
		
		public function  updateStatus($ordercode)
		{
			return ordersDao::instance()-> updateStatus($ordercode);
		}
		//Allocate
		public function allocateSeat($seatsDto)
		{
			return ordersDao::instance()->allocateSeat($seatsDto);
		}
		public function allocateTeamRoom($teamroomDto)
		{
			return ordersDao::instance()->allocateTeamRoom($teamroomDto);
		}
		public function allocateConferenceRoom($conferenceRoomDto)
		{
			return ordersDao::instance()->allocateConferenceRoom($conferenceRoomDto);
		}
		public function updateInforAllocate($ordercode)
		{
			return ordersDao::instance()->updateInforAllocate($ordercode);
		}
		
		
		
		
		
		
		
		
		public function getOne($id)
		{
			return ordersDao::instance()->getOne($id);
		}
		public function insert($ordersDto)
		{
			ordersDao::instance()->insert($ordersDto);	
		}
		public function update($ordersDto)
		{
			ordersDao::instance()->update($ordersDto);
		}
		public function delete($id)
		{
			ordersDao::instance()->delete($id);	
		}
	}
?>
<?php namespace Nontakorn\Auth;
    class AuthBackend {
        protected $client_id;
        protected $account;
        protected $email;
        protected $mobile;
        protected $password;
        protected $confirm_password;
        protected $old_password;
        protected $idcard;
        protected $display_name;
        protected $firstname;
        protected $lastname;
        protected $ip;
        protected $secret;
        protected $uid;
        public $profile;


        private function showerror(){

            return  json_encode(array('error'=>'login failed', 'code'=>'0001'));
        }

        public function updatepassword($params=array(''))
        {   

            $id             = \Session::get('userid');
            $account        = \User::find($id);

            if(!is_null($account)){

                if(\Hash::check($params['old_pwd'], $account->password)){
                    
                    $account->password = \Hash::make($params['new_pwd']);

                    $account->save();

                    return $account->toArray();

                }else{
                    return  json_encode(array('error'=>'old password was wrong', 'code'=>'0002'));
                }

            }else{
                // retuen failed
                return $this->showerror();
            }
        }
        
        public function login($params=array(''))
        {   
            $account = strtolower($params['account']);
            $user_selected = \DB::table('accounts')->where('username', $account)->first();
            
            // echo \Hash::make($params['password']);
            // echo "<br/>";
            // print_r($user_selected);
            // exit;
            if(!is_null($user_selected)){
                if(\Hash::check($params['password'], $user_selected->password)){
                    // Generate session
                    $this->generateSession($user_selected);
                    \Session::put('user',$user_selected->firstname." ".$user_selected->lastname);
                    \Session::put('userid',$user_selected->id);
                    return json_encode($user_selected);
                }else{
                    // retuen failed
                    return $this->showerror();
                }
            }else{
                // retuen failed
                return $this->showerror();
            }
            
        }
        public function logout($params=array()){

            $this->destroySession();
            return \Redirect::to('/');;
        }
        
        public function user($value='')
        {
            # code...
             $access_token = \Session::get('access_token');
             if(is_null($access_token) || empty($access_token)){
                return false;
            }else{
                return true;
            }
        }


        public function listRoomtype($data=array()){

            
            $roomtype = \Roomtype::all();

            return $roomtype;
        }

        public function listRoomtypeAllotment($data=array()){

            $roomtype = \Roomtype::all();

            foreach ($roomtype as $value) {
                # code...
                foreach ($value->allotment as $x) {
                    
                }
                
            }

            return $roomtype;
        }

        public function listAllotmentbyroomtype($params=array()){

            $allot_from = \DateTime::createFromFormat('d/m/Y', $params['checkin'])->format('Y-m-d');
            $allot_to = \DateTime::createFromFormat('d/m/Y', $params['checkout'])->format('Y-m-d');

            if($params['amount_guest']==1){
                   $allotment = \Allotment::select(\DB::raw('*, MIN(allotment_quata) as minroom, MAX(price_one) as maxprice'))
                              ->whereBetween('allotment_date', array($allot_from, $allot_to))
                              ->groupBy('roomtype_id')
                              ->get();
            }else{
                $allotment = \Allotment::select(\DB::raw('*, MIN(allotment_quata) as minroom, MAX(price_double) as maxprice'))
                              ->whereBetween('allotment_date', array($allot_from, $allot_to))
                              ->groupBy('roomtype_id')
                              ->get();
            }

                      
            // $allotment = \Allotment::whereBetween('allotment_date', array($allot_from, $allot_to))
            //                                       ->get();

            foreach ($allotment as $value) {
                # code...
                foreach ($value->roomtype as $x) {

                }
                
                
            }
            return $allotment;
        }

        public function getRoomtype($id){
            $roomtype = \Roomtype::find($id);

            return $roomtype;
        }

        public function addRoomtype($data=array()){

            $ip = \Request::getClientip();
            $roomtype = new \Roomtype;


            $roomtype->roomtype_name = $data['roomtype_name'];
            $roomtype->roomtype_image = $data['roomtype_image'];
            $roomtype->roomtype_price = $data['roomtype_price'];
            $roomtype->roomtype_maxperson = $data['roomtype_maxperson'];
            $roomtype->roomtype_maxbedsupport = $data['roomtype_maxbedsupport'];
            $roomtype->include_breakfast = isset($data['include_breakfast'])?1:0;
            $roomtype->created_ip = $ip;
            $roomtype->updated_ip = $ip;

            $roomtype->save();

            return $roomtype->id;
        }

        public function updateRoomtype($data=array()){


           

            $ip = \Request::getClientip();
            $roomtype = \Roomtype::find($data['roomtype_id']);

            $roomtype->roomtype_name = $data['roomtype_name'];
            
            if(!empty($data['roomtype_image'])){
                $roomtype->roomtype_image = $data['roomtype_image'];
            }

            $roomtype->roomtype_price = $data['roomtype_price'];
            $roomtype->roomtype_maxperson = $data['roomtype_maxperson'];
            $roomtype->roomtype_maxbedsupport = $data['roomtype_maxbedsupport'];
            $roomtype->include_breakfast = isset($data['include_breakfast'])?1:0;
            $roomtype->updated_ip = $ip;

           if($roomtype->save()){
                return "true";
           }else{
                return "false";
           }
        }

        public function guest(){
            $access_token = \Session::get('access_token');
            if(is_null($access_token) || empty($access_token)){
                return true;
            }else{
                return false;
            }
        }


        public function updateAllotment($params=array()){

            $allotments = \Allotment::find($params['id']);

            if(isset($params['allotment_quata'])){
                $allotments->allotment_quata = $params['allotment_quata'];
            }else if(isset($params['price_one'])){
                $allotments->price_one = $params['price_one'];
            }else{
                $allotments->price_double = $params['price_double'];
            }

            if($allotments->save()){
                return "true";
            }else{
                return "false";
            }
        }

        public function getAllotmentPrices($params=array()){
            $allot_from = \DateTime::createFromFormat('d/m/Y', $params['from'])->format('Y-m-d');
            $allot_to = \DateTime::createFromFormat('d/m/Y', $params['to'])->format('Y-m-d');

            $begin = new \DateTime($allot_from);
            $end = new \DateTime($allot_to);

            $end->add(new \DateInterval('P1D'));
            $interval = \DateInterval::createFromDateString('1 day');

            $roomtype = \Roomtype::find($params['id']);

            $allotment_db   =\DB::table('allotments');
            $allotments     = $allotment_db->where('roomtype_id','=',$roomtype->id)
                                                  ->whereBetween('allotment_date', array($allot_from, $allot_to))
                                                  ->get();

            return $allotments;
        }

        public function getAllotment($params=array()){
            

            $allot_from = \DateTime::createFromFormat('d/m/Y', $params['from'])->format('Y-m-d');
            $allot_to = \DateTime::createFromFormat('d/m/Y', $params['to'])->format('Y-m-d');

            $begin = new \DateTime($allot_from);
            $end = new \DateTime($allot_to);

            $end->add(new \DateInterval('P1D'));
            $interval = \DateInterval::createFromDateString('1 day');

            $roomtype = \Roomtype::find($params['id']);

            $allotment_db =\DB::table('allotments');
            $allotments = $allotment_db->where('roomtype_id','=',$roomtype->id)
                                                  ->whereBetween('allotment_date', array($allot_from, $allot_to))
                                                  ->get();

            $count = count($allotments);

            $allotment_date =  array();

            if($count==0){

                // Check quata from roomtype
                // Insert before

                
                $period = new \DatePeriod($begin, $interval, $end);

                
                foreach ( $period as $dt ){

                     $allotment_db->insert(
                        array(  
                            'allotment_date' => $dt->format( "Y-m-d" ),
                            'allotment_dayname' => $dt->format( "l" ), 
                            'allotment_quata' => 10,
                            'roomtype_id'=>$roomtype->id,
                            'price_one'=>$roomtype->roomtype_price,
                            'price_double'=>$roomtype->roomtype_prices_double,
                            'created_at'=>\Carbon::Now(),
                            'updated_at'=>\Carbon::Now(),
                            )
                        );
                 }                
                // and then select again
                     $allotments = $allotment_db->where('roomtype_id','=',$roomtype->id)
                                                  ->whereBetween('allotment_date', array($allot_from, $allot_to))
                                                  ->get();

                    return $allotments;
            }else{
                // Check max date from db < params to ?
                $counter = 0;
                foreach ( $allotments as $allotment){
                    
                    $allotment_date[$counter] = $allotment->allotment_date;
                    $counter++;
                }

                $mostRecent_db= 0;
                foreach($allotments as $allotment){
                  $curDate = strtotime($allotment->allotment_date);
                  if ($curDate > $mostRecent_db) {
                     $mostRecent_db = $curDate;
                  }
                }
                
                $max = date( "Y-m-d" ,$mostRecent_db);

                $begin = new \DateTime($max);

                $endtime = strtotime($allot_to);

                // if yes it params to more than max date
                if($mostRecent_db < $endtime){
                    
                    $period = new \DatePeriod($begin, $interval, $end);
                
                    foreach ( $period as $dt ){
                        // insert new date before
                         $allotment_db->insert(
                            array(  
                                'allotment_date' => $dt->format( "Y-m-d" ), 
                                'allotment_dayname' => $dt->format( "l" ),
                                'allotment_quata' => 10,
                                'roomtype_id'=>$roomtype->id,
                                'price_one'=>$roomtype->roomtype_price,
                                'price_double'=>$roomtype->roomtype_prices_double,
                                'created_at'=>\Carbon::Now(),
                                'updated_at'=>\Carbon::Now(),
                                )
                            );
                     }

                    // and then select again
                     $allotments = $allotment_db->where('roomtype_id','=',$roomtype->id)
                                                  ->whereBetween('allotment_date', array($allot_from, $allot_to))
                                                  ->get();

                    return $allotments;
                    
                }else{
                    // if not show select only
                    return  $allotments;
                    
                }
            }

        }

        public function searchBooking($data=array()){
            
            $booking    = new \Booking;
            $booking    = \DB::table('bookings');

            $searchby   = @$data['searchby'];
            $val        = @$data['val'];

            if($searchby=="guest"){

                $res = $booking->where(function($q) use ($val){

                    if(!empty($val)){
                        $q->where('customer_firstname', 'LIKE', '%'.$val.'%');
                        $q->orWhere('customer_lastname', 'LIKE', '%'.$val.'%');
                          
                    }

                })->where('payment_status','=', 0)
                  ->orderBy('checkin_date', 'asc')
                  ->get();

            }else{
                # bookingnumber
                $res = $booking->where(function($q) use ($val){
                    if(!empty($val)){
                        $q->where('bookingnumber','=',$val);
                    }
                })->where('payment_status','=', 0)
                  ->orderBy('checkin_date', 'asc')
                  ->get();
                          
            }

            return $res;

        }

        public function getBooking($id){
            $booking = new \Booking;

            $booking =\DB::table('bookings');

            $res = $booking->where('id','=',$id)->get();

            return $res;
        }

        public function getBookings($data=array()){

            $booking = new \Booking;

            $booking =\DB::table('bookings');

            $start = '14/06/2014';
            $to    = \Date('Y-m-d',time());

            if(!empty($data['checkinfrom']))
                    $checkinfrom = \DateTime::createFromFormat('d/m/Y', $data['checkinfrom'])->format('Y-m-d');
            else
                    $checkinfrom = \DateTime::createFromFormat('d/m/Y', $start)->format('Y-m-d');

            $checkinto ="";
            if(!empty($data['checkinto']))
                $checkinto = \DateTime::createFromFormat('d/m/Y', $data['checkinto'])->format('Y-m-d');
            

            if(!empty($data['bookfrom']))
                $bookfrom = \DateTime::createFromFormat('d/m/Y', $data['bookfrom'])->format('Y-m-d');
            else
                $bookfrom = \DateTime::createFromFormat('d/m/Y', $start)->format('Y-m-d');


            $bookto = "";
            if(!empty($data['bookfrom']))
                $bookto = \DateTime::createFromFormat('d/m/Y', $data['bookto'])->format('Y-m-d');
            

            $searchby = @$data['searchby'];
            $action = @$data['action'];
            $status = @$data['status'];


            # case all none
            if($action=="All"&&$status=="All"){
                    
                $res = $booking->orderBy('id', 'desc')->get();
            }else{
                
                $res = $booking->where(function($q) use ($action, $searchby, $status, $checkinto, $bookto){

                        if($status!=='All'){
                            $q->where('booking_status','=',$status);
                        }

                        if($action!=='All'){
                            if($action==1)
                                $q->where('account_id','>',0);
                            else
                                $q->where('account_id','=',NULL);
                        }

                        if($checkinto!=""){
                            $q->whereBetween('checkin_date', array($checkinfrom, $checkinto));
                        }

                        if($bookto!=""){
                            $q->whereBetween('created_at', array($bookfrom, $bookto));
                        }

                        })->get();
            }

            return $res;
        }

        public function confirmPrinting($id){

            $booking = \Booking::find($id);
            $booking->print_status =true;
            $booking->save();

            return 1;
        }

        public function confirmBooking($data=array()){

            
            if(!empty($data['account_id'])){
                
                $booking = \Booking::find($data['id']);
                $booking->booking_status =1;
                $booking->payment_status =1;
                $booking->account_id = $data['account_id'];
                $booking->account_fullname = $data['account_fullname'];
                $booking->save();

                return 1;
            }else{
                return 0;
            }
        }

        public function addBooking($data=array()){

            $customer = new \Customer;

            $ip = \Request::getClientip();

            $customer->firstname = $data['firstname'];  
            $customer->lastname = $data['lastname'];
            $customer->mobile = $data['mobile'];
            $customer->email = $data['email'];
            $customer->created_ip = $ip;
            $customer->updated_ip = $ip;

            $customer->save();

            # end add new customer

            $booking = new \Booking;

            $checkin = \DateTime::createFromFormat('d/m/Y', $data['checkin'])->format('Y-m-d');
            $checkout = \DateTime::createFromFormat('d/m/Y', $data['checkout'])->format('Y-m-d');

            $booking->bookingnumber = strtoupper($this->random_string());
            $booking->checkin_date = $checkin;
            $booking->checkout_date = $checkout;
            $booking->booking_price = $data['booking_price'];
            $booking->customer_firstname =  $customer->firstname;
            $booking->customer_lastname =  $customer->lastname;
            $booking->customer_email =  $customer->email;
            $booking->customer_mobile =  $customer->mobile;
            $booking->detail = @$data['detail'];

            $booking->roomtype_id = $data['roomtype_id'];
            $booking->created_ip = $ip;
            $booking->updated_ip = $ip;

            $booking->save();
            

            $res = $booking->find($booking->id);

            return $res->toArray();

        }

        private function random_string(){   
            $character_set_array = array();
            $character_set_array[] = array('count' => 5, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
            $character_set_array[] = array('count' => 3, 'characters' => '0123456789');
            $temp_array = array();
            foreach ($character_set_array as $character_set) {
                for ($i = 0; $i < $character_set['count']; $i++) {
                    $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
                }
            }
            shuffle($temp_array);
            return implode('', $temp_array);
        }           

        private function generateSession($params){

            $access_token = \Hash::make($params->username."||".$params->password);
            
            \Session::put('access_token',$access_token);
        }

        private function destroySession($params=array()){
            
            \Session::flush();
        }

        public function sendmailBooking($data=array()){

            $query = http_build_query($data);
            return file_get_contents('http://orchidresort.net/phpmailer/examples/sendmail.php?'.$query.'');
        }

}
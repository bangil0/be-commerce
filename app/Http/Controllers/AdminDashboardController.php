<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Carbon\Carbon;
	use App\Models\Order;
	use App\Models\Customer;
	use App\Models\Products;

	class AdminDashboardController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "dashboard";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }

	    public function getIndex(){
	    	if(!empty($_GET)){
	    		if($_GET['filter'] == 'This Year'){
	    			$order = Order::where('order_date','like','%'.date('Y').'%')
			    	->get()
			    	->groupBy(function($month) {
					     return Carbon::parse($month->order_date)->format('Y-m');
					 });

			    	foreach ($order as $i => $order_details) {
			    		foreach ($order_details as $j => $order_detail) {
			    			$order_totals = $order_totals + $order_detail->grand_total;
			    		}
			    		$grafik_year[$i] = $order_totals;
			    	}
			    	$data['grafik_year'] =$grafik_year;
	    		}
	    		if($_GET['filter'] == 'This Month'){
	    			$order = Order::where('order_date','like','%'.date('Y-m').'%')
			    	->get()
			    	->groupBy(function($day) {
					     return Carbon::parse($day->order_date)->format('Y-m-d');
					 });

			    	foreach ($order as $i => $order_details) {
			    		foreach ($order_details as $j => $order_detail) {
			    			$order_totals = $order_totals+$order_detail['grand_total'];
			    		}
			    		$grafik_month[$i] = $order_totals;
			    	}
					
					$data['grafik_month'] = $grafik_month;
				}
				if ($_GET['filter'] == 'This Week') {
					//total order last week
			    	$to = date('Y-m-d');
			    	$from = date('Y-m-d',strtotime("-1 week +1 day"));
				    $orderW = Order::whereBetween('order_date', [$from, $to])->get()->groupBy('order_date');
				    if(!empty($orderW)){
				    	foreach ($orderW as $xx => $order_detailsW) {
				    		foreach ($order_detailsW as $j => $order_detail) {
				    			$order_totalW = $order_totalW+$order_detail['grand_total'];
				    		}
				    		$grafik_week[$xx] = $order_totalW;
				    	}
				    }
			    	$data['grafik_weeks'] = $grafik_week;
			    	$data['orderW'] = $orderW;
				}
	    	}
			
			//order total grafik!
			//format('m') untuk month, Y untuk Year, m-d untuk tanggal
	    	//where('order_date','like','%2018-02%') untuk mengambil bulan, dan formatnya di ganti jadi format('Y-m-d')
	    	$order = Order::where('order_date','like','%'.date('Y').'%')
	    	->get()
	    	->groupBy(function($month) {
			     return Carbon::parse($month->order_date)->format('Y-m');
			 });

	    	foreach ($order as $i => $order_details) {
	    		foreach ($order_details as $j => $order_detail) {
	    			$order_totals = $order_totals + $order_detail->grand_total;
	    		}
	    		$grafik_year[$i] = $order_totals;
	    	}
	    	$data['grafik_year'] =$grafik_year;
	    	

	    	
	    	//total order this year
	    	$order = Order::where('order_date','like','%'.date('Y').'%')
		    	->get()
		    	->groupBy(function($month) {
				     return Carbon::parse($month->order_date)->format('Y-m');
				 });
	    	foreach ($order as $i => $order_details) {
	    		foreach ($order_details as $j => $order_detail) {
	    			$order_total_this_year = $order_total_this_year + $order_detail->grand_total;
	    		}
	    	}

	    	//total order this month
	    	$orderM = Order::where('order_date','like','%'.date('Y-m').'%')
		    	->get()
		    	->groupBy(function($month) {
				     return Carbon::parse($month->order_date)->format('Y-m-d');
				 });
		    foreach ($orderM as $x => $order_detailsM) {
	    		foreach ($order_detailsM as $y => $order_detailM) {
	    			$order_total_this_month = $order_total_this_month + $order_detailM->grand_total;
	    		}
	    	}

	    	//total order last week
	    	$to = date('Y-m-d');
			$from = date('Y-m-d',strtotime("-1 week +1 day"));
		    $orderW = Order::whereBetween('order_date', [$from, $to])->get();
		    
		    

	    	//total sales this year
	    	$sales = Order::where('id_order_statuses',2)->where('order_date','like','%'.date('Y').'%')
		    	->get()
		    	->groupBy(function($month) {
				     return Carbon::parse($month->order_date)->format('Y-m');
				 });
	    	foreach ($sales as $i => $sales_details) {
	    		foreach ($sales_details as $j => $sales_detail) {
	    			$sales_total_this_year = $sales_total_this_year + $sales_detail->grand_total;
	    		}
	    	}

	    	//overview
	    	$jumlah_order_this_year = Order::where('order_date','like','%'.date('Y',strtotime(now())).'%')->count();
	    	$total_product_this_year = Products::where('created_at','like','%'.date('Y',strtotime(now())).'%')->count();
	    	$total_customer_this_year = Customer::where('created_at','like','%'.date('Y',strtotime(now())).'%')->count();
	    	$waiting_approve_this_year = Customer::where('status','Off')->where('created_at','like','%'.date('Y',strtotime(now())).'%')->count();	    	

	    	//latest 10 orders
	    	$table_orders = Order::select('orders.*','order_statuses.name as order_status','customers.id as cust_id','customers.name as customers_name')
	    	->orderBy('id', 'desc')
	    	->join('customers','customers.id','=','orders.id_customers')
	    	->join('order_statuses','order_statuses.id','=','orders.id_order_statuses')
	    	->take(10)->get();

	    	//latest 10 customers
	    	$table_customers = Customer::orderBy('id','desc')->take(10)->get();
	    		
	    	$data['sales_total_this_year'] =$sales_total_this_year;
	    	$data['order_total_this_year'] =$order_total_this_year;
	    	$data['order_total_this_month'] =$order_total_this_month;
	    	$data['order_total_this_week'] =$order_total_this_week;
	    	$data['waiting_approve_this_year'] =$waiting_approve_this_year;
	    	$data['total_customer_this_year'] =$total_customer_this_year;
	    	$data['total_product_this_year'] =$total_product_this_year;
	    	$data['jumlah_order_this_year'] =$jumlah_order_this_year;
	    	$data['year'] =$year;
	    	$data['yTot'] =$yTot;
	    	$data['month'] =$month;
	    	$data['mTot'] =$mTot;
	    	$data['table_customers'] =$table_customers;
	    	$data['table_orders'] =$table_orders;
	    	$data['title'] ='title';
	    	
	    	$this->cbView('admin.dashboard.index',$data);
	    }



	    //By the way, you can still create your own method in here... :) 


	}
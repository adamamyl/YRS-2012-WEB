<?PHP

class Page {
	public $breadcrumbs;
	
	function print_nav($delimiter){
		if(is_array($this->breadcrumbs)&&count($this->breadcrumbs)>0){
			$output='<ul class="breadcrumb">';
			$output.='<li>Young Rewired State <span class="divider">'.$delimiter.'</span> </li>';
			foreach($this->breadcrumbs as $breadcrumb){
				$output.=' <li>'.$breadcrumb.'';
				$output.=' <span class="divider">'.$delimiter.'</span> </li> ';
			}
			$output=substr($output,0,-38);
			$output.='</li></ul>';
			return $output;
		}else return false;
	}
	
	function print_pills($array,$currenturl){
		if(is_array($this->breadcrumbs)&&count($this->breadcrumbs)>0){
			$output='<ul class="nav nav-pills">';
			foreach($array as $name=>$url){
				if($name===(int)0) return false;
				if(is_string($url)){
					if($url==$currenturl) $class="active";
					else $class='';
					$output.=' <li class="'.$class.'"><a href="'.$this->get_url($url).'">'.$name.'</a></li> ';
				}else die("Type of navigation not yet supported.");
			}
			$output.='</li></ul>';
			return $output;
		}else return false;
	}
	
	function get_active($str){
		if($this->breadcrumbs[0]==$str) return "active ";
	}
	
	function print_title(){
		switch($this->breadcrumbs[0]){
			case 'Candidates':
			return '<h1>Information for Participants</h1>';
			case 'Parents':
			return '<h1>Information for Parents</h1>';
			case 'Internal':
			return '<h1>Information for Volunteers, Mentors &amp; Centres</h1>';
			case 'Festival of Code':
			return '<h1>Festival of Code</h1>';
			case 'Sponsors':
			return '<h1>YRS Sponsors</h1>';
			case 'Contact':
			return '<h1>Contact Information</h1>';
			case 'As it Happens':
			return '';
			default:
			return '<h1>Generic Page</h1>';
		}
	}
	
	function error($integer){
		header("HTTP/1.1 404 Not Found");
		die("You gone and dunnit now. <a href=\"/\">Go home.</a><div style=\"font-size:256px\">404</div>");
	}
	
	private function get_url($str){
		if(substr($str,-1) == '/')return '?p='.$str.'&e=';
		else return '?p='.$str.'&e=.html';
	}
	
	public function get_title(){
		return ($this->title===0)?'Young Rewired State':'YRS: '.$this->breadcrumbs[0].' &mdash; '.$this->title;
	}
	
	public function get_content_path($str,$loc){
		if(substr($str,-1) == '/')return 'content/'.$loc.'/'.$str.'index.inc';
		else return 'content/'.$loc.'/'.$str.'.inc';
	}
	
	private function print_pills_sub(){}
	
}
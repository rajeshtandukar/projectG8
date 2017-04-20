<?php
class Pagination{

	public $limit;
	public $total;
	public $page;
	public $totalpages;
	public $limistart;

	public function __construct($limit){

		$this->limit = $limit;
		
	}

	public function setLimit($total,$page = null){
		
		$this->page = isset($page)?$page:1;
		$this->total = $total;

		$this->totalpages = ceil($this->total/$this->limit);
		

		if($this->page == 1){
			$this->limistart=0;	
		}else{
			$this->limistart= ($this->page-1) * $this->limit;
		}


	}

	public function getPage(){

		if($this->page !=1){
			echo '<li><a href="index.php?page=1">&lt;&lt;</a></li>';
		}
						  
		for($i=1;$i<=$this->totalpages;$i++) {
			$class = ($this->page== $i)? 'active':'';	
											
			echo '<li class="'.$class.'>">';
			 if($this->page == $i){
				echo '<a >'. $i.'</a>';
			 }else{
				echo '<a href="index.php?page='. $i.'">'.$i.'</a>';
			 }
				echo '</li>';

		}
		
		if($this->page != $this->totalpages){
		 echo '<li><a href="index.php?page='.$this->totalpages.'">&gt;&gt;</a></li>';
		}

	}


}
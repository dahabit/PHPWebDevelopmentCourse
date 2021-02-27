<?
		/****************************************
		*        ��� ���� ������ ������         *
		*                                       *
		*            pager class v1.0           *
		*  Programed By Hazem Khaled (MeZoO)    *
		*             www.mezoo.Biz             *
		*                                       *
		*            page.class.php             *
		*                                       *
		*		start: 12-05-2005 9:32 AM       *
        *	   finish: 12-05-2005 10:39 PM      *
		****************************************/
class full_pager {

	var $page;
    var $perpage;
    var $total;
    var $link;
    var $pages;
    var $maxpage;
    var $minpage;

	function full_pager($page,$perpage,$total,$mode,$next,$prev,$end,$start,$link=''){
    	// �� �� ������ ��� ������
    	if ($page == 0){$page=1;}

        // ����� ����� �����
        $this->page		= $page;
    	$this->perpage	= $perpage;
    	$this->total	= $total;
    	$this->link		= $link;

		// ����� & �� ���� ����� ������� ����
        if((isset($this->link))&&($this->link!='')){
            $this->link = $this->link.'&';
        }

        // �� ���� �� ��� ������� ���� �� ����� ������� �� ���� �� ������ ������
        if ($this->total > $this->perpage){

        	// ���� �������
            print "\n<!-- ����� ����� ������� 1.0 �� ����� ���� ���� 13-5-2005 -->\n";

        	// ���� ���� ��� ������� �������� ��� ������
        	$this->pages = ceil($this->total/$this->perpage);

            // ���� �� ��� ����
            if ($start == 1 && $this->page > 1){
                print "[<a href=\"?".$this->link."page=1\" title=\"������ ������\">&laquo;</a>]&nbsp;&nbsp;&nbsp;\n";
            }

            // ���� �� ������
            if ($prev == 1 && $this->page > 1){
            	$page_prev = $this->page-1;
            	print "[<a href=\"?".$this->link."page=".$page_prev."\" title=\"������ �������\">&lt;</a>]&nbsp;&nbsp;&nbsp;\n";
            }

            if ($mode == 1){
            	// ������ ����� �������
	            if ($this->page-3 <= $this->pages && $this->page-3 > 1){
    	        	$this->minpage = $this->page-3;
        	        //print '<a href="?'.$this->link.'page=1">[1]</a>.. ';
	            }elseif ($this->page-2 <= $this->pages && $this->page-2 > 1){
    	        	$this->minpage = $this->page-3;
        	    }elseif ($this->page-1 <= $this->pages && $this->page-1 > 1){
            		$this->minpage = $this->page-2;
	            }elseif ($this->page <= $this->pages && $this->page > 1){
    	        	$this->minpage = $this->page-1;
        	    }else{
            		$this->minpage = $this->page;
	            }

                // ������ ����� �������
	            if ($this->page+3 <= $this->pages){
    	        	$this->maxpage = $this->page+3;
        	        //print '..<a href="?'.$this->link.'page=10">[10]</a> ';
            	}elseif ($this->page+2 <= $this->pages){
	            	$this->maxpage = $this->page+2;
    	        }elseif ($this->page+1 < $this->pages){
        	    	$this->maxpage = $this->page+1;
            	}else{
	            	$this->maxpage = $this->pages;
    	        }

	            // ��� ����� ��� �������
    	        for ($i=$this->minpage ; $i<=$this->maxpage ; $i++){

            	    if ($this->page == $i && $this->page == 1){

	                	// �� ���� ���� �� ������ �������
	                	print "[".$i."].. \n";
    	            }elseif ($this->page == $i && $this->page <> 1 && $this->page <> $this->pages){

	    	            // �� ���� ���� �� ������ �������
            	    	print "..[".$i."].. \n";
                	}elseif ($this->page == $i && $this->page == $this->pages){

	                	// �� ���� ���� �� ������ �������
	                	print "..[".$i."]\n";
    	            }else{
        	        	print "<a href=\"?".$this->link."page=".$i."\">[".$i."]</a> \n";
            	    }
	            }
            }else{
            	// ��� ����� ��� �������
    	        for ($i=1 ; $i<=$this->pages ; $i++){

            	    if ($this->page == $i && $this->page == 1){

	                	// �� ���� ���� �� ������ �������
	                	print "[".$i."].. \n";
    	            }elseif ($this->page == $i && $this->page <> 1 && $this->page <> $this->pages){

	    	            // �� ���� ���� �� ������ �������
            	    	print "..[".$i."].. \n";
                	}elseif ($this->page == $i && $this->page == $this->pages){

	                	// �� ���� ���� �� ������ �������
	                	print "..[".$i."]\n";
    	            }else{
        	        	print "<a href=\"?".$this->link."page=".$i."\">[".$i."]</a> \n";
            	    }
	            }
            }

            // ���� �� ������
            if ($next == 1 && $this->page < $this->pages){
            	$page_next = $this->page+1;
            	print "&nbsp;&nbsp;&nbsp;[<a href=\"?".$this->link."page=".$page_next."\" title=\"������ �������\">&gt;</a>]\n";
            }

            // ���� �� ��� ����
            if ($end == 1 && $this->page < $this->pages){
            	print "&nbsp;&nbsp;&nbsp;[<a href=\"?".$this->link."page=".$this->pages."\" title=\"������ �������\">&raquo;</a>]\n";
            }
        	// ���� �������
            print "\n<!-- ����� ����� ������� 1.0 �� ����� ���� ���� 13-5-2005 -->\n";
        }

    }
}
?>
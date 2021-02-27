<?
		/****************************************
		*        »”„ «··Â «·—Õ„‰ «·—ÕÌ„         *
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
    	// ≈‰ ·„ Ì Ê«Ãœ —ﬁ„ «·’›Õ…
    	if ($page == 0){$page=1;}

        // ≈œŒ«· «·ﬁÌ„ ··›∆…
        $this->page		= $page;
    	$this->perpage	= $perpage;
    	$this->total	= $total;
    	$this->link		= $link;

		// ·≈÷›… & ›Ï Õ«·… ≈÷«›… „ €Ì—«  √Œ—Ï
        if((isset($this->link))&&($this->link!='')){
            $this->link = $this->link.'&';
        }

        // ›Ï Õ«·… √‰ ⁄œœ «·‰ «∆Ã √ﬂ»— „‰ «·⁄œœ «·„› —÷ √‰ ÌﬂÊ‰ ›Ï «·’›Õ… «·√Ê·Ï
        if ($this->total > $this->perpage){

        	// ÕﬁÊﬁ «·»—„Ã…
            print "\n<!-- »œ«Ì…  ⁄œ«œ «·’›Õ«  1.0 „‰ »—„Ã… Õ«“„ Œ«·œ 13-5-2005 -->\n";

        	// ”Ì „ Õ”«» ⁄œœ «·’›Õ«  Ê ﬁ—Ì»Â« ≈·Ï «·√ﬂ»—
        	$this->pages = ceil($this->total/$this->perpage);

            // ·⁄—÷ “— √Ê· ’›Õ…
            if ($start == 1 && $this->page > 1){
                print "[<a href=\"?".$this->link."page=1\" title=\"«·’›Õ… «·√Ê·Ï\">&laquo;</a>]&nbsp;&nbsp;&nbsp;\n";
            }

            // ·⁄—÷ “— «·”«»ﬁ
            if ($prev == 1 && $this->page > 1){
            	$page_prev = $this->page-1;
            	print "[<a href=\"?".$this->link."page=".$page_prev."\" title=\"«·’›Õ… «·”«»ﬁ…\">&lt;</a>]&nbsp;&nbsp;&nbsp;\n";
            }

            if ($mode == 1){
            	// · ÕœÌœ »œ«Ì… «· ﬂ—«—
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

                // · ÕœÌœ ‰Â«Ì… «· ﬂ—«—
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

	            // ⁄„·  ﬂ—«— ·⁄œ «·’›Õ« 
    	        for ($i=$this->minpage ; $i<=$this->maxpage ; $i++){

            	    if ($this->page == $i && $this->page == 1){

	                	// ›Ï Õ«·… √‰Â« ÂÏ «·’›Õ… «·Õ«·Ì…
	                	print "[".$i."].. \n";
    	            }elseif ($this->page == $i && $this->page <> 1 && $this->page <> $this->pages){

	    	            // ›Ï Õ«·… √‰Â« ÂÏ «·’›Õ… «·Õ«·Ì…
            	    	print "..[".$i."].. \n";
                	}elseif ($this->page == $i && $this->page == $this->pages){

	                	// ›Ï Õ«·… √‰Â« ÂÏ «·’›Õ… «·Õ«·Ì…
	                	print "..[".$i."]\n";
    	            }else{
        	        	print "<a href=\"?".$this->link."page=".$i."\">[".$i."]</a> \n";
            	    }
	            }
            }else{
            	// ⁄„·  ﬂ—«— ·⁄œ «·’›Õ« 
    	        for ($i=1 ; $i<=$this->pages ; $i++){

            	    if ($this->page == $i && $this->page == 1){

	                	// ›Ï Õ«·… √‰Â« ÂÏ «·’›Õ… «·Õ«·Ì…
	                	print "[".$i."].. \n";
    	            }elseif ($this->page == $i && $this->page <> 1 && $this->page <> $this->pages){

	    	            // ›Ï Õ«·… √‰Â« ÂÏ «·’›Õ… «·Õ«·Ì…
            	    	print "..[".$i."].. \n";
                	}elseif ($this->page == $i && $this->page == $this->pages){

	                	// ›Ï Õ«·… √‰Â« ÂÏ «·’›Õ… «·Õ«·Ì…
	                	print "..[".$i."]\n";
    	            }else{
        	        	print "<a href=\"?".$this->link."page=".$i."\">[".$i."]</a> \n";
            	    }
	            }
            }

            // ·⁄—÷ “— «· «·Ï
            if ($next == 1 && $this->page < $this->pages){
            	$page_next = $this->page+1;
            	print "&nbsp;&nbsp;&nbsp;[<a href=\"?".$this->link."page=".$page_next."\" title=\"«·’›Õ… «· «·Ì…\">&gt;</a>]\n";
            }

            // ·⁄—÷ “— √Œ— ’›Õ…
            if ($end == 1 && $this->page < $this->pages){
            	print "&nbsp;&nbsp;&nbsp;[<a href=\"?".$this->link."page=".$this->pages."\" title=\"«·’›Õ… «·√ŒÌ—…\">&raquo;</a>]\n";
            }
        	// ÕﬁÊﬁ «·»—„Ã…
            print "\n<!-- ‰Â«Ì…  ⁄œ«œ «·’›Õ«  1.0 „‰ »—„Ã… Õ«“„ Œ«·œ 13-5-2005 -->\n";
        }

    }
}
?>
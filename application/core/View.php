<?php

class View
{  
    function generate($contentView, $data = null, $template = 'TemplateView.php')
    {       
        include 'application/views/' . $template;
    }

    function pagination($total, $perPage, $currentPage, $url = '')
    {
    	if ( ! intval($currentPage))
    	{
    		$currentPage = 1;
    	}

	    $numberOfPages = ceil($total / $perPage);

	    if ($numberOfPages == 1) return '<div class="wrapPaging"><span>1</span></div>';

	    if ($currentPage > $numberOfPages) 
	    {
	    	$currentPage = 1;
	    }

	    $start = $currentPage;
	    $end = $currentPage;
	    while ($pages <= 5) 
	    {
	    	if ((($start - 1) >= 1) && (($start - 1) >= ($currentPage - 4)))
	    	{
	    		$start -= 1;
	    	}

	    	if ((($end + 1) <= $numberOfPages) && (($end + 1) <= ($currentPage + 4)))
	    	{
	    		$end += 1;
	    	}

	    	$pages++;
	    }

	    $output = '<span class="ways">';

	    if  ($currentPage != 1)
	    {
	        $output .= '<i>←</i><a href="'.$url.($currentPage - 1).'">Предыдущая</a>';
	    }

	    if ($currentPage < $numberOfPages)
	    {
	        $output .= '<a href="'.$url.($currentPage + 1).'">Следующая</a><i>→</i>';
	    }

	    $output .= '</span><br/>';

	    if  ($currentPage > 4)
	    {
	        $output .= '<a href="'.$url."1".'" title="Первая">←</a>';
	    }

	    for ($page = $start; $page <= $end; $page++)
	    {
            if ($page == $currentPage)
            {
               $output .= '<span>'.$page.'</span>'; 
            }
            else
            {
               $output .= '<a href="'.$url.$page.'">'.$page.'</a>';
            }
	    }

	    if (($currentPage + 4) < $numberOfPages)
	    {
	        $output .= '<a href="'.$url.$numberOfPages.'" title="Последняя">→</a>';
	    }

	    return '<div class="wrapPaging">'.$output.'</div>';
	}
}
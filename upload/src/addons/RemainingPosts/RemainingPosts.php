<?php

namespace RemainingPosts;

class RemainingPosts
{
    public static function getRemainingPosts()
    {
  
  		$params = func_get_arg(1);
  		$page = $params[0];
  		$perPage = $params[1];
  		$total = $params[2];
  		$uri = $params[3];
  		
  		$pagepos = strrpos($uri, "page-");
  		if(FALSE !== $pagepos) {
  			$uri = substr($uri, 0, $pagepos);
  		}
  
  //echo \XF::dump($uri);
  		
			if(empty($page)) {
				$page = 1;
			}
        if ($total > $perPage)
        {
            $totalPages = ceil($total / $perPage);

            if ($page < $totalPages)
            {
                $remaining = $total - ($page * $perPage);
                $html = '<div class="postsRemaining"><a href="'.$uri.'page-'. ($page+1) .'">' . $remaining . ' More Post' . ( $remaining > 1 ? 's' : '' ) . '...</a></div>';

                echo $html;
            }
        }
    }
}

<?php
$pages = App\Comment::where('product_id', '1')->paginate(5);
$start = 1;
$last = $pages->lastPage();
dd($pages->getUrlRange($start, $last));
?>

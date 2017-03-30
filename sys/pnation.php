<?php
//current page
if ( isset($_GET['page']) ) {
    $page = (int)$_GET['page'];
    if ( $page < 1 ) $page = 1;
} else {
    $page = 1;
}
$listId = $_GET['listId'];
$ipp = $_SESSION['ipp'];
//all page count
$stages = 3;
$count_sql = "SELECT * FROM `tasks` WHERE `listId` = '$listId'";
$c_q = $db->query($count_sql);
// $c_q = mysqli_query($db,$count_sql);
$total_pages = $c_q->rowCount();
$lastPage = ceil($total_pages / $ipp);
$total_pages = $lastPage;
if($page && $page > 1){
    $start = ($page - 1) * $ipp;
    $_SESSION['start'] = $start;
} else {
    $start = 0;
    $_SESSION['start'] = $start;
}
if ($page == 0) $page = 1;
$prev = $page - 1;
$next = $page + 1;
$preLastPage = $lastPage - 1;
$paginate = '';
if ($lastPage > 1) {
  $paginate .= '<nav aria-label="Page navigation"><ul class="pagination">';
  // Previous
  if ($page > 1){
     $paginate.= "<li><a href='?page=$prev&listId=$listId'  aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
  }else{
     $paginate.= '<li class="disabled"><span aria-hidden="true">&laquo;</span></li>';
  }
// Pages 
  if ($lastPage < 7 + ($stages * 2))  // Not enough pages to breaking it up
  {  
     for ($counter = 1; $counter <= $lastPage; $counter++)
     {
        if ($counter == $page){
           $paginate.= "<li class='active'>
           <a href='#'>$counter <span class='sr-only'>(current)</span></a></li>";
        }else{
           $paginate.= "<li><a href='?page=$counter&listId=$listId'>$counter</a></li>";}              
     }
  }
  elseif($lastPage > 5 + ($stages * 2))  // Enough pages to hide a few?
  {
     // Beginning only hide later pages
     if($page < 1 + ($stages * 2))    
     {
        for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
        {
           if ($counter == $page){
              $paginate.= "<span class='current'>$counter</span>";
           }else{
              $paginate.= "<a href='?page=$counter&listId=$listId'>$counter</a>";}              
        }
        $paginate.= "...";
        $paginate.= "<a href='?page=$preLastPage&listId=$listId'>$preLastPage</a>";
        $paginate.= "<a href='?page=$lastPage&listId=$listId'>$lastPage</a>";    
     }
     // Middle hide some front and some back
     elseif($lastPage - ($stages * 2) > $page && $page > ($stages * 2))
     {
        $paginate.= "<a href='?page=1&listId=$listId'>1</a>";
        $paginate.= "<a href='?page=2&listId=$listId'>2</a>";
        $paginate.= "...";
        for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
        {
           if ($counter == $page){
              $paginate.= "<span class='current'>$counter</span>";
           }else{
              $paginate.= "<a href='?page=$counter&listId=$listId'>$counter</a>";}              
        }
        $paginate.= "...";
        $paginate.= "<a href='?page=$preLastPage&listId=$listId'>$preLastPage</a>";
        $paginate.= "<a href='?page=$lastPage&listId=$listId'>$lastPage</a>";    
     }
     // End only hide early pages
     else
     {
        $paginate.= "<a href='?page=1&listId=$listId'>1</a>";
        $paginate.= "<a href='?page=2&listId=$listId'>2</a>";
        $paginate.= "...";
        for ($counter = $lastPage - (2 + ($stages * 2)); $counter <= $lastPage; $counter++)
        {
           if ($counter == $page){
              $paginate.= "<span class='current'>$counter</span>";
           }else{
              $paginate.= "<a href='?page=$counter&listId=$listId'>$counter</a>";}              
        }
     }
  }
        // Next
  if ($page < $counter - 1){ 
     $paginate.= "<li><a href='?page=$next&listId=$listId'><span aria-hidden='true'>&raquo;</span></a></li>";
  }else{
     $paginate.= '<li class="disabled"><span aria-hidden="true">&raquo;</span></li>';
     }
     
  $paginate.= "</ul></nav>";   
}
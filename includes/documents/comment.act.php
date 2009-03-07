<?php
  if(isset($_POST['c_element_id']))
  {
    $c  = CComment::getInstance();
    
    $userId     = intval($_USER_ID);
    $element_id = $_POST['c_element_id'];
    $comment    = $_POST['c_comment'];
    $type       = $_POST['c_type'];
    $for_user_id= $_POST['c_for_u_id'];
    
    $comment_id = $c->addComment($element_id, $userId, $for_user_id, $comment, $type);
    
    if($type == 'blog')
    {
      $b =& CBlog::getInstance();
      $b->incrementComment($element_id);
    }
    
    $url = $_POST['redirect'] . '#comment' . $comment_id;
  }
  else 
  {
    $url = $_POST['redirect'];
  }
?>
<?php 
    class CommentController{
        public $comment;
        public $data = [];

        public function __construct(){
            $this->comment = new CommentModel();
        }   
        public function RenderComment($data){
            require_once('views/Comment/comment.php');
        }

        public function Comment(){
            $this->data['comment_info'] = $this->comment->getComments();

            $this->RenderComment($this->data);
        }
    }
?>
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
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                 
                $kq = $this->comment->deleteComment($id);
                header('Location: index.php?page=comment');
            }
        }

        public function delete() {
            if (isset($_GET['comment_id'])) {
                $comment_id = $_GET['comment_id'];
                
        
                $result = $this->comment->deleteComment($comment_id);
        
                if ($result) {
                    header('Location: index.php?page=comment');
                    exit;
                } else {
                    echo "Không thể xóa bình luận!";
                }
            } else {
                echo "Không tìm thấy ID bình luận để xóa.";
            }

            
        }
        
        
        
        
        
    }
?>
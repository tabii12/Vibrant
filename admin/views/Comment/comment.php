
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="views/Comment/comment.css">
<body>
<div class="title_container">
    <h1>BÌNH LUẬN</h1>
    </div>
    <div class="comments-container">
        <ul class="tabs">
            <li class="active">Tất cả bình luận</li>
            <li>Bình luận mới nhất</li>
            <li>Bình luận chưa phản hồi</li>
            <li>Bình luận đã phản hồi</li>
        </ul>
        <table class="comments-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ngày</th>
                    <th>Nội Dung</th>       
                    <th>Đánh Giá</th>
                </tr>
            </thead>
            <tbody>
    <?php
        foreach($data['comment_info'] as $comment){
            $comment_id = $comment['comment_id'];
            echo'
                <tr>
                    <td>'.$comment['comment_id'].'</td>
                    <td>'.$comment['user_name'].'</td>
                    <td>'.$comment['comment_date'].'</td>
                    <td>'.$comment['comment_content'].'</td>
                    <td>
                        <span class="stars">';
                            $rating = $comment['rating'];
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo "★";
                                } else {
                                    echo "☆"; 
                                }
                            }
                            echo'
                        </span>
                    </td>
                    <td>
                        <form action="index.php?page=comment" method="POST">
                            <input type="hidden" name="id" value="'.$comment['comment_id'].'">
                            
                            <button class="delete-btn" name="submit">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>


                    </td>
                </tr>   
            ';
        }
    ?>
</tbody>

        </table>
    </div>
</body>
<pre>
    <?php #print_r($data['comment_info']) ?>
</pre>




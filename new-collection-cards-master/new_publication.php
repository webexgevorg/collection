<?php
    include "config/con1.php";
    include "header.php";
    include "check_new_publication.php";
    echo $_SESSION['user'];
    
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <div id="news" style="border:1px solid red">
                    
                       
                       <?php foreach ($posts as $row): ?>
                           
                                <div class='mx-2 news_item' style="border:1px solid blue">
                                    <div class='d-flex justify-content-between p-2'>
                                        <div class='d-flex flex-wrap'>
                                            <h5 class='public_color'><?= $row['title'] ?></h5>
                                            <h5 class='mx-3'><?= date('d M Y',strtotime($row['published_date'])) ?></h5>
                                        </div>
                                        <span class='animate_x'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'>
                                        <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                                            </svg>
                                        </span>
                                    </div> 
                                    <div class='p-2 block-ellipsis'>
                                        <p><?= $row['titledescription'] ?></p> 
                                        <div class='d-flex justify-content-end align-items-center font-weight'>
                                            <img class='pl-3' src='image_publication/hot.png'>
                                           
                                              <i <?php  if (userLiked($row['id'])): ?>
                                                class="fas fa-thumbs-up like-btn"
                                            <?php else: ?>
                                                class="far fa-thumbs-up like-btn"
                                            <?php endif ?>
                                            
                                            data-id='<?=  $row['id'] ?>'></i>
                                            
                                            
                                            <span class="likes"><?php echo getLikes($row['id']); ?></span>
                                            
                                            &nbsp;&nbsp;
                                            <i 
                                            <?php  if (userDisliked($row['id'])): ?>
                                                class="fas fa-thumbs-down dislike-btn"
                                            <?php else: ?>
                                                class="far fa-thumbs-down dislike-btn"
                                            <?php endif ?>
                                            
                                             data-id='<?= $row['id'] ?>'></i>
                                            <span class='likes'>
                                            <?php echo getDislikes($row['id']); ?>
                                            </span>
                                             <span class='pl-3'><b>134</b></span>
                                             <img class='pl-3' src='image_publication/view.png'>
                                            </div>
                                        </div>
                                    </div>   
                        <?php endforeach ?>
                </div>
                <?php
include "footer.php";
?>

    <script>
    $('.like-btn').on('click',function(){
            var post_id=$(this).data('id');
            $clicked_btn=$(this);
      
            if($clicked_btn.hasClass('far fa-thumbs-up')){
                action='like';
            }else if($clicked_btn.hasClass('fas fa-thumbs-up')){
                action='unlike';
            }
             $.ajax({
            url:'new_publication.php',
            type:'post',
            data:{
                'action':action,'post_id':post_id
            },
            success:function(data){
                 console.log(data)

                res = JSON.parse(data);
              console.log(res)
                if(action=='like'){
                    $clicked_btn.removeClass('far fa-thumbs-up');
                    $clicked_btn.addClass('fas fa-thumbs-up');
                }else if(action=='unlike'){
                    $clicked_btn.removeClass('fas fa-thumbs-up');
                    $clicked_btn.addClass('far fa-thumbs-up');
                }
                
                // // display number  of likes and dislikes
                $clicked_btn.siblings('span.likes').text(res.likes)
                $clicked_btn.siblings('span.dislikes').text(res.dislikes)
                // $('#news').html(data)
                $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
            }
        })
    })
// if the user clicks on the dislike button ...

    $('.dislike-btn').on('click',function(){
            var post_id=$(this).data('id');
            $clicked_btn=$(this);
      
            if($clicked_btn.hasClass('far fa-thumbs-down')){
                action='dislike';
               
            }else if($clicked_btn.hasClass('fas fa-thumbs-down')){
                action='undislike';
            }
            
             $.ajax({
            url:'new_publication.php',
            type:'post',
            data:{
                'action':action,'post_id':post_id
            },
            success:function(data){
                 console.log(data)

                res = JSON.parse(data);
              console.log(res)
                if(action=='dislike'){
                    $clicked_btn.removeClass('far fa-thumbs-down');
                    $clicked_btn.addClass('fas fa-thumbs-down');
                }else if(action=='undislike'){
                    $clicked_btn.removeClass('fas fa-thumbs-down');
                    $clicked_btn.addClass('far fa-thumbs-down');
                }
                
                // // display number  of likes and dislikes
                $clicked_btn.siblings('span.likes').text(res.likes)
                $clicked_btn.siblings('span.dislikes').text(res.dislikes)
                // $('#news').html(data)
                $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
            }
        })
    })
    

    </script>
<?php 
    session_start();
    include '../../../auth/dbConfig.php';
    include '../../../../components/header.php';
    include '../../../../components/navigation.php'; 

    $pendingComment = $conn->prepare('SELECT 
    c.id,
    c.comment,
    -- c.fk_userBlog
    u.username,
    b.id,
    b.title,
    b.blog_content,
    b.img_path,
    b.show_name

   FROM comments c 

   LEFT JOIN userblog ub on c.fk_userBlog = ub.id 
   LEFT JOIN users u on ub.fk_user_id = u.id 
   LEFT JOIN blog b on ub.fk_blog_id = b.id 

    WHERE pending = 1
   
  ');
$pendingComment->execute();
$pendingComment->store_result();
$pendingComment->bind_result($commentID, $commentDetails, $username, $bID, $blogTitle, $blogContent, $blogImg, $showName);

?>
<section class="py-10 bg-gray-100">
    <h1 style="text-align: center;">All blogs with pending comments</h1>
    <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <?php if ($pendingComment->num_rows == 0): ?>
        <h3>There are no comments pending</h3>

                <?php else: ?>

    <?php while ($pendingComment->fetch()): ?>
        
            <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    <img src="<?= ROOT_DIR ?>assets/images/shows/<?= $blogImg ?>" alt="<?= $showName ?>" />
                </div>
                <div class="mt-1 p-2">
                    <h2 class="text-slate-700"><?= $blogTitle ?></h2>
                    <p class="mt-1 text-sm text-slate-400 blog-content">
                    <?= $blogContent ?>
                    </p>
                    <div class="mt-3 flex items-end justify-between">
                        <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                        
                            <button onclick="window.location.href='pending.php?blog_id=<?= $bID ?>';" class="text-sm">View Pending Comments</button>

                        </div>
                    </div>
                </div>
    
            </article>
            

            <?php endwhile ?>
            <?php endif ?>    


    </div>
</section>



<?php 
  
    include '../../../../components/footer.php'; 
?>
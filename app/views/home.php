<?php /** @var App\Entity\User $user */ ?>


<?php
/** @var App\Entity\Post[] $posts['post'] */
/** @var App\Entity\Comment[] $comment */
?>
<div id="container">

    <!--this id/container is the entire form container.So targeting this in css will mean targeting the entire form-->

    <div class="form-wrap">
        <!--this form-wrap tagets the content of the form.Hence the css targest like form-wrap form-group label input-->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
            <!--use this form tag to create components/elements of a form in html-->
            <form method="POST" enctype="multipart/form-data">

                <!--create a div for each form component/element-->
                <div class="form-group">
                    <label for="firstname">Titre</label>
                    <input type="text" name="title">

                </div>



                <div class="form-group-image">
                    <a class="dwd-image" href=""></a>
                    <input type="file" name="image">

                </div>

                <div class="form-group">
                    <label for="password">Message</label>
                    <input type="text" name="content" placeholder="Ecrire un message...">

                </div>



                <button type="submit" class="btn">Envoyer</button>


            </form>
        </div>
    </div>

</div>
<div class="flex-wrap">

    <?php
    foreach ($posts as $key => $post): ?>

        <div class="item-con">
            <div class="item">
                <span class='tag'>Blog</span>
                <figure>
                    <img src="upload/<?= $post->getImage() ?>"/>
                </figure>
                <div class="this-meta">
                    <a href="post/<?=$post->getId()?>">
                        <h2><?=$post->getTitle();?></h2>
                    </a>
                    <div class="b-con">
                        <div class='flex'>
                            <div class="bc-item author">
                                <i class="bi bi-person"></i>
                                <a href="localhost:5656/post/<?=$post->getId()?>">
                                    <span class='author-name'><?=$post->getCreated_At();?></span>
                                </a>
                            </div>
                            <div class="bc-item put-stamp">
                                <i class="bi bi-clock"></i>
                                <span class='put-stamp'><?=$post->getRelationship()->getUsername();?></span>
                                <button class="ajt_comment">+</button>
                            </div>
                        </div>
                        <div class="bc-item share-post">
                            <i class="bi bi-reply"></i>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    <?php endforeach; ?>
</div>

<?php /** @var App\Entity\User $user */ ?>


<?php
/** @var App\Entity\Post[] $posts['post'] */
/** @var App\Entity\Comment[] $comment */
?>
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
                        </div>
                    </div>
                    <div class="bc-item share-post">
                        <i class="bi bi-reply"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div><?php //var_dump($post->getRelationship()); die;?></div>
<?php endforeach; ?>
    </div>

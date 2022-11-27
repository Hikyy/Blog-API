<?php /** @var App\Entity\User $user */ ?>
<h1><?= $trucs; ?></h1>

<?php
/** @var App\Entity\Post[] $posts['post'] */
/** @var App\Entity\Comment[] $comment */

foreach ($posts as $key => $post): ?>

    <div><?=$post['post']->getTitle();?></div>
    <div><?=$post['post']->getContent();?></div>
    <div>
        <?php foreach ($post['comment'] as $comment):?>
            <?php if(isset($comment)):?>
               <p><?= $comment->getResponse();?></p>
            <?php endif;?>
        <?php endforeach;?>
    </div><br>
     <div><?=$post['post']->getCreated_At();?></div>
    <form method="post">
        <input type="text" name="response"/>
        <input type="text" style="display: none" name="post_id" value="<?=$post['post']->getId()?>"/>
        <button type="submit">Goo</button>
    </form>
<?php endforeach; ?>


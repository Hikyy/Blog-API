

<style>
    .content .poster{
        background: center no-repeat url(<?=$image?>);
    }
</style>
<?php /** @var App\Entity\Post $post */
/** @var App\Entity\Comment $comment */
?>
<form action="update/<?= $post->getId() ?>" method="POST" class="form is_active" enctype="multipart/form-data">
    <div class="container_page">
        <div class="left">
            <div class="login">Mise à jour</div>
            <div class="eula">mettez à jour votre ancien <posts>post</posts> en un seul clic</div>
        </div>
        <div class="right">
            <svg viewBox="0 0 320 300">
                <defs>
                    <linearGradient
                            inkscape:collect="always"
                            id="linearGradient"
                            x1="13"
                            y1="193.49992"
                            x2="307"
                            y2="193.49992"
                            gradientUnits="userSpaceOnUse">
                        <stop
                                style="stop-color:#ff00ff;"
                                offset="0"
                                id="stop876" />
                        <stop
                                style="stop-color:#ff0000;"
                                offset="1"
                                id="stop878" />
                    </linearGradient>
                </defs>
                <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
            </svg>
            <div class="form_login">
                <form method="post">
                    <label for="text">Nom</label>
                    <input type="text" name="title"id="email">
                    <label for="text">Contenue</label>
                    <textarea name="content" id="password" style="height: 48px;" rows="6"> </textarea>
                    <input type="file" name="image" id="password">

                    <button type="submit" >Send</button>
                </form>
            </div>
        </div>
    </div>
</form>


<div class="wrapper">
    <div class="scroll-indicator"></div>
    <div class="content-wrapper">
        <div class="content">
            <div class="poster">
                <div class="poster-title">
                    <h1> <?= $post->getTitle();?> </h1>


                </div>
                <div class="poster-buttons">
                    <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
                    <div class="showformbtn"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></div>
                    <a href="/delete/post/<?= $post->getId() ?>"><div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" width="24px" height="24px">
                                <g id="surface15702676">
                                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 12 2 C 6.488281 2 2 6.488281 2 12 C 2 17.511719 6.488281 22 12 22 C 17.511719 22 22 17.511719 22 12 C 22 6.488281 17.511719 2 12 2 Z M 12 4 C 16.429688 4 20 7.570312 20 12 C 20 16.429688 16.429688 20 12 20 C 7.570312 20 4 16.429688 4 12 C 4 7.570312 7.570312 4 12 4 Z M 8.707031 7.292969 L 7.292969 8.707031 L 10.585938 12 L 7.292969 15.292969 L 8.707031 16.707031 L 12 13.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13.414062 12 L 16.707031 8.707031 L 15.292969 7.292969 L 12 10.585938 Z M 8.707031 7.292969 "/>
                                </g>
                            </svg></div></a>
            </div>
        </div>
        <div class="info">
            <div class="block published">
                <div class="mini-title">Published</div>
                <?php $date = new DateTime($post->getCreated_At()); echo $date->format("Y-m-d");?>
            </div>
            <div class="block published">
                <div class="mini-title">Views</div>
                3 251
            </div>
            <div class="block published">
                <div class="mini-title">Likes</div>
                156
            </div>
            <div class="block published">
                <div class="mini-title">Reading</div>
                12 min
            </div>
        </div>
        <div class="words">
            <p>
                <font class="letter">L</font>
                <?= $post->getContent(); ?>
            </p>

            <div class="buttons">
                <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
                <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></div>
            </div>
        </div>
        <div class="words">
            <div class="buttons">
                <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
                <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></div>
            </div>
        </div>
        <div class="author">
            <div class="image"><div class="flexou">
                    <a href="/delete/post/<?= $post->getId() ?>"><img class="img" src="https://img.icons8.com/material-rounded/512/delete-forever.png" alt=""></a>
                </div></div>
        </div>
    </div>
</div>
<div class="footer">
    <?php if($user != null): ?>
        <div class="app container py-4">
            <div class="col-md-10 col-lg-8 m-auto">
                <div class="bg-white rounded-3 shadow-sm p-4 mb-4">

                    <div class="d-flex">

                        <form method="POST" class="flex-grow-1">
                            <div class="hstack gap-2 mb-1">
                                <h2 class="author"><?= $user->getUsername() ?></h2>
                            </div>
                            <div class="form-floating mb-3">

                     <textarea class="form-control w-100"
                               name="response"
                               placeholder="Leave a comment here"
                               id="my-comment"
                               style="height:7rem;"></textarea>

                            </div>
                            <div class="hstack justify-content-end gap-2">
                                <button class="btn btn-sm btn-link link-secondary text-uppercase">cancel</button>
                                <button type="submit" name=""  class="btn btn-sm btn-primary text-uppercase">comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    <?php endif;?>
    <?php foreach ($comments as $comment) :?>

        <div  class="app container py-4">
            <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
                <div class="d-flex comment ">
                    <img class="rounded-circle comment-img"
                         style="margin-right:20px ;"
                         src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" />
                    <div class="flex-grow-1 ms-3">
                        <div class="mb-1"><a href="#" class="fw-bold link-dark me-1"><?= $comment->getRelationship()->getUsername() ?></a> <span class="text-muted text-nowrap"><?= (new DateTime($comment->getCreated_at()))->format('Y-m-d')?></span></div>
                        <div class="mb-2">
                            <p>
                                <?= $comment->getResponse() ?>
                            </p>
                        </div>
                        <div class="hstack align-items-center mb-2">

                            <a class="link-danger small ms-3" href="/delete/<?=$post->getId()?>/comment/<?= $comment->getId() ?>">DELETE</a>
                        </div>

                        </a>
                    </div>
                </div>
            </div>
        </div >
    <?php endforeach;?>

</div>
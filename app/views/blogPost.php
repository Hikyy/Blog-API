<style>
    .content .poster{
        background: center no-repeat url(<?=$image?>);
    }
</style>
<?php /** @var App\Entity\Post $post */ ?>

<form action="update/<?= $post->getId() ?>" method="POST" class="form is_active" enctype="multipart/form-data">
    <div class="container_page">
        <div class="left">
            <div class="login">Mise à jour</div>
            <div class="eula">mettez à jour vos anciens  <posts></posts> en un seul click</div>
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
                    <textarea name="content" id="password" rows="6"> </textarea>
                    <input type="file" name="image" id="password">
                    <input type="submit" id="submit" value="Connexion">
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
                    <div class="line"></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus voluptate, laboriosam sunt eveniet eius iure, sapiente in maiores quasi saepe quas quisquam obcaecati odio </p>
                </div>
                <div class="poster-buttons">
                    <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
                    <div class="showformbtn"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></div>
                    <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></div>
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
            <?php foreach ($comments as $comment): ?>
            <?php if($comment != null): ?>
            <div class="quote">
                <p> <font class="letter">“</font>

                        <?= $comment->getResponse(); ?>

                </p>
                <p class="author"><?= $comment->getRelationship()->getUsername() ?></p>
            </div>
            <?php endif; ?>
            <?php endforeach;?>
            <div class="words">
                <div class="buttons">
                    <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
                    <div><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></div>
                </div>
            </div>
            <div class="author">
                <div class="image"></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="content">
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus voluptate, laboriosam sunt eveniet eius iure, sapiente in maiores quasi saepe quas quisquam obcaecati odio exercitationem rerum, molestias aliquid ipsa excepturi laborum quaerat! Tempora necessitatibus</div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus voluptate, laboriosam sunt eveniet eius iure, sapiente in maiores quasi saepe quas quisquam obcaecati odio exercitationem rerum, molestias aliquid ipsa excepturi laborum quaerat! Tempora necessitatibus</div>
        </div>
    </div>
</div>

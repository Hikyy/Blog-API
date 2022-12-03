
<?php /** @var App\Entity\User $users */ ?>
<div class="flex-center">
    <table>
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Is Admin</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $user):?>
        <tr>
            <td><?= $user->getUsername() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getAccess() ?></td>
            <td><a href="delete/admin/user/<?=$user->getId()?>">Delete User</a></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
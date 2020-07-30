<a href="index.php?page=add-note-type">Add Note Type</a>
<br>
<a href="index.php?page=list-note">View all note</a>
<table>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Xử lí</th>
    </tr>

    <?php foreach($noteTypes as $key=>$type): ?>
        <tr>
            <td><?php echo $type->getId(); ?></td>
            <td><?php echo $type->getName()?></td>
            <td><?php echo $type->getDescription()?></td>
            <td>
                <a href="index.php?page=edit-note-type&id=<?php echo $type->getId() ?>">Edit</a>
                <a href="index.php?page=del-note-type&id=<?php echo $type->getId() ?>">Del</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
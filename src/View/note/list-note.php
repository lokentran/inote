<a href="index.php?page=add-note">Add</a>
<table>
    <tr>
        <th>STT</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Phân loại</th>
    </tr>
    <?php if(empty($notes)): ?>
        <h1>No Data</h1> 
    <?php else: ?>

    <?php foreach($notes as $key=>$note): ?>

        <tr>
            <td><?php echo ++$key?></td>
            <td><?php echo $note['items']->getTitle() ?></td>
            <td><?php echo $note['items']->getContent() ?></td>
            <td><?php echo $note['name-work'] ?></td>
            <td>
                <a href="index.php?page=edit-note&id=<?php echo $note['items']->getId() ?>">Edit Note</a>
                <a href="index.php?page=del-note&id=<?php echo $note['items']->getId() ?> ">Del Note</a>
            </td>
        </tr>
    <?php endforeach ?>
    <?php endif;?>
        
</table>
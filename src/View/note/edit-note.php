<form action="" method="post" >
    <input type="text" name="title" value="<?php echo $note['title'] ?>">
    <input type="text" name="content" value="<?php echo $note['content'] ?>">
    <select name="note_id" id="">
        <?php foreach($noteTypes as $key => $noteType):?>
            <option <?php if($note['type_id'] == $noteType->getId()){echo " ";} ?> value="<?php echo $noteType->getId()?>"><?php echo $noteType->getName()?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" name="sbm" value="Edit Note">
</form>
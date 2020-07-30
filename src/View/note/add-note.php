<form action="" method="post" >
    <fieldset>
        <legend>Add Note</legend>
        <p>Title</p> <input type="text" name="title" placeholder="title" >

        <p>Content</p>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
      
        <p>Phân loại</p> 
        <select name="type_id" id="">
            <?php foreach($noteTypes as $key => $noteType): ?>
                <option value="<?php echo $noteType->getId()?>"><?php echo $noteType->getName()?></option>
            <?php endforeach;?>
        </select>
        <p></p>
        <input type="submit" name="sbm" value="Add work">
    </fieldset>
</form>


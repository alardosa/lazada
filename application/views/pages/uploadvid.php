<!DOCTYPE>
<html>

<head></head>
<form class="cssform" name="property" id="property" method="POST" action="<?php echo site_url('upload')?>"  enctype="multipart/form-data" >
    <table>
    <tr>
        <td>Select Video :</td>
        <td><input type="file" id="video" name="video" ></td>
    </tr>
    <tr>
        <td> <input type="submit" id="button" name="submit" value="Submit" /></td>
    </tr>
</table>
</form>
</html>
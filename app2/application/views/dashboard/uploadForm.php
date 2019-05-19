<div style="float:none">
    <h2><?php if(isset($message)){
    echo $message;}?></h2>
</div>

<?php echo form_open_multipart('CsvImport/doImport');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

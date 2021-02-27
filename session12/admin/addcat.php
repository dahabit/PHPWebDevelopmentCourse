<?php include_once ("includes/header.php"); ?>

<?php 
if(isset($_POST['submit'])){
	print_r($_POST);
}else{
?>
<div id="box">
                	<h3 id="adduser">إضافة قسم جديد</h3>
                    <form id="form" action="" method="post">
                      <fieldset id="personal">
                        <legend>بيانات القسم</legend>
                        <label for="catname">الإسم : </label> 
                        <input name="catname" id="catname" type="text" tabindex="1" />
                        <br />
                        <label for="catdesc"> الوصف</label>
                        <textarea name="catdesc" rows="5" cols="10"></textarea>
                       
                        <br />
                        <label for="imagepath">مسار الصورة </label>
                        <input name="imagepath" id="imagepath" type="text" 
                        tabindex="2" size="50" />
<br />
		<label for="active">مفعلة :</label>

		<label for="yes"> :نعم <input type="radio" name="active" value="1">
		 لا: <input type="radio" name="active"  value="0"></label>

                      </fieldset>
                    
                      <div align="center">
                      <input id="button1" type="submit" name="submit" value="أضف القسم" /> 
                      <input id="button2" type="reset" />
                      </div>
                    </form>
					</div>
					
<?php }?>
<?php include_once ("includes/footer.php"); ?>
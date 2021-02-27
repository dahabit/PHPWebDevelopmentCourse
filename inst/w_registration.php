<? include_once("includes/header.php");


 ?>
<br>

<?if (isset($_POST['w_login'])){

$alldata=$_POST ;
//print_r ($alldata) ;
echo "<br>" ;

//echo $alldata[worker_login];
//print_r ($alldata) ;


$sql = "INSERT INTO workers
			  ( w_id,w_login,w_password,w_email,w_name,w_gender,w_family_status,w_live_city,w_tell, w_mobile,
  w_drive_linc,w_have_car,w_college_city,w_tall,w_weight,w_age,w_work_exp,w_college, w_college_country,
  w_degree,w_work_spec,w_grad_date, w_degree_desc, w_more_info) 
			  		VALUES
					 ( '$alldata[w_id]','$alldata[worker_login]','$alldata[w_password]','$alldata[w_email]','$alldata[w_name]','$alldata[w_gender]',
					 '$alldata[w_family_status]','$alldata[w_live_city]','$alldata[w_tell]','$alldata[w_mobile]',
					 '$alldata[w_drive_linc]','$alldata[w_have_car]','$alldata[w_college_city]','$alldata[w_tall]','$alldata[w_weight]',
					 '$alldata[w_age]','$alldata[w_work_exp]','$alldata[w_college]','$alldata[w_college_country]',
                     '$alldata[w_degree]','$alldata[w_work_spec]','$alldata[w_grad_date]','$alldata[w_degree_desc]','$alldata[w_more_info]')"; 
  
			  		 
			
					 $result = $db->query($sql);
	
if (!$db->isError()) {
	
echo "<br>";
echo "<br>";
echo "<br>";
	
echo 'تم تسجيل البيانات الخاصة بك بنجاح';
echo "<br>";
echo 'رقم العضوية الخاص بك هو' . $result->insertID();
} else {
echo 'هناك خطأ في عمليه التسجيل من فضلك عد إلي الخلف وأعد ملئ الحقول';
}
	
	
}



else
{
?>

<TABLE  WIDTH=516 HEIGHT=263 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH=516 HEIGHT=100% COLSPAN=6 id="allpages">	
		

<script language="javascript">

function checkReg()
{
      if (document.myForm12.worker_login.value=="")
      {
      alert("من فضلك أدخل إسم المستخدم ");
      document.myForm12.w_login.focus();
      return false;
      }
        
      if (document.myForm12.w_password.value=="")
      {
      alert("من فضلك قم بإدخال الباسورد الخاصة بك ");
      document.myForm12.w_password.focus();
      return false;
      }     
	
      if (document.myForm12.w_password_confirm.value=="")
      {
      alert("من فضلك أدخل الباسورد مرة أخرى");
      document.myForm12.w_password_confirm.focus();
      return false;
      }

      if (document.myForm12.w_email.value=="")
      {
      alert("من فضلك أدخل الإيميل الخاص بك");
      document.myForm12.w_email.focus();
      return false;
      }
	 
	var x = document.myForm12.w_email.value;
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(x)) 
	
	{
	}
	
	else
{
	alert('من فضلك أدخل إيميل بصيغة صحيحة');
	 return false;
	}


      if (document.myForm12.w_name.value=="")
      {
      alert("من فضلك أدخل الإسم الخاص بك");
      document.myForm12.w_name.focus();
      return false;
      }
	  
       if (document.myForm12.w_grad_date.value=="")
      {
      alert("من فضلك قم بإختيار تاريخ التخرج");
      document.myForm12.w_grad_date.focus();
      return false;
      }      

    return true;
}
</script>
<script type="text/javascript">
<!--
function SelectDate()
{
	D = document.getElementById('Date').value;
	if(D){
		D = D.split('/');
	}else{
		Dat = new Date();
		D = new Array(Dat.getDay(), Dat.getMonth(), Dat.getFullYear());
	}
	win = window.open("date-picker.html","win","status=no,scrollbars=no,toolbar=no,menubar=no,height=300,width=300");
	if (parseInt(navigator.appVersion) == 2 && navigator.appName == "Netscape")
		win = window.open("date-picker.html","win","status=yes,height=325,width=250");
		//win'MakeDate',D[2], D[1],D[0], 'SetDate');
		//win.MakeDate(D[2], D[1], D[0]);
}
function SetDate(Day, Month, Year)
{
	document.getElementById('Date').value = Year + '-' + Month + '-' + Day ;
}
//-->
</script>

<center>



<table width="100%" dir="rtl" class="table">
  
  <tr>
<form name="myForm12" action="<? $PHP_SELF ?>" method="POST">
    <td colspan="2" width="100%">
    &nbsp;قم بتعبئة الحقول ذات العلامات المميزة (<font size="3" color="#FF0000">*</font>) 
	، . مع تمنياتنا لك بالتوفيق إن شاء الله وسنسعى جاهدين&nbsp; لتوفير 
	فرصة حصولك على عمل مناسب في أسرع وقت . &nbsp;</td>

  </tr>
  <tr>
    <td colspan="2" width="100%" align="center" bgcolor="#DCDCDC" >    بيانات الدخول</td>
    </tr>
	<tr>
    <td width="28%" align="right" height="20">
    اسم المستخدم :<span lang="en-us">&nbsp; </span>

    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
    <input type="text" name="worker_login"  class="inputbox_long" size="55" ></td>
  </tr>
	<tr>
    <td width="28%"  height="20">
    كلمة المرور :<span lang="en-us">&nbsp; </span>

    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
        <input type="password" name="w_password"  class="inputbox_long" size="55" ></td>
  </tr>
	<tr>
    <td width="28%"  height="20">
    تأكيد كلمة المرور :<span lang="en-us">&nbsp; </span>

    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
    <input type="password" name="w_password_confirm"  class="inputbox_long" size="55" ></td>
    </tr>
  <tr>

    <td width="28%" >
    البريد الالكتروني :<span lang="en-us">&nbsp; </span>
    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
        <input type="text" name="w_email"  class="inputbox_long" size="55" ></td>
  </tr>
  <tr class="gray" >

    <td width="100%" colspan="2" >
    &nbsp;</td>
  </tr>

  <tr class="gray" >

     <td colspan="2" width="100%" align="center" bgcolor="#DCDCDC" >    بيانات شخصية</td>
  </tr>

  <tr class="gray" >

    <td width="28%" >
    الإسم :<span lang="en-us">&nbsp; </span><font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
    <input type="text" name="w_name" class="inputbox_long" size="55"></td>
  </tr>

  <tr class="graydark" >
    <td width="28%" >

    الجنس :</td>
    <td width="71%" height="19" align="right">
  <select size="1" name="w_gender" style="width: 50; height:21">
  <option selected value="male">ذكر</option>
	<option value="female">أنثى</option>

  </select></td>
  </tr>
  <tr class="gray" >

    <td width="28%" >
    الحالة الإجتماعية :</td>

    <td width="71%" height="19" align="right">
  <select size="1" name="w_family_status" style="width: 50; height:21">
  <option selected value="single">أعزب</option>
	<option value="married">متزوج</option>
	<option value="widower">أرمل</option>
	<option value="divorced">مطلق</option>

  </select></td>
  </tr>
  <tr class="gray">
    <td width="28%" >

    &nbsp;المدينة التي تقيم فيها :</td>
    <td width="71%" height="26" align="center">
    <input type="text" name="w_live_city"  class="inputbox_long" size="55"></td>
  </tr>
  <tr class="graydark">

    <td width="28%" >
    الجنسية :<span lang="en-us">&nbsp; </span><font size="3" color="#FF0000">*</font></td>

    <td width="71%" height="18" align="right">
   <select size="1" name="w_nationality" style="border:1px solid #800080; width: 250; height: 20; font-family: MS Sans Serif; font-size: 10pt; background-color: #FFFFFF; color: #000000; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1">
   <option selected>السعودية</option><option>أرمينيا</option><option>
	أسبانيا</option><option>أفغانستان</option><option>
	ألبانيا</option><option>ألمانيا</option><option>
	أورغواي</option><option>أيرلندا</option><option>

	أيسلندا</option><option>إثيوبيا</option><option>
	إريتريا</option><option>إندونيسيا</option><option>
	إيران</option><option>إيطاليا</option><option>
	ازيربيجان</option><option>استراليا</option><option>
	الأرجنتين</option><option>الأردن</option><option>
	الإكوادور</option><option>الإمارات</option><option>
	البحرين</option><option>
	البرازيل</option><option>البرتغال</option><option>
	البوسنةوالهرسك</option><option>التونجو</option><option>

	الجزائر</option><option>
	الدانمارك</option><option>السلفادور</option><option>

	السنغال</option><option>السودان</option><option>السويد</option><option>
	الصحراء الغربية</option><option>الصومال</option><option>
	الصين</option><option>العراق</option><option>الغابون</option><option>
	الفاتيكان</option><option>الكاميرون</option><option>
	الكونغو</option><option>الكويت</option><option>المالديف</option><option>
	المجر</option><option>المغرب</option><option>
	المكسيك</option><option>المملكة المتحدة</option><option>

	النرويج</option><option>النمسا</option><option>
	النيجر</option><option>الهند</option><option>
	الولايات المتحدة</option><option>اليابان</option><option>
	اليمن</option><option>اليونان</option><option>
	انغولا</option><option>اوزبيكستان</option><option>

	اوغندا</option><option>اوكرانيا</option><option>
	ايستونيا</option><option>باراغواي</option><option>
	باكستان</option><option>بروناي دار السلام</option><option>
	بريطانيا العظمى</option><option>بلجيكا</option><option>
	بلغاريا</option><option>بنجلاديش</option><option>

	بنما</option><option>بوتسوانا</option><option>
	بورتوريكو</option><option>بوركينا فاسو</option><option>
	بوروندى</option><option>بولا ندا</option><option>
	بيرو</option><option>بيلاروسيا</option><option>
	بيليز</option><option>بينين</option><option>

	تاجاكستان</option><option>تايلاند</option><option>
	تايوان</option><option>تركمينستان</option><option>
	تركيا</option><option>تشاد</option><option>
	تنزانيا</option><option>تونس</option><option>
	تونس - الحمامات</option><option>تونس - تونس</option><option>

	تونس - سفاقس</option><option>تونس - سوس</option><option>
	تيمورالشرقية</option><option>جامايكا</option><option>
	جزر الباهاماس</option><option>جزر الفليبين</option><option>
	جزر القمر</option><option>جزر سيمان</option><option>
	جمهورية سلوفاكيا</option><option>جمهوريةأفريقياالوسطى</option><option>

	جمهوريةالتشيك</option><option>جمهوريةالدومينيكان</option><option>
	جنوب أفريقيا</option><option>جو رجيا</option><option>
	جواتيمالا</option><option>جيبوتى</option><option>
	رواندا</option><option>روسيا</option><option>
	رومانيا</option><option>زائير</option><option>

	زامبيا</option><option>زيمبابوي</option><option>
	ساحل العاج</option><option>سامواالأمريكية</option><option>
	سان مار</option><option>سريلانكا</option><option>
	سلوفينيا</option><option>سنغافورة</option><option>
	سوازيلاند</option><option>سورية</option><option>سويسرا</option><option>
	سيراليون</option><option>سيشيل</option><option>
	شيلى</option><option>عمان</option><option>
	غامبيا</option><option>غانا</option><option>
	غير ذلك</option><option>فرنسا</option><option>
	فلسطين</option><option>
	فنزويلا</option><option>فنلندا</option><option>
	فيجى</option><option>فييتنام</option><option>
	قبرص</option><option>قطر</option><option>كازاخستان</option><option>

	كرواتيا</option><option>كندا</option><option>
	كوبا</option><option>كوريا الجنوبية</option><option>
	كوريا الشمالية</option><option>كوستاريكا</option><option>
	كولومبيا</option><option>كيرجستان</option><option>
	كينيا</option><option>لاتفيا</option><option>

	لاوس</option><option>لبنان</option><option>
	لوكسمبورج</option><option>ليبريا</option><option>
	ليبيا</option><option>ليتوانيا</option><option>
	ما كاو</option><option>مالطا</option><option>
	مالى</option><option>ماليزيا</option><option>
	مدغشقر</option><option>مصر</option><option>

	مقدونيا</option><option>ملاوي</option><option>
	منغوليا</option><option>موريتانيا</option><option>
	موريشيوس</option><option>موزمبيق</option><option>
	موناكو</option><option>ميانمار</option><option>
	ناميبيا</option><option>نيبال</option><option>

	نيجيريا</option><option>نيكاراجوا</option><option>
	نيو زيلندا</option><option>هاييتي</option><option>
	هندوراس</option><option>هولندا</option><option>
	هونج كونج</option><option>يوغوسلافيا</option></select>    </td>

  </tr>
  <tr class="gray">
    <td>العمر :<span lang="en-us">&nbsp; </span>
    <font size="3" color="#FF0000">*</font></td>
    <td align="right">
  <select size="1" name="w_age" style="width: 68">

  <option>15</option>
  <option>16</option>
  <option>17</option>
  <option>18</option>
  <option>19</option>
  <option>20</option>

  <option>21</option>
  <option>22</option>
  <option>23</option>
  <option>24</option>
  <option>25</option>
  <option>26</option>

  <option>27</option>
  <option>28</option>
  <option>29</option>
  <option>30</option>
  <option>31</option>
  <option>32</option>

  <option>33</option>
  <option>34</option>
  <option>35</option>
  <option>36</option>
  <option>37</option>
  <option>38</option>

  <option>39</option>
  <option>40</option>
  <option>41</option>
  <option>42</option>
  <option>43</option>
  <option>44</option>

  <option>45</option>
  <option>46</option>
  <option>47</option>
  <option>48</option>
  <option>49</option>
  <option>50</option>

  <option>51</option>
  <option>52</option>
  <option>53</option>
  <option>54</option>
  <option>55</option>
  <option>56</option>

  <option>57</option>
  <option>58</option>
  <option>59</option>
  <option>60</option>
  <option>61</option>
  <option>62</option>

  <option>63</option>
  <option>64</option>
  <option>65</option>
  <option>66</option>
  <option>67</option>
  <option>68</option>

  <option>69</option>
  <option>70</option>
  <option>71</option>
  <option>72</option>
  <option>73</option>
  <option>74</option>

  <option>75</option>
  <option>76</option>
  <option>77</option>
  <option>78</option>
  <option>79</option>
  <option>80</option>

  </select>
   </td>
  </tr>
  <tr class="graydark">
   <td width="28%" >
    الهاتف :</td>
    <td width="71%" height="20" align="center">
    <input type="text" name="w_tell"  class="inputbox_long" size="55" ></td>

  </tr>
  <tr class="gray">
    <td width="28%" >
    الهاتف الخلوي (النقال) :</td>
    <td width="71%" height="20" align="center">
        <input type="text" name="w_mobile"  class="inputbox_long" size="55" ></td>
  </tr>
  <tr class="gray" >

    <td width="28%" >
    هل لديك رخصة قيادة :</td>
    <td width="71%" height="19" align="right">
   
   
  <select size="1" name="w_drive_linc" style="width: 68">
  <option selected value="no">لا</option>
	<option value="yes">نعم</option>

  </select></td>
  </tr>
  <tr class="graydark">
    <td width="28%" >

    هل لديك سيارة :</td>
    <td width="71%" height="19" align="right">
      
   
  <select size="1" name="w_have_car" style="width: 68">
  <option selected value="no">لا</option>
	<option value="yes">نعم</option>

  </select></td>
  </tr>
  <tr>
    <td colspan="2" width="100%" align="center" bgcolor="#DCDCDC" >
    يحتوي النموذج التالي على معلومات اخرى عنك</td>

  </tr>
  <tr>
   <td width="28%" >
    الطول<span lang="en-us"> </span>(اكتب الطول بإستخدام - سم ، مثلا 170&nbsp; ) 
	:</td>
    <td width="71%" height="20" align="center">
    <input type="text" name="w_tall"  class="inputbox_long" size="55" ></td>

  </tr>
  <tr>
   <td width="28%" >
    الوزن (اكتب وزنك بإستخدام كيلو جرام&nbsp; ، مثلا 70 ) :</td>
    <td width="71%" height="20" align="center">
    <input type="text" name="w_weight"  class="inputbox_long" size="55" ></td>
  </tr>

  <tr>
   <td width="28%" >
    إجمالي سنوات الخبرة (اكتب عدد سنوات الخبرة او اتركها فارغة اذا لم يوجد ):</td>
    <td width="71%" height="20" align="center">
    <p align="right">
    <select size="1" name="w_work_exp" style="width: 180">
  <option>0</option>

  <option>1</option>

  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>

  <option>7</option>

  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>

  <option>13</option>

  <option>14</option>
  <option>15</option>
  <option>16</option>
  <option>17</option>
  <option>18</option>

  <option>19</option>

  <option>20</option>
  <option>21</option>
  <option>22</option>
  <option>23</option>
  <option>24</option>

  <option>25</option>

  <option>26</option>
  <option>27</option>
  <option>28</option>
  <option>29</option>
  <option>30</option>

  <option>31</option>

  <option>32</option>
  <option>33</option>
  <option>34</option>
  <option>35</option>
  <option>36</option>

  <option>37</option>

  <option>38</option>
  <option>39</option>
  <option>40</option>
  </select></td>
  </tr>

  <tr>
    <td colspan="2" width="100%" align="center" bgcolor="#DCDCDC" >

    يحتوي النموذج التالي على معلومات الوظيفة المطلوبة في سيرتك </td>
  </tr>
  <tr>
    <td colspan="2" width="100%">
    يحتوي الجدول التالي على بيانات المؤهل العلمي المراد إضافته داخل سيرتك 
	الذاتية ، أدخل أعلى مؤهل علمي قمت بالحصول عليه</td>

  </tr>
  <tr class="graydark">
    <td width="28%" >
    إسم المؤسسة التعليمية ( المدرسة ، الجامعة ، المعهد) :<span lang="en-us">&nbsp; </span><font size="3" color="#FF0000">
	*</font></td>

    <td width="71%" height="20" align="center">
    <input type="text" name="w_college"  class="inputbox_long" size="55" ></td>

  </tr>
  <tr class="gray">
    <td width="28%" >
    المدينة&nbsp; :</td>
    <td width="71%" height="19" align="right">

  <p align="center">
    <input type="text" name="w_college_city"  class="inputbox_long" size="55" ></td>

  </tr>
  <tr class="graydark">
    <td width="28%" >
    الدولة&nbsp; :<span lang="en-us">&nbsp; </span>

    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="19" align="right">

    <select size="1" name="w_college_country" style="border:1px solid #800080; width: 250; height: 20; font-family: MS Sans Serif; font-size: 10pt; background-color: #FFFFFF; color: #000000; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1">
   <option selected>السعودية</option><option>أرمينيا</option><option>
	أسبانيا</option><option>أفغانستان</option><option>
	ألبانيا</option><option>ألمانيا</option><option>
	أورغواي</option><option>أيرلندا</option><option>

	أيسلندا</option><option>إثيوبيا</option><option>
	إريتريا</option><option>إندونيسيا</option><option>
	إيران</option><option>إيطاليا</option><option>
	ازيربيجان</option><option>استراليا</option><option>
	الأرجنتين</option><option>الأردن</option><option>
	الإكوادور</option><option>الإمارات</option><option>
	البحرين</option><option>
	البرازيل</option><option>البرتغال</option><option>
	البوسنةوالهرسك</option><option>التونجو</option><option>

	الجزائر</option><option>
	الدانمارك</option><option>السلفادور</option><option>

	السنغال</option><option>السودان</option><option>السويد</option><option>
	الصحراء الغربية</option><option>الصومال</option><option>
	الصين</option><option>العراق</option><option>الغابون</option><option>
	الفاتيكان</option><option>الكاميرون</option><option>
	الكونغو</option><option>الكويت</option><option>المالديف</option><option>
	المجر</option><option>المغرب</option><option>
	المكسيك</option><option>المملكة المتحدة</option><option>

	النرويج</option><option>النمسا</option><option>
	النيجر</option><option>الهند</option><option>
	الولايات المتحدة</option><option>اليابان</option><option>
	اليمن</option><option>اليونان</option><option>
	انغولا</option><option>اوزبيكستان</option><option>

	اوغندا</option><option>اوكرانيا</option><option>
	ايستونيا</option><option>باراغواي</option><option>
	باكستان</option><option>بروناي دار السلام</option><option>
	بريطانيا العظمى</option><option>بلجيكا</option><option>
	بلغاريا</option><option>بنجلاديش</option><option>

	بنما</option><option>بوتسوانا</option><option>
	بورتوريكو</option><option>بوركينا فاسو</option><option>
	بوروندى</option><option>بولا ندا</option><option>
	بيرو</option><option>بيلاروسيا</option><option>
	بيليز</option><option>بينين</option><option>

	تاجاكستان</option><option>تايلاند</option><option>
	تايوان</option><option>تركمينستان</option><option>
	تركيا</option><option>تشاد</option><option>
	تنزانيا</option><option>تونس</option><option>
	تونس - الحمامات</option><option>تونس - تونس</option><option>

	تونس - سفاقس</option><option>تونس - سوس</option><option>
	تيمورالشرقية</option><option>جامايكا</option><option>
	جزر الباهاماس</option><option>جزر الفليبين</option><option>
	جزر القمر</option><option>جزر سيمان</option><option>
	جمهورية سلوفاكيا</option><option>جمهوريةأفريقياالوسطى</option><option>

	جمهوريةالتشيك</option><option>جمهوريةالدومينيكان</option><option>
	جنوب أفريقيا</option><option>جو رجيا</option><option>
	جواتيمالا</option><option>جيبوتى</option><option>
	رواندا</option><option>روسيا</option><option>
	رومانيا</option><option>زائير</option><option>

	زامبيا</option><option>زيمبابوي</option><option>
	ساحل العاج</option><option>سامواالأمريكية</option><option>
	سان مار</option><option>سريلانكا</option><option>
	سلوفينيا</option><option>سنغافورة</option><option>
	سوازيلاند</option><option>سورية</option><option>سويسرا</option><option>
	سيراليون</option><option>سيشيل</option><option>
	شيلى</option><option>عمان</option><option>
	غامبيا</option><option>غانا</option><option>
	غير ذلك</option><option>فرنسا</option><option>
	فلسطين</option><option>
	فنزويلا</option><option>فنلندا</option><option>
	فيجى</option><option>فييتنام</option><option>
	قبرص</option><option>قطر</option><option>كازاخستان</option><option>

	كرواتيا</option><option>كندا</option><option>
	كوبا</option><option>كوريا الجنوبية</option><option>
	كوريا الشمالية</option><option>كوستاريكا</option><option>
	كولومبيا</option><option>كيرجستان</option><option>
	كينيا</option><option>لاتفيا</option><option>

	لاوس</option><option>لبنان</option><option>
	لوكسمبورج</option><option>ليبريا</option><option>
	ليبيا</option><option>ليتوانيا</option><option>
	ما كاو</option><option>مالطا</option><option>
	مالى</option><option>ماليزيا</option><option>
	مدغشقر</option><option>مصر</option><option>

	مقدونيا</option><option>ملاوي</option><option>
	منغوليا</option><option>موريتانيا</option><option>
	موريشيوس</option><option>موزمبيق</option><option>
	موناكو</option><option>ميانمار</option><option>
	ناميبيا</option><option>نيبال</option><option>

	نيجيريا</option><option>نيكاراجوا</option><option>
	نيو زيلندا</option><option>هاييتي</option><option>
	هندوراس</option><option>هولندا</option><option>
	هونج كونج</option><option>يوغوسلافيا</option></select>    </td>

  </tr>
  <tr class="gray">
    <td width="28%" >
    الدرجة العلمية :<span lang="en-us">&nbsp; </span><font size="3" color="#FF0000">
	*</font></td>
    <td width="71%" height="18" align="right">
    <select size="1" name="w_degree" style="border:1px solid #800080; width: 250; height: 107; font-family: MS Sans Serif; font-size: 10pt; background-color: #FFFFFF; color: #000000; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1">

   <option>أقل من الثانوية</option><option>ثانوية اوما يعادلها</option><option>
	دبلوم ما بعد الثانوية</option><option>بكالوريوس</option><option>
	ماجستير</option><option>دكتوراه</option></select>    </td>

  </tr>

  <tr class="graydark">
    <td>مجال التخصص :<span lang="en-us">&nbsp; </span>
    <font size="3" color="#FF0000">*</font></td>
   <td align="right">

  <p align="center">
    <input name="w_work_spec"  class="inputbox_long" size="55" style="float: right" ></td>

  </tr>
  <tr class="gray">
   <td width="28%" >
    تاريخ الإتمام :<span lang="en-us"> </span>
    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="left">
	
	<input type="button" onClick="SelectDate('Date1')" value="إضغط هنا لإختيار التاريخ">&nbsp;<input type="text"  style="font-family: Arial,Tahoma, sans-serif;font-size: 18px;"  name="w_grad_date" id="Date" readonly size="20">
	
    
	
	</td>

  </tr>
  <tr class="graydark">
    <td width="28%" >
    وصف هذا المؤهل ( اكتب وصفاً عاماً لهذا المؤهل ، مثلاً اكتب عن مشروع تخرجك )&nbsp; 
	:</td>
    <td width="71%" height="20" align="right">
        <textarea rows="6" name="w_degree_desc" cols="43"></textarea></td>

  </tr>

  <tr>
    <td width="50%"  height="19" align="center">
    

    
    بيانات أخري تود إضافتها</td>
    <td width="50%"  height="19" align="center">
    

    
        <textarea rows="6" name="w_more_info" cols="43"></textarea></td>
  </tr>

  <tr>
    <td width="100%" colspan=2  height="19" align="center">
    

    
    <input type="submit" value="موافق" onclick="return checkReg()" name="w_login" ><br>

    </form>
	&nbsp;</td>
  </tr>
</table>

  </center>
  <?
  }
  ?>
  	
</td></tr></table>

<? include_once("includes/footer.php"); ?>
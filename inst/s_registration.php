<? include_once("includes/header.php");


 ?>
<br>

<?if (isset($_POST['s_login'])){

$alldata2=$_POST ;
//print_r ($alldata2) ;
echo "<br>" ;

//echo $alldata2[worker_login];
//print_r ($alldata2) ;


$sql = "INSERT INTO students

					(s_id,s_login,s_password,s_email,s_name,s_live_city,s_tell,s_mobile,s_age,s_more_info)
					
  
  
			  		VALUES
					
					('$alldata2[s_id]','$alldata2[s_login]','$alldata2[s_password]','$alldata2[s_email]','$alldata2[s_name]','$alldata2[s_live_city]','$alldata2[s_tell]','$alldata2[s_mobile]','$alldata2[s_age]','$alldata2[s_more_info]') ";
					
					
			
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
      if (document.myForm122.s_login.value=="")
      {
      alert("من فضلك أدخل إسم الدخول ");
      document.myForm122.s_login.focus();
      return false;
      }
        
      if (document.myForm122.s_password.value=="")
      {
      alert("من فضلك قم بإدخال الباسورد الخاصة بك ");
      document.myForm122.s_password.focus();
      return false;
      }     
	
      if (document.myForm122.s_password_confirm.value=="")
      {
      alert("من فضلك أدخل الباسورد مرة أخرى");
      document.myForm122.w_password_confirm.focus();
      return false;
      }

      if (document.myForm122.s_email.value=="")
      {
      alert("من فضلك أدخل الإيميل الخاص بك");
      document.myForm122.w_email.focus();
      return false;
      }

      if (document.myForm122.s_name.value=="")
      {
      alert("من فضلك أدخل الإسم الخاص بك");
      document.myForm122.s_name.focus();
      return false;
      }
            

    return true;
}
</script>


<center>



<table width="100%" dir="rtl" class="table">
  
  <tr>
<form name="myForm122" action="<? $PHP_SELF ?>" method="POST">
    <td colspan="2" width="100%">
    &nbsp;قم بتعبئة الحقول ذات العلامات المميزة (<font size="3" color="#FF0000">*</font>) 
	، . مع تمنياتنا لك بالتوفيق <span lang="ar-sa">والتقدم الدائم إن شاء الله</span></td>

  </tr>
  <tr>
    <td colspan="2" width="100%" align="center" bgcolor="#DCDCDC" >    بيانات الدخول</td>
    </tr>
	<tr>
    <td width="28%" align="right" height="20">
    اسم المستخدم :<span lang="en-us">&nbsp; </span>

    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
    <input name="s_login"  class="inputbox_long" size="55" style="float: right" ></td>
  </tr>
	<tr>
    <td width="28%"  height="20">
    كلمة المرور :<span lang="en-us">&nbsp; </span>

    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
        <input type="password" name="s_password"  class="inputbox_long" size="55" style="float: right" ></td>
  </tr>
	<tr>
    <td width="28%"  height="20">
    تأكيد كلمة المرور :<span lang="en-us">&nbsp; </span>

    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
    <input type="password" name="s_password_confirm"  class="inputbox_long" size="55" style="float: right" ></td>
    </tr>
  <tr>

    <td width="28%" >
    البريد الالكتروني :<span lang="en-us">&nbsp; </span>
    <font size="3" color="#FF0000">*</font></td>
    <td width="71%" height="20" align="center">
        <input name="s_email"  class="inputbox_long" size="55" style="float: right" ></td>
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
    <input name="s_name" class="inputbox_long" size="55" style="float: right"></td>
  </tr>

  <tr class="graydark" >
    <td width="28%" >

    الجنس :</td>
    <td width="71%" height="19" align="right">
  <select size="1" name="s_gender" style="width: 50; height:21">
  <option selected value="male">ذكر</option>
	<option value="female">أنثى</option>

  </select></td>
  </tr>
  <tr class="gray">
    <td width="28%" >

    &nbsp;المدينة التي تقيم فيها :</td>
    <td width="71%" height="26" align="center">
    <p align="right"><select name="s_live_city" id="ToCity" dir="rtl" size="1">
                                  <option>ابضة                          </option>
									<option>ابقيق                         </option>
									<option>ابها                          </option>
									<option>ابو راكا                      </option>
									<option>ابو ركب                       </option>
									<option>ابو نخلة                      </option>
									<option>ابوعجرم                       </option>
									<option>احد المسارحة                  </option>
									<option>ادمة البشائر                  </option>
									<option>اضم                           </option>
									<option>ال بلحي                       </option>
									<option>ال مسلم                       </option>
									<option>الاجفر                        </option>
									<option>الاحساء                       </option>
									<option>الارطاوية                     </option>
									<option>الاضارع                       </option>
									<option>الاطاولة                      </option>
									<option>الافلاج                       </option>
									<option>الاكحل                        </option>
									<option>الباحة                        </option>
									<option>البتراء                       </option>
									<option>البجادية                      </option>
									<option>البدائع                       </option>
									<option>البدايع                       </option>
									<option>البرك                         </option>
									<option>البركة                        </option>
									<option>البشائر                       </option>
									<option>البطحاء                       </option>
									<option>البكرية                       </option>
									<option>البير                         </option>
									<option>الثقبة                        </option>
									<option>الجبه                         </option>
									<option selected>الجبيل                        </option>
									<option>الجحفة                        </option>
									<option>الجلة                         </option>
									<option>الجماجم                       </option>
									<option>الجموم                        </option>
									<option>الجهراء                       </option>
									<option>الحرجة                        </option>
									<option>الحرم المكي                   </option>
									<option>الحسونية                      </option>
									<option>الحصينية                      </option>
									<option>الحظه                         </option>
									<option>الحفاير                       </option>
									<option>الحليفة                       </option>
									<option>الحناكية                      </option>
									<option>الحوميات                      </option>
									<option>الحوية                        </option>
									<option>الخبر                         </option>
									<option>الخرج                         </option>
									<option>الخرسانية                     </option>
									<option>الخرمة                        </option>
									<option>الخضراء                       </option>
									<option>الخطه                         </option>
									<option>الخفجي                        </option>
									<option>الخفراء                       </option>
									<option>الدرب                         </option>
									<option>الدغمانية                     </option>
									<option>الدلم                         </option>
									<option>الدمام                        </option>
									<option>الدمام فاخر                   </option>
									<option>الدوادمي                      </option>
									<option>الذويرة</option><option>الرحبة                        </option>
									<option>الرس                          </option>
									<option>الرقعي                        </option>
									<option>الروضة                        </option>
									<option>الرويضة                       </option>
									<option>الرياض                    </option>
									<option>الرياض فاخر                   </option>
									<option>الزلفي                        </option>
									<option>الزيمة                        </option>
									<option>السبعان                       </option>
									<option>السحن بني سعد                 </option>
									<option>السعيرة                       </option>
									<option>السفانية                      </option>
									<option>السليل                        </option>
									<option>السليم                        </option>
									<option>السويرقية                     </option>
									<option>السيل الصغير                  </option>
									<option>السيل الكبير                  </option>
									<option>الشاقة                        </option>
									<option>الشبيكة                       </option>
									<option>الشرايع                       </option>
									<option>الشعبة                        </option>
									<option>الشعيبة                       </option>
									<option>الشقرة                        </option>
									<option>الشقيق                        </option>
									<option>الشماسية                      </option>
									<option>الشملي                        </option>
									<option>الشنان                        </option>
									<option>الصبيخة                       </option>
									<option>الصرار                        </option>
									<option>الصفراء                       </option>
									<option>الصويدرة                      </option>
									<option>الضلفعية                      </option>
									<option>الطائف                        </option>
									<option>الطرس                         </option>
									<option>الطلعة                        </option>
									<option>الطوال                        </option>
									<option>العدوة                        </option>
									<option>العرفاء                       </option>
									<option>العسران                       </option>
									<option>العشاش                        </option>
									<option>العضيليه                      </option>
									<option>العطيف                        </option>
									<option>العظيم                        </option>
									<option>العقلة                        </option>
									<option>العلا                         </option>
									<option>العلبه                        </option>
									<option>العمار                        </option>
									<option>العمق                         </option>
									<option>العوقيلة</option><option>العويقيله                     </option>
									<option>العيدابي</option><option>العيساوية                     </option>
									<option>العيون</option><option>العيينة                       </option>
									<option>الغاط                         </option>
									<option>الغريف                        </option>
									<option>الغزالة                       </option>
									<option>الفجر                         </option>
									<option>القاعة                        </option>
									<option>القاعد                        </option>
									<option>القاعدة                       </option>
									<option>القحمة                        </option>
									<option>القرارة                       </option>
									<option>القرحاء                       </option>
									<option>القريا العليا                 </option>
									<option>القريات                       </option>
									<option>القريع بن مالك                </option>
									<option>القرينة                       </option>
									<option>القصب                         </option>
									<option>القصيبي                       </option>
									<option>القطيف                        </option>
									<option>القليبه                       </option>
									<option>القنفذة                       </option>
									<option>القوز                         </option>
									<option>القويعية                      </option>
									<option>القيصومة                      </option>
									<option>الكنادر                       </option>
									<option>الليث                         </option>
									<option>المجاردة                      </option>
									<option>المجمعة                       </option>
									<option>المحاني                       </option>
									<option>المحمدية</option><option>المخواة                       </option>
									<option>المدينة المنورة               </option>
									<option>المذنب</option><option>المركوز                       </option>
									<option>المزاحمية                     </option>
									<option>المضة                         </option>
									<option>المضيح                        </option>
									<option>المظيلف                       </option>
									<option>المعقص                        </option>
									<option>المفرق                        </option>
									<option>المندسة                       </option>
									<option>الموية                        </option>
									<option>النبهانية                     </option>
									<option>النعيرية                      </option>
									<option>النقرة                        </option>
									<option>النماص                        </option>
									<option>الهباس                        </option>
									<option>الهويدي                       </option>
									<option>الهويمل                       </option>
									<option>الوجه                         </option>
									<option>الوزان                        </option>
									<option>الوسقة                        </option>
									<option>الوسيع                        </option>
									<option>اليتمة                        </option>
									<option>اليتمة                        </option>
									<option>ام الجماجم                    </option>
									<option>ام عداد                       </option>
									<option>املج                          </option>
									<option>بارق                          </option>
									<option>بحرة المجاهدين                </option>
									<option>بدر                           </option>
									<option>بديع                          </option>
									<option>بريدة                         </option>
									<option>بقعاء                         </option>
									<option>بلجرشي                        </option>
									<option>بللحمر                        </option>
									<option>بللسمر                        </option>
									<option>بني عمرو                      </option>
									<option>بيش                           </option>
									<option>بيشة                          </option>
									<option>تبوك                          </option>
									<option>تثليث                         </option>
									<option>تجر                           </option>
									<option>تربة                          </option>
									<option>تمير                          </option>
									<option>تنومة                         </option>
									<option>تيماء                         </option>
									<option>ثادق                          </option>
									<option>جاش                           </option>
									<option>جدة                           </option>
									<option>جديدة عرعر                    </option>
									<option>جهينة</option><option>جيزان                         </option>
									<option>حائل                          </option>
									<option>حالة عمار                     </option>
									<option>حرض                           </option>
									<option>حريملاء                       </option>
									<option>حفرالباطن                     </option>
									<option>حقل                           </option>
									<option>حلبان                         </option>
									<option>حلى                           </option>
									<option>حنيز                          </option>
									<option>حوطة بني تميم                 </option>
									<option>حوطة سدير                     </option>
									<option>خارجي</option><option>خريص                          </option>
									<option>خليص                          </option>
									<option>خميس البحر                    </option>
									<option>خميس مشيط                     </option>
									<option>خيبر                          </option>
									<option>خيبر الجنوب                   </option>
									<option>دخنة                          </option>
									<option>دليهان                        </option>
									<option>دوقة                          </option>
									<option>دومة الجندل                   </option>
									<option>ذهبان                         </option>
									<option>رابغ                          </option>
									<option>راس تنورة                     </option>
									<option>راس شعاب                      </option>
									<option>رجال ألمع</option><option>رحيمة                         </option>
									<option>رضوان                         </option>
									<option>رغبة                          </option>
									<option>رفايع الجمش                   </option>
									<option>رفحاء                         </option>
									<option>رنية                          </option>
									<option>رويض                          </option>
									<option>رويضة                         </option>
									<option>زلوم                          </option>
									<option>ساجر                          </option>
									<option>سامطه                         </option>
									<option>سبت العلايا                   </option>
									<option>سبيعة                         </option>
									<option>سد شمران                      </option>
									<option>سديرة                         </option>
									<option>سراة عبيدة                    </option>
									<option>سكاكا                         </option>
									<option>سلام                          </option>
									<option>سلوى                          </option>
									<option>سميراء                        </option>
									<option>شرورة                         </option>
									<option>شري                           </option>
									<option>شعر                           </option>
									<option>شقراء                         </option>
									<option>شقصان                         </option>
									<option>شمرخ                          </option>
									<option>شواق                          </option>
									<option>صبيا                          </option>
									<option>صفوى                          </option>
									<option>صلصة                          </option>
									<option>صمخ                           </option>
									<option>ضبا                           </option>
									<option>ضرما                          </option>
									<option>ضريه                          </option>
									<option>طبرجل                         </option>
									<option>طريب                          </option>
									<option>طريف                          </option>
									<option>ظلم                           </option>
									<option>ظلمة                          </option>
									<option>ظهران الجنوب                  </option>
									<option>عدوة                          </option>
									<option>عرجاء                         </option>
									<option>عرعر                          </option>
									<option>عريعرة                        </option>
									<option>عريفجان                       </option>
									<option>عسيلة                         </option>
									<option>عشيرة                         </option>
									<option>عفيف                          </option>
									<option>عقلة الصقور                   </option>
									<option>عقلة بني داني                 </option>
									<option>عقلة بني طوالة                </option>
									<option>عنيزة                         </option>
									<option>غزايل                         </option>
									<option>غنوة                          </option>
									<option>قارا                          </option>
									<option>قرية الجديد</option><option>قلوة                          </option>
									<option>قنا                           </option>
									<option>قهوة الجبل                    </option>
									<option>قيا                           </option>
									<option>مثلث الحجرة                   </option>
									<option>مثلث الشعراء                  </option>
									<option>محايل                         </option>
									<option>مرات                          </option>
									<option>مستورة                        </option>
									<option>مطار الظهران                  </option>
									<option>مطار المدينة المنورة          </option>
									<option>مفرق بني سعد                  </option>
									<option>مفرق تبوك                     </option>
									<option>مفرق تربة                     </option>
									<option>مفرق ترعة                     </option>
									<option>مفرق سديرة                    </option>
									<option>مفرق عشيرة                    </option>
									<option>مفرق وادي الدواسر             </option>
									<option>مكة                           </option>
									<option>مليجة                         </option>
									<option>مهد الذهب                     </option>
									<option>ميسان بالحارث                 </option>
									<option>ميقات الجحفة                  </option>
									<option>ميقوع                         </option>
									<option>نبك ابوقصر                    </option>
									<option>نجران                         </option>
									<option>نطاع                          </option>
									<option>نفي                           </option>
									<option>نمرة                          </option>
									<option>هادكو                         </option>
									<option>وادي الدواسر                  </option>
									<option>وادي بني هشبل                 </option>
									<option>ينبع                          </option>
									<option>سليم</option><option>سواكن</option>
									<option>شدة</option><option>صلب</option>
									<option>عبرى</option><option>كرمة</option>
									<option>كريمة</option><option>كسلا</option>
									<option>كورتى</option><option>كوستي</option>
									<option>مروى</option><option>نورى</option>
									<option>هندكة</option><option>ود مدنى</option>
									<option>الحديدة                       </option>
									<option>القوانص                       </option>
									<option>المكلا                        </option>
									<option>تعز                           </option>
									<option>سيئون                         </option>
									<option>شبوة                          </option>
									<option>مارب                          </option>

                                </select></td>
  </tr>
  <tr class="gray">
    <td>العمر :<span lang="en-us">&nbsp; </span>
    <font size="3" color="#FF0000">*</font></td>
    <td align="right">
  <select size="1" name="s_age" style="width: 68">

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
    <input name="s_tell"  class="inputbox_long" size="55" style="float: right" ></td>

  </tr>
  <tr class="gray">
    <td width="28%" >
    الهاتف الخلوي (النقال)<font size="3" color="#FF0000">*</font> :</td>
    <td width="71%" height="20" align="center">
        <input name="s_mobile"  class="inputbox_long" size="55" style="float: right" ></td>
  </tr>

  <tr>
    <td width="50%"  height="19" align="center">
    

    
    <p align="right">بيانات أخري تود إضافتها</td>
    <td width="50%"  height="19" align="center">
    

    
        <textarea rows="6" name="s_more_info" cols="43"></textarea></td>
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
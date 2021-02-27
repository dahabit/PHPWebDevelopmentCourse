<td width="500" id="addarticle">

نعم: 
<input type="radio" <? if ($row['active']==1) { echo 'checked="checked"' ; } ?> name="active" value="1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
لا: 
<input type="radio"  <? if ($row['active']==0) { echo 'checked="checked"' ; } ?> name="active" value="0">
</td>
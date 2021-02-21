<?		
	if (!empty($submit))
	{

	$message="
	FeedBack Form
	
	Name: $Name
	E-mail: $Email
	Text: $Description
	";

	mail ("info@extralabs.com","FeedBack",$message, "MIME-Version: 1.0\n" .     "Content-type: text/html; charset=utf-8") or die("Cannot send a mail!");
		
	echo "<table style='border-collapse:collapse;' cellspacing='0' width='759' height='0'>
    <tr>
        <td width='755' style='border-top-width:1; border-right-width:1; border-bottom-width:1; border-left-width:1; border-color:black; border-style:none;' colspan='2' height='160'><p><a href='http://www.extralabs.com'><img src='logo.gif' width='545' height='108' border='0' alt='ExtraLabs Official web site'></a>&nbsp;</p>
            <p>&nbsp;</p>
        </td>
            </tr>
    <tr>
    <td width='100' 84' style='border-width:1; border-color:black; border-style:none;'>&nbsp;</td>
        <td width='559' height='84' style='border-width:1; border-color:black; border-style:none;'>
            <p align='center'><font face='Verdana' size='2'><a href='index.htm'>Main</a> 
             | <a href='articles/index.htm'>Articles</a>&nbsp;| <a href='products.htm'>Products</a> 
            | <a href='downloads.htm'>Download</a> | <a href='purchase.htm'>Purchase</a> 
            | <a href='forum/'>Forum</a></font></p>
            <b><font size='2' face='Verdana'>FeedBack</font></b>
            <p><font face='Verdana' size='2'>Thanks for your feedback. It will 
            help us improve our software.If you have any other questions or 
            suggestions, please, don't hesitate, e-mail us </font><a href='mailto:support@extralabs.com'><font face='Verdana' size='2'>support@extralabs.com</font></a></p>
            <p>&nbsp;</p>
        </td>

    </tr>
    <tr>
        <td width='755' height='14' style='border-top-width:1; border-right-width:1; border-bottom-width:1; border-left-width:1; border-color:black; border-style:none;' colspan='2'>
            <p align='center'><font face='Verdana' size='2'><a href='index.htm'>Main</a> 
            | <a href='extralabs.htm'>Company</a> | <a href='articles/index.htm'>Articles</a>&nbsp;| <a href='products.htm'>Products</a> 
            | <a href='downloads.htm'>Download</a> | <a href='purchase.htm'>Purchase</a> 
            | <a href='support.php'>Support</a> | <a href='forum/'>Forum</a></font></p>
        </td>
    </tr>
    <tr>
        <td width='755' height='14' style='border-top-width:1; border-right-width:1; border-bottom-width:1; border-left-width:1; border-color:black; border-style:none;' colspan='2'>
            <p><font face='Verdana' size='1'><br>Copyright © 2001-2005 ExtraLabs Software. All rights reserved.</font><font size='1' face='Verdana'>&nbsp;</font><a href='mailto:webmaster@extralabs.com'><font size='1' face='Verdana'>webmaster@extralabs.com</font></a></p>
        </td>
    </tr>
</table>";	
		
	   
	}	
	else
	{
	?>		
		

<meta http-equiv="content-type" content="text/html; charset=windows-1251">
		<script language="JavaScript">
		function isEmpty(str) {
           for (var i = 0; i < str.length; i++)
              if (" " != str.charAt(i))
                    return false;
              return true;
         }

         function checkform(f) {
            var errMSG = "";
            for (var i = 0; i<f.elements.length; i++)
               if (null!=f.elements[i].getAttribute("required")) 
                  if (isEmpty(f.elements[i].value))
                     errMSG += "- " + f.elements[i].name + "\n";
            if ("" != errMSG) {
               alert("Please choose:\n" + errMSG);
               return false;
            }
         }
		</script>
<title>ExtraLabs FeedBack</title>
<meta name="generator" content="Namo WebEditor v5.0(Trial)">

<table style="border-collapse:collapse;" cellspacing="0" width="761" height="0">
    <tr>
        <td width="757" style="border-top-width:1; border-right-width:1; border-bottom-width:1; border-left-width:1; border-color:black; border-style:none;" colspan="2" height="160"><p><a href="http://www.extralabs.com"><img src="logo.gif" width="545" height="108" border="0" alt="ExtraLabs Official web site"></a>&nbsp;</p>
            <p>&nbsp;</p>
        </td>
            </tr>
    <tr>
    <td width="100" 84" style="border-width:1; border-color:black; border-style:none;">&nbsp;</td>
        <td width="561" height="84" style="border-width:1; border-color:black; border-style:none;">
            <p align="center"><font face="Verdana" size="2"><a href="index.htm">Продукты</a> 
            |  <a href="purchase.htm">Купить</a> 
            | <a href="articles.htm">Статьи</a> | <a href="support.php">Поддержка</a></font></p>
<p>
            <font face="Verdana" size="2">Если у вас есть любые вопросы относительно 
            наших продуктов, или конструктивные предложение, пишите в службу 
            <a href="mailto:?subject=support@extralabs.net">технической поддержки</a> ли 
            воспользуйтесь формой обратной связи.</font></p>
            <p>&nbsp;</p>
            <form method="POST" action="support.php" onSubmit = "return checkform(this)">

<table border="0"  width="559" cellpadding="1">
  <tr>
     <td width=150><font face="Verdana" size="2">Имя:</font></td><td width="228"><font face="Verdana" size="2">&nbsp;<input type="text" name="Name" required size="29"></font></td>
  </tr>
  <tr>
     <td width=150> <font class="bodyplaingrey" face="Verdana" size="2">E-mail:</font></td><td width="228"><font face="Verdana" size="2">&nbsp;<input type="text" name="Email" required size="29"></font></td>
  </tr>
  <tr>
     <td width=150 valign="top"><font class="bodyplaingrey" face="Verdana" size="2">Текст 
                            сообщения:</font></td><td width="228" bordercolor="black"><font face="Verdana" size="2">&nbsp;<textarea name="Description" rows="9" cols="28"></textarea></font></td>
  </tr>
  <tr>
     <td colspan=2 width="382">
                <p align="center"><font face="Verdana" size="2">&nbsp;<input type="submit" value="Отправить" name="submit"></font></td>
  </tr>
</table>


</form>
            <p>&nbsp;</p>
        </td>

    </tr>
    <tr>
        <td width="757" height="14" style="border-top-width:1; border-right-width:1; border-bottom-width:1; border-left-width:1; border-color:black; border-style:none;" colspan="2">
            <p align="center"><font face="Verdana" size="2"><a href="index.htm">Продукты</a> 
            |  <a href="purchase.htm">Купить</a> 
            | <a href="articles.htm">Статьи</a> | <a href="support.php">Поддержка</a></font></p>
        </td>
    </tr>
    <tr>
        <td width="757" height="14" style="border-top-width:1; border-right-width:1; border-bottom-width:1; border-left-width:1; border-color:black; border-style:none;" colspan="2">
            <p><font face="Verdana"><span style="font-size:6pt;"><br>Copyright &copy; 2001-2005 ExtraLabs 
            Software. All rights reserved.&nbsp;</span></font><a href="mailto:webmaster@extralabs.net"><font face="Verdana"><span style="font-size:6pt;">webmaster@extralabs.</span></font></a><font face="Verdana"><a href="mailto:webmaster@extralabs.net"><span style="font-size:6pt;">net</span></a></font></p>
        </td>
    </tr>
</table>
<?
}
?>
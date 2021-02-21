<?php 
//
// RSS to HTML webpage script v.1.2
//
// Copyright 2002-2006 ExtraLabs Software
//
// Website: http://www.extralabs.net
// Support: support@extralabs.net
// 
// License: Freeware
// This script may be used freely for business or personal use
//
   include "./rss_export.php";
 
// Main Settings
//
// Your RSS feed:
   $rss_feed="http://www.extralabssoftware.com/my-mix.xml";

// Template for the feed:
   $template="sample-template.rat";

// More info about date() function you can find here: http://www.php.net/manual/en/function.date.php.
   $DateFormat="d M y, h:m:s"; 


if (isset($_REQUEST["RSSFILE"])) {
  $rss_feed = $_REQUEST["RSSFILE"];
}

if (isset($_REQUEST["TEMPLATE"])) {
  $template = $_REQUEST["TEMPLATE"];
}

$FeedMaxItems = 5000;
if (isset($_REQUEST["MAXITEMS"])) {
  $FeedMaxItems = $_REQUEST["MAXITEMS"];
}

$RandomItems=0;
if (isset($_REQUEST["RANDOM"])) {
  $RandomItems = $_REQUEST["RANDOM"];
}

   error_reporting(E_ERROR);	
   $rss = new RSS_export; 
   $rss->cache_dir = './temp'; 
   $rss->cache_time = 1200; 
   $from = 1;
   $rss->date_format = $DateFormat;
   if ($rs = $rss->get($rss_feed)) 
    { 
     $theData = file($template);
     $count = 0;
     $from = -1;
     foreach($theData as $line)
      {
        if ((strstr($line,"NOCRLF=")) || (strstr($line,"NAME=")) || (strstr($line,"FILEEXT=")) || (strstr($line,"DATEFORMAT=")) || (strstr($line,"TIMEFORMAT="))) {
        $line="";
        }   
	$line=str_replace("%Copyright%", "$rs[copyright]\n", $line); 
        $line=str_replace("%Copyright%", "", $line); 
        $line=str_replace("%Language%", "$rs[language]\n", $line); 
        $line=str_replace("%Language%", "", $line); 
        $line=str_replace("%Editor%", "$rs[managingEditor]\n", $line); 
        $line=str_replace("%Editor%", "", $line); 
        $line=str_replace("%Webmaster%", "$rs[webMaster]\n", $line); 
        $line=str_replace("%Webmaster%", "", $line); 
        $line=str_replace("%FeedPubTime%", "$rs[lastBuildDate]\n", $line); 
        $line=str_replace("%FeedPubTime%", "", $line); 
        $line=str_replace("%Rating%", "$rs[rating]\n", $line); 
        $line=str_replace("%Rating%", "", $line); 
        $line=str_replace("%Docs%", "$rs[docs]\n", $line); 
        $line=str_replace("%Docs%", "", $line); 

        $line=str_replace("%FeedTitle%", "$rs[title]\n", $line); 
        // $line=str_replace("%FeedLink%", "<a href=\"$rs[link]\">$rs[title]</a>\n", $line); 
        $line=str_replace("%FeedLink%", "$rs[link]\n", $line); 
        $line=str_replace("%FeedDescription%", $rs[description], $line);

        $line=str_replace("&lt;", "<", $line);
        $line=str_replace("&gt;", ">", $line);

        $line=str_replace("&nbsp;", " ", $line);
        $line=str_replace("&quot;", " ", $line);
        $line=str_replace("&copy;", " ", $line);
        $line=str_replace("&reg;", " ", $line);
        $line=str_replace("&trade;", " ", $line);
        $line=str_replace("&euro;", "?", $line);
        $line=str_replace("&bdquo;", " ", $line);
        $line=str_replace("&ldquo;", " ", $line);
        $line=str_replace("&laquo;", " ", $line);
        $line=str_replace("&raquo;", " ", $line);
        $line=str_replace("&sect;", " ", $line);
        $line=str_replace("&amp;", "&", $line);
        $line=str_replace("&#151;", " ", $line);
        $line=str_replace("&apos;", "'", $line);
        if ($rs['image_url'] != '') { 
           $line=str_replace("%ImageItem%", "<a href=\"$rs[image_link]\"><img src=\"$rs[image_url]\" alt=\"$rs[image_title]\" vspace=\"1\" border=\"0\" /></a>\n", $line);
         }
          else {
           $line=str_replace("%ImageItem%", "", $line);
         }
        $count = $count+1;
	if (strstr($line,"%BeginItemsRecord%")){
        $from = $count; 
        }   
	if ($from == -1){ echo $line;}
     } 

        $linecount = 0;

        foreach($rs['items'] as $item)
        {

        if ($RandomItems == 1) {

           $seeder = hexdec(substr(md5(microtime()), -8)) & 0x7fffffff;
 	   mt_srand($seeder);
           $c=mt_rand(0,1);
           if ($c == 0) {
              $seeder = hexdec(substr(md5(microtime()), -8)) & 0x7fffffff;
 	      mt_srand($seeder);
              continue;
              }
        } 

        if ($linecount == $FeedMaxItems) {
           break;
           }
        ++$linecount;
       
       $strcount=0;	
       foreach($theData as $line){
          $strcount=$strcount+1;
          if ($strcount>=$from){ 
          $line=str_replace("%BeginItemsRecord%", "", $line);
          $line=str_replace("%ItemTitle%", $item['title'], $line);
          $line=str_replace("%ItemLink%", $item['link'], $line);
          $line=str_replace("%ItemDescription%",$item['description'], $line);
          $line=str_replace("%ItemPubTime%", $item['pubDate'], $line);
          $line=str_replace("%ItemPubTime%", "", $line);

          $line=str_replace("%EndItemsRecord%", "", $line);

          $line=str_replace("&lt;", "<", $line);
          $line=str_replace("&gt;", ">", $line);
          $line=str_replace("&nbsp;", " ", $line);
          $line=str_replace("&quot;", " ", $line);
          $line=str_replace("&copy;", " ", $line);
          $line=str_replace("&reg;", " ", $line);
          $line=str_replace("&trade;", " ", $line);
          $line=str_replace("&euro;", "?", $line);
          $line=str_replace("&bdquo;", " ", $line);
          $line=str_replace("&ldquo;", " ", $line);
          $line=str_replace("&laquo;", " ", $line);
          $line=str_replace("&raquo;", " ", $line);
          $line=str_replace("&sect;", " ", $line);
          $line=str_replace("&amp;", "&", $line);
          $line=str_replace("&#151;", " ", $line);
          $line=str_replace("&apos;", "'", $line);

   	  echo $line;           }
	  }
         } 
   } 
   else 
   { 
    echo "Error: An error occured while parsing RSS file. Please contact with us at: support@extralabssoftware.com\n"; 
   } 
?> 

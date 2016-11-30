<?php 
function wordwrap2($str,$cols,$cut, $html_tag) {
 $len=strlen($str);
 
 $tag=0;
 for ($i=0;$i<$len;$i++) {
   $chr = substr($str,$i,1);
   if ($chr=="<")
     $tag++;
   elseif ($chr==">")
     $tag--;
   elseif (!$tag && $chr==" ")
     $wordlen=0;
   elseif (!$tag)
     $wordlen++;
   if (!$tag && !($wordlen%$cols))
     $chr .= $cut;
   
   $result .= $chr;
 }
  
  
$result = str_replace('<br /></'.$html_tag.'><br />', '</'.$html_tag.'><br />', $result);
$result = str_replace('<br /><'.$html_tag.'><br />', '<'.$html_tag.'><br />', $result);

return $result;
 
} 
echo wordwrap2('bbbbbbbbbbbbbbbbbbbb<b>bbb</b>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', $width = 20, $break = "<br />", 'b') ;

?>
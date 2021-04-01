<?php
  $s="this isjdvhjkjlvlk <br>goodvjkdlkjgdjklbsd ...<br>Jiggldkjlvdlkvkjdvjdvgg";
  $a=explode('<br>',$s);
  for($i=0;$i<count($a);$i++)
  {
	   echo wordwrap($a[$i],5,'<br>');
  }
?>
<?php
function makefilename(){
	$curtime=getdate();
	$filename=$curtime['year'].$curtime['mon'].$curtime['mday'].$curtime['hours'].$curtime['minutes'].$curtime['seconds'].".rar";
	return $filename;
}
?>
<?php 
require_once("inc/jdf.php");
$today = date("Y-m-d");
list($y,$m,$d)= explode('-',$today);
$jtoday = gregorian_to_jalali($y,$m,$d,'-');
$shit = "shit";
?>
<script>
	var test = "<?php echo $shit; ?>";
	window.alert(test);
</script>


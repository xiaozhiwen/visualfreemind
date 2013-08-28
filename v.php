<?php
$view = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($view)) exit(1);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
<title>NS - PASS - <?php echo $view ?></title>
<style>body{margin:0px; padding:0px}</style>
</head>
<body>
<script type="text/javascript" src="res/flashobject.js"></script>
<style type="text/css">
	/* hide from ie on mac \*/
	html {
		height: 100%;
		overflow: hidden;
	}
	
	#flashcontent {
		height: 100%;
	}
	/* end hide */

	body {
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #9999ff;
	}

</style>
<script language="javascript">
function giveFocus() 
{ 
//     document.visorFreeMind.focus();  
}
var config = {
    id  : '<?php echo $view?>',
    scl : 2,
    data: "xml.php?id=<?php echo $view?>&v=1.0.0",
    src : "res/visorFreemind.swf"
};
</script></head>
<body>
	<div id="<?php echo $view?>" onmouseover="this.focus()">
		 Flash plugin or Javascript are turned off.
		 Activate both  and reload to view the mindmap
	</div>
	<script type="text/javascript">
		// <![CDATA[
		// for allowing using http://.....?mindmap.mm mode
		function getMap(map){
		  var result=map;
		  var loc=document.location+'';
		  if(loc.indexOf(".mm")>0 && loc.indexOf("?")>0){
			result=loc.substring(loc.indexOf("?")+1);
		  }
		  return result;
		}
		var fo = new FlashObject(config.src, config.id, "100%", "100%", 6, "#9999ff");
		fo.addParam("quality", "high");
		fo.addParam("bgcolor", "#a0a0f0");
		fo.addVariable("openUrl", "_blank");
		fo.addVariable("startCollapsedToLevel","4");
		fo.addVariable("maxNodeWidth","200");
		//
		fo.addVariable("mainNodeShape","elipse");
		fo.addVariable("justMap","false");
		fo.addVariable("initLoadFile", config.data);
		fo.addVariable("defaultToolTipWordWrap",200);
		//fo.addVariable("offsetX","center");
		//fo.addVariable("offsetY","center");
		fo.addVariable("buttonsPos","top");
		fo.addVariable("min_alpha_buttons",20);
		fo.addVariable("max_alpha_buttons",100);
		fo.addVariable("scaleTooltips","false");
		
		fo.write(config.id);
		// ]]>
	</script>
</body>
</html>

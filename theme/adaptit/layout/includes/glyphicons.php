<?php 
//$fontsdir = $CFG->wwwroot.'/theme/'. current_theme().'/fonts/'; 
$fontsdir = $CFG->wwwroot.'/theme/adaptit/fonts/'; 
?>
<style type="text/css">
@font-face {
  font-family: 'Glyphicons Halflings';
  src: url('<?php echo $fontsdir ?>glyphicons-halflings-regular.eot');
  src: url('<?php echo $fontsdir ?>glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('<?php echo $fontsdir ?>glyphicons-halflings-regular.woff') format('woff'), url('<?php echo $fontsdir ?>glyphicons-halflings-regular.ttf') format('truetype'), url('<?php echo $fontsdir ?>glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
}
@font-face {
    font-family: 'Merriweather';
    font-weight: normal;
    font-style: normal;
    src: url('<?php echo $fontsdir ?>Merriweather-Regular.ttf') format('truetype'),
      			url('<?php echo $fontsdir ?>Merriweather-Bold.ttf') format('truetype'),
      			url('<?php echo $fontsdir ?>Merriweather-Italic.ttf') format('truetype');
}

@font-face {
    font-family: 'Montserrat';
    font-weight: normal;
    font-style: normal;
    src: url('<?php echo $fontsdir ?>Montserrat-Bold.ttf') format('truetype'),
      			url('<?php echo $fontsdir ?>Montserrat-Regular.ttf') format('truetype');
}
@font-face {
    font-family: 'Roboto Slab';
    font-weight: normal;
    font-style: normal;
    src: url('<?php echo $fontsdir ?>RobotoSlab-Regular.ttf') format('truetype'),
      			url('<?php echo $fontsdir ?>RobotoSlab-Thin.ttf') format('truetype'),
				url('<?php echo $fontsdir ?>RobotoSlab-Bold.ttf') format('truetype');
}
</style>
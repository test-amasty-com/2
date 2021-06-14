<?
$init_color = array('red','blue','green','yellow','lime','magenta','black','gold','gray','tomato');
$result = array();
for($i=0;$i<5;$i++){
	for($j=0;$j<5;$j++){
		$color = $init_color[array_rand($init_color,1)];
		$text = $init_color[array_rand($init_color,1)];
		if(!empty($result[$i])) {//если не первый элемент в строке
			if(in_array($text,array_column($result[$i],'text'))){//если в этой строке есть уже такой цвет
				$tmp = array_column($result[$i],'text');
				while (true) {//бесконечный цикл
					$text = $init_color[array_rand($init_color,1)];
					if(!in_array($text,$tmp)) break;
				}
			}
		}
		if($color == $text){
			while (true) {//бесконечный цикл
				$color = $init_color[array_rand($init_color,1)];
				if($color != $text) break;	
			}
		}
		$result[$i][$j] = array('color'=>$color,'text'=>$text);
	}
}
?>
<html>
<head>
	<title>Тест Струпа</title>
	<link href="css/default.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="all">
	<div class="main">Пройдете тест?!</div>
	<div class="container">
		<?foreach ($result as $res):?>
			<div>
				<?foreach($res as $str):?>
				<span style="padding:10px;color:<?echo $str['color'];?>"><?echo $str['text'];?></span>
				<?endforeach;?>
			</div>
		<?endforeach;?>
	</div>
</div>
</body>
</html>
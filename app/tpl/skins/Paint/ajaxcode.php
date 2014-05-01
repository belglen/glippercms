				<span style="word-wrap:break-word;">
				<strong>
					Niet te vergeten:
				</strong>			
				<br />
				<br />
				<span style="font-weight: bold; color: blue;">
				function
				</span>
				<i>
				functienaam</i>()
				<br>
				{
				<br>
				&nbsp; &nbsp;   <span style="font-weight: bold; color: blue;">echo</span> "Ik houd van Glipper!";
				<br>
				}
				<hr>
				<br>
				$array1 = <span style="font-weight: bold; color: blue;">array</span>('<i><b>Een naam1</b></i>', '<i>Een naam2</i>');<br>
				<span style="font-weight: bold; color: blue;">echo</span> $array1[<b>0</b>];
				<br><br>
				<i>Dan print hij "<b>Een naam1</b>".<br>Bij $array1[1] zal hij "Een naam2" printen.</i><br><hr>
				$variabel = 'Airblender';<br>
				<span style="font-weight: bold; color: blue;">
				switch
				</span>($variabel)<br>
				{
				<br>
				<span style="font-weight: bold; color: blue;">
				&nbsp; &nbsp; 	case
				</span>'Len':<br>
					&nbsp; &nbsp;	&nbsp; &nbsp;      <span style="font-weight: bold; color: blue;">echo</span> 'De variabel is Len.';<br>
<span style="font-weight: bold; color: blue;">
				&nbsp; &nbsp; 	break</span>;<br><br>					<span style="font-weight: bold; color: blue;">
				&nbsp; &nbsp; 	case
				</span>'Airblender':<br>
					&nbsp; &nbsp;	&nbsp; &nbsp;      <span style="font-weight: bold; color: blue;">echo</span> 'De variabel is Airblender.';<br>
<span style="font-weight: bold; color: blue;">
				&nbsp; &nbsp; 	break</span>;
				<br>
				}<br><br><i>In dit geval zal hij de tekst "De variabel is Airblender." printen.</i><br><hr>
				<span style="font-weight: bold; color: blue;">echo</span> ucwords("welkom in glipper");<br><br>Dan komt er: "<i><b>W</b>elkom <b>I</b>n <b>G</b>lipper</i>"
<hr>
				<span style="font-weight: bold; color: blue;">echo</span> ucfirst("welkom in glipper");<br><br>Dan komt er: "<i><b>W</b>elkom in glipper</i>"<br><hr>
				$user->username = 'Len';<br><br>
				<span style="font-weight: bold; color: blue;">echo</span> <span style="font-weight: bold; color: blue;">strtoupper</span>($user->username);<br><br>
				Dan komt er: "<i>LEN</i>"<br><hr> 
				<span style="font-weight: bold; color: blue;">echo</span> str_shuffle("Airblender")<br><br>Dan komt er te staan: "<i>denrirelbA <u>of een ander random volgorde</u></i>"<br><hr>
				$voorbeeld = "Huh? Shit!";
				<br><span style="font-weight: bold; color: blue;">echo</span> str_replace("Shit", "Chips", $voorbeeld);<br><br>
				Dan komt er: "<i>Huh? Chips!</i>"<br><hr>
				
				$sterren = <span style="font-weight: bold; color: orange;">100</span>;<br>
				$aantal = round($sterren * <b>0.10</b>);<br>
				echo $aantal; 
				<br><br>Dan komt er "<i>10</i>". <b>0.10</b> is eigenlijk <b>10</b>% van het $sterren. Als je bijvoorbeeld dit doet:<br>
<br>			$sterren = <span style="font-weight: bold; color: orange;">100</span>;<br>
				$aantal = round($sterren * <b><span style="font-weight: bold; color: red;">1</span>.10</b>);<br>
				echo $aantal; <br><br>Dan showt hij: "<i>110</i>". (1.10 is dus het geheel PLUS 10%)
				
				<br><hr>
				$str = "in Glipper Welkom";<br>
				$verander = <span style="font-weight: bold; color: blue;">explode</span>(" ", $str);<br><br>
				$in = $verander[<span style="color: orange;">0</span>];<br>
				$Glipper = $verander[<span style="color: orange;">1</span>];<br>
				$Welkom = $verander[<span style="color: orange;">2</span>];<br><br>
				$array = <span style="font-weight: bold; color: blue;">array</span>($Welkom, $in, $Glipper);<br><br>
				<span style="font-weight: bold; color: blue;">echo</span> <span style="font-weight: bold; color: blue;">implode</span>(" ",$array);
				<br><br>Dan komt er te staan: <i>Welkom in Glipper</i>
				<br><hr>
				$hash = "Hallo.";<br>
				$unbreakable = <span style="font-weight: bold; color: blue;">hash</span>('sha512', $hash);<br><br>
				<span style="font-weight: bold; color: blue;">echo</span> $unbreakable;<br><br>
				Dan komt er te staan: <br>a58a7d0f91a3a56a89aaea014f11661e799ec97e8d14a7b716ea1d529626c74d15ff1983728e34baac0e2664b56ea0c32bad976fa1a58dd669998f6555675705
				<br><br>Zoals je ziet is het een heel lange code. Deze is <b>ONBREEEKBAAR!</b>
<br /><br />
<hr />
<br />if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') <br />
{<br />
&nbsp; &nbsp;&nbsp; &nbsp;echo 'This is a server using Windows!';<br />
} <br />
else <br />
{<br />
&nbsp; &nbsp;&nbsp; &nbsp;echo 'This is a server not using Windows!';<br>
}
<br /><br />
<hr /><br />    $path = "cache/avatarhead/heads";<br />
	if (filesize_r($path) >= '104857600')<br />
	{<br />
		&nbsp;&nbsp;&nbsp;&nbsp;echo "$path contains 10 mb or higher";<br />
	}<br /><br />
     
    function filesize_r($path){<br />
      if(!file_exists($path)) return 0;<br />
      if(is_file($path)) return filesize($path);<br />
      $ret = 0;<br />
      foreach(glob($path."/*") as $fn)<br />
        $ret += filesize_r($fn);<br />
      return $ret;<br />
    }<br />

			</span>
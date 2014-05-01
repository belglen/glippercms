 <?php
	global $_GET;
	class TemplateParser {
     var $errors = ''; //Hier komen de errors in
                var $getfile = false; //Komt nog...
                var $tpl = ''; //Komt nog...
                var $blockcontent = array(); //Komt nog...

    public function __construct($file) {
	$this->file = $file;
     if($this->file != "" && $this->file != false) { //Kijken of $file niet leeg is.
      if(!preg_match("#(.+?).tpl#si", $this->file)) { //Kijken of het bestand de exentie .tpl heeft
        $this->errors .= "<b>TemplateParser Error:</b> Het bestand moet de exentie .tpl hebben!<br />";
        }
        if(!file_exists($this->file)) { //Kijken of het bestand bestaat
        $this->errors .= "<b>TemplateParser Error:</b> het bestand ".$file." bestaat niet!<br />";
        }
        
    }
}
public function getfile() {
        if(file_exists($this->file)) { //Kijken of bestand bestaat
            $this->tpl = file_get_contents($this->file); //Inhoud verkrijgen
            $this->getfile = true; //Bestand is opgehaald
        }
}
     public function getBlock($blockname) {
    $regex = "#\[start-block ".$blockname."\](.+?)\[end-block ".$blockname."\]#s";
    preg_match($regex, $this->tpl, $matches); //Inhoud verkrijgen
    return $matches[1]; //Inhoud returnen
}
    public function newBlock($blockname, $content) {
        $this->blockcontent[$blockname] .= $this->getBlock($blockname); //Block inhoud ophalen
        
        foreach($content as $pattern=>$replacement){                        
$this->blockcontent[$blockname] = preg_replace("#\{".$pattern."\}#si", $replacement, $this->blockcontent[$blockname]);  //Inhoud in block veranden            
        }
        
        
    }
    public function set($pattern, $replacement) {
        if($this->getfile == false) { //Kijken of het bestand al gelezen is.
        $this->getfile(); //Zo niet, bestand inlezen.
        }
        $this->tpl = preg_replace("#\{".$pattern."\}#si", $replacement, $this->tpl); //{iets} wordt veranderd in iets.
    }
public function parse() {
      if($this->errors == '') { //Kijken of de errors leeg zijn
       if($this->getfile == false) { //Als het bestand nog niet gelezen is, laten lezen.
        $this->getfile();
        }
                  foreach($this->blockcontent as $blockname=>$block) {
            $regex = "#\[start-block ".$blockname."\](.+?)\[end-block ".$blockname."\]#s";
            $this->tpl = preg_replace($regex, $block, $this->tpl); //De inhoud aan de pagina toevoegen.
        }
                return $this->tpl; //De inhoud returnen
        }else{
            return $this->errors; //Als er errors zijn, deze returnen.
        }
    }

}
?> 
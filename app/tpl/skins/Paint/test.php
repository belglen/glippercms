<?php
$STH = mysql_query("SELECT * FROM users WHERE rank >= '5' ORDER BY rank DESC");

$doc = new XMLWriter();

$doc->openMemory();

$doc->setIndent(true);
$doc->setIndentString("    ");

$doc->startDocument('1.0', 'UTF-8');
$doc->startElement('staffs');
	while($row = mysql_fetch_object($STH)) 
	{  
		$doc->startElement('staff');
			$doc->writeElement('naam', $row->username);
			$doc->writeElement('rank', $row->rank);
		$doc->endElement();
	}  
$doc->endElement();
$fp = @fopen('staff.xml', 'w');
if (!$fp)
{
	exit;	
}
fwrite($fp, $doc->outputMemory(true));
fclose($fp);

$doc->flush();

$xml = simplexml_load_file("staff.xml");

echo $xml->staff[0]->naam;

// > <

$STH = mysql_query("SELECT dj.*, u.id, u.username FROM dj dj JOIN users u ON (dj.user_id = u.id) ORDER BY rank ASC");

$doc = new XMLWriter();

$doc->openMemory();

$doc->setIndent(true);
$doc->setIndentString("    ");

$doc->startDocument('1.0', 'UTF-8');
$doc->startElement('staffs');
	while($row->DJ = mysql_fetch_object($STH)) 
	{  
		$doc->startElement('DJ');
			$doc->writeElement('naam', $row->DJ->username);
			$doc->writeElement('rank', $row->DJ->rank);
		$doc->endElement();
	}  
$doc->endElement();
$fp = @fopen('dj.xml', 'w');
if (!$fp)
{
	exit;	
}
fwrite($fp, $doc->outputMemory(true));
fclose($fp);

$doc->flush();

$xml = simplexml_load_file("dj.xml");

echo $xml->DJ[0]->naam;

$result = mysql_query("select tag from user_tags LIMIT 20");

$tags = array();

while ($row = mysql_fetch_array($result)) {
    $row_tag_array = split(",", $row[0]);
    foreach ($row_tag_array as $newtag) {
    asort($row_tag_array);
        if (array_key_exists($newtag, $tags)) {
            if ($tags[$newtag] < 200) {
                $tags[$newtag] = $tags[$newtag] + 20;

            }
        }
        else {
            $tags[$newtag] = 100;
        }
    }
}

foreach ($tags as $tag => $size) {
    echo "<span style=\"font-size: $size%;\" href=\"?t=$tag\">$tag</span> ";

}
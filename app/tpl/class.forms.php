<?php

namespace Revolution;

if (!defined('IN_INDEX')) {
    die('Sorry, you cannot access this file.');
}

class forms implements iForms {

    public $error;

    final public function setData() {
        global $engine;
        foreach ($_POST as $key => $value) {
            if ($value != null) {
                $this->$key = $engine->secure($value);
            } else {
                $this->error = 'Please fill in all fields';
                return;
            }
        }
    }

    final public function unsetData() {
        global $template;
        foreach ($this as $key => $value) {
            unset($this->$key);
        }
    }

    final public function writeData($key) {
        global $template;
        echo $this->$key;
    }

    final public function outputError() {
        global $template;
        if (isset($this->error)) {
            echo "<div id='message'> " . $this->error . " </div>";
        }
    }

    /* Manage different pages */

    final public function getPageNews() {
        global $template, $engine;
		
        $dataa = mysql_query("SELECT id FROM cms_news ORDER BY id DESC LIMIT 1");
		$rol = mysql_fetch_assoc($dataa);
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_GET['id'] = $rol['id'];
        }
        $result = mysql_query("SELECT title, id FROM cms_news ORDER BY id DESC LIMIT 30");

        while ($news1 = mysql_fetch_array($result)) {
			$news_regeling = $news1['id']==$_GET['id']?'_hover':'';
            $template->setParams('newsList', '<a style="text-decoration: none;" href="index.php?url=news&id=' . $news1["id"] . '"><img src="/app/tpl/skins/Paint/images/icons/icon_right' . $news_regeling . '.png" style="margin-top: -5px;" /> <span style="margin-top: -50px;">' . $news1['title'] . '</span></a><br/>');
        }
        unset($result);
    }

    final public function getPageHome() {
        global $template, $engine;
        $a = 1;
        $data = mysql_query("SELECT title, id, published, shortstory, image FROM cms_news ORDER BY id DESC LIMIT 5");
        while ($news = mysql_fetch_array($data, MYSQL_ASSOC)) {
			$titel = (string)$news['title'];
			$titel = str_replace('`', "/", $titel);
            $template->setParams('newsTitle-' . $a, $titel);
            $template->setParams('facebook-' . $a, $news['facebook']);
            $template->setParams('newsID-' . $a, $news['id']);
            $template->setParams('newsDate-' . $a, date("d-m-y", $news['published']));
            $template->setParams('newsCaption-' . $a, $news['shortstory']);
            $template->setParams('newsIMG-' . $a, $news['image']);
            $a++;
        }
        unset($news);
        unset($data);
		
    }    final public function getPageIndex() {
        global $template, $engine;
        $a = 1;
        $data = mysql_query("SELECT title, id, published, facebook, shortstory, image FROM cms_news ORDER BY id DESC LIMIT 5");
        while ($news = mysql_fetch_array($data, MYSQL_ASSOC)) {
            $template->setParams('newsTitle1-' . $a, $news['title']);
            $template->setParams('facebook1-' . $a, $news['facebook']);
            $template->setParams('newsID1-' . $a, $news['id']);
            $template->setParams('newsDate-1' . $a, date("d-m-y", $news['published']));
            $template->setParams('newsCaption1-' . $a, $news['shortstory']);
            $template->setParams('newsIMG1-' . $a, $news['image']);
            $a++;
        }
        unset($news);
        unset($data);
    }
	
    final public function getPageBrief() {
        global $template, $engine;

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_GET['id'] = 13;
        }
        $result = mysql_query("SELECT title, id FROM cms_news WHERE id != '" . $engine->secure($_GET['id']) . "' ORDER BY id DESC");

        while ($news1 = mysql_fetch_array($result)) {
            $template->setParams('newsList', '<div id="darkArrowRight"></div> <a href="index.php?url=news&id=' . $news1["id"] . '">' . $news1['title'] . '</a><br/>');
        }
        $news = $engine->fetch_assoc("SELECT c.id, brief, u.id as uid, u.username, u.look, u.online, published FROM cms_news c left join users u ON (c.author=u.id) WHERE c.id = '" . $engine->secure($_GET['id']) . "' LIMIT 1");
        $count = mysql_result(mysql_query("SELECT COUNT(author) AS total FROM cms_news WHERE author=".$news['uid']), 0);
        $template->setParams('newsID', $news['id']);
        $template->setParams('newsTitle', $news['title']);
        $template->setParams('facebook', $news['facebook']);
        $template->setParams('newsContent', $news['longstory']);
        $template->setParams('newsAuthorId', $news['uid']);       
        $template->setParams('newsAuthor', $news['username']);       
        $template->setParams('newsLook', $news['look']);              
        $template->setParams('newsOnline', $news['online']==0?"offline":"online");       
		$template->setParams('newsCount', $count);
        $template->setParams('newsDate', date("d-m-y", $news['published']));
        unset($result);
        unset($news1);
        unset($news);
    }


}

?>  
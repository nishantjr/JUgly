<?php
echo "DROP DATABASE transmission_ng;\n";
echo "CREATE DATABASE transmission_ng;\n";
echo "USE transmission_ng;\n";
echo "\n";

$joomla = new mysqli("localhost", "root", "arch", "joomla");  
// Get all cats
$sql = "SELECT DISTINCT cat.title
	FROM `xaviertr_2011`.`jos_categories` as cat";
$result = $joomla->query($sql);
echo "CREATE TABLE categories(id serial primary key, title varchar(40));\n";

$count = 0;
$categories = array();
while($row = $result->fetch_assoc())
{
  $count++;
  $categories[$row["title"]] = $count;
  echo "INSERT INTO categories(title) values('".$row["title"]."');\n";
}

// Get all secs
$sql = "SELECT DISTINCT title
	FROM `xaviertr_2011`.`jos_sections`";
$result = $joomla->query($sql);
echo "\nCREATE TABLE sections(id serial primary key, title varchar(40));\n";
$count = 0;
$sections = array();
while($row = $result->fetch_assoc())
{
  $count++;
  $sections[$row["title"]] = $count;
  echo "INSERT INTO sections(title) values('".$row["title"]."');\n";
}

// Get all articles
function match_section($name, $text, $article)
{
  global $joomla;
  preg_match ('/\[tab\s*title\=\`'.$name.'\`\](.*)\[\/tab\]/msU', $text, &$intro);
  $article[$name] = $joomla->real_escape_string($intro[1]);
}
function match_data_entry($label, $text, $article)
{
  preg_match ('/\[tab\s*title\=\`'.$name.'\`\](.*)\[\/tab\]/msU', $text, $intro);
  $article[$name] = $intro[1];
}

$sql = "SELECT DISTINCT con.*, cat.title as cat_title, sec.title as sec_title
	FROM `xaviertr_2011`.`jos_content` as con
	JOIN `xaviertr_2011`.`jos_categories` as cat
	    ON cat.id = con.catid
	JOIN `xaviertr_2011`.`jos_sections` as sec
	    ON sec.id = cat.section";
$result = $joomla->query($sql);
echo "\nCREATE TABLE locations(id serial primary key,
			       name varchar(30),
			       floor varchar(10));\n";
$venues = array("Tutorial Room 1"=> "Ground",
		"Tutorial Room 2"=> "Ground",
		"IT Lab"=> "First",
		"Drawing Hall"=> "Second",
		"Seminar Hall"=> "Ground");
foreach($venues as $name=>$floor) {
  echo "INSERT INTO locations(name, floor) VALUES('$name', '$floor');\n";
}

echo "\nCREATE TABLE articles(id serial primary key, title varchar(100),
			      summary text, intro text, rules text, specification text,
			      category_id bigint unsigned,
			      section_id bigint unsigned,
			      location_id bigint unsigned,
			      event_head varchar(100),
			      coordinator varchar(100),
			      date varchar(100),
			      domain varchar(50),
			      prize_first varchar(50),
			      prize_second varchar(50),
			      prize_third varchar(50),
			      entry_fee varchar(100),
			      participants varchar(100),
			      image_1 varchar(20),
			      image_2 varchar(20),
			      image_3 varchar(20));\n";

while($row = $result->fetch_assoc()) {
  $text = preg_replace('/style\=\`.*\`/msU', " ", $row["introtext"]); //Remove all inline-styles
  $text = preg_replace('/\<\/?strong\>/msU', " ", $text);//Remove <strong>s
  $text = preg_replace('/<br\s*\/?>/i', "\n", $text);//Remove <br>s
  $text = preg_replace('/<\/?p\s*\/?>/i', "\n", $text);//Remove <p>s
  $text = strip_tags($text);//Remove <p>s
  $text = preg_replace('/\v+/m', "\n", $text);//Collapse multiple lines into a single

  preg_match ('/\[tab\s*title\=\`Introduction\`\]([^\!\?\.]*)/m', $text, &$intro);
  $row["summary"] = $joomla->real_escape_string($intro[1]);

  match_section("Introduction", $text, &$row);
  match_section("Specification", $text, &$row);
  match_section("Rule", $text, &$row);
  $sql = "SELECT";
  echo "INSERT INTO articles(title, summary, intro, specification, rules, category_id, section_id)
				     values('".$row["title"]."', 
					    '".$row["summary"]."', 
					    '".$row["Introduction"]."', 
					    '".$row["Specification"]."', 
					    '".$row["Rule"]."',
					     ".$categories[$row["cat_title"]].",
					     ".$sections[$row["sec_title"]].");\n";
}
<?php
$jsonFile = file_get_contents('http://localhost/test/json.php?key=bXcFG2pUi8BousQz3ydrgJOMn6vPmVYZKI4CRhkT');

//decode the data
$jsonFile_decoded = json_decode($jsonFile);

//create a new xml object
$xml = new SimpleXMLElement('<members/>');

//loop through the data, and add each record to the xml object
foreach($jsonFile_decoded AS $members){
	foreach($members AS $memberDetails){
		$member = $xml->addChild('member');
		$member->addChild('ID', $memberDetails[0]);
		$member->addChild('Guid', $memberDetails[1]);
		$member->addChild('Title', $memberDetails[2]);
		$member->addChild('Link', $memberDetails[3]);
		$member->addChild('location', $memberDetails[4]);
	}
}

//set header content type
Header('Content-type: text/xml');

//output the xml file
print($xml->asXML());
?>
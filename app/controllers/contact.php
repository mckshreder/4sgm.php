<?php

class Contact extends Controller
{
	public function index()
	{
		echo 'Contact/index';
	}

	public function phone()
	{
		echo 'Contact/phone';

		$feed = file_get_contents('http://www.4sgm.com/is-bin/INTERSHOP.enfinity/WFS/4sgm-Storefront-Site/en_US/-/USD/ViewParametricSearch-RSS;pgid=8uKCiKaqQORSR00pmU_Mlavu0000K_PVledH?SearchCategoryUUID=t_DAwGQTQFQAAAELiFM0E4U1&rsstitle=Baby+Items');
		$rss = new SimpleXmlElement($feed);
		foreach($rss->channel->item as $entry) {
		echo "<p><a href=$entry->link title = $entry->title > . $entry->title .</a></p>";
}
	}
}
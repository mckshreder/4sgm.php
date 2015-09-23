<?php

class Home extends Controller
{
		public function index($name = '', $rss = '')
		{
			$user = $this->model('User');
			$user->name = $name;
			$user->rss = $rss;
			$feed = file_get_contents('http://www.4sgm.com/is-bin/INTERSHOP.enfinity/WFS/4sgm-Storefront-Site/en_US/-/USD/ViewParametricSearch-RSS;pgid=8uKCiKaqQORSR00pmU_Mlavu0000K_PVledH?SearchCategoryUUID=t_DAwGQTQFQAAAELiFM0E4U1&rsstitle=Baby+Items');
			$rss = new SimpleXmlElement($feed);
			print_r($rss);

			// print_r($rss->channel->item);
			// $entry = $rss->channel;
			// foreach($rss->channel->item as $entry) {
			// echo "<p><a href=$entry->link title = $entry->title > . $entry->title .</a></p>";}

			// echo '<p>'. $entry->title .'</p>';}

			$this->view('home/index', ['name' => $user->name, 'rss' => $user->rss]);
		}

}
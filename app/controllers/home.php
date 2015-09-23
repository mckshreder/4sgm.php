<?php

class Home extends Controller
{
		public function index($name = '', $rss = '')
		{
			$user = $this->model('User');
			// $feed = file_get_contents('http://www.4sgm.com/is-bin/INTERSHOP.enfinity/WFS/4sgm-Storefront-Site/en_US/-/USD/ViewParametricSearch-RSS;pgid=8uKCiKaqQORSR00pmU_Mlavu0000K_PVledH?SearchCategoryUUID=t_DAwGQTQFQAAAELiFM0E4U1&rsstitle=Baby+Items');
			// $rss = new SimpleXmlElement($feed);
			$user->name = $name;
			// $user->rss = $rss;
			// $entry = $rss->channel;
		// echo "<p><a href=$entry->link title = $entry->title > . $entry->title .</a></p>";

		// echo '<p>'. $entry->title .'</p>';}

			$this->view('home/index', ['name' => $user->name, 'rss' => $user->rss]);
		}

}
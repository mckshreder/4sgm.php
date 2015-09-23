<?php

class App
{	

	protected $controller = 'home';

	protected $method = 'index';

	protected $params = [];



public function __construct()
	{
		// $feed = file_get_contents('http://www.4sgm.com/is-bin/INTERSHOP.enfinity/WFS/4sgm-Storefront-Site/en_US/-/USD/ViewParametricSearch-AdvancedSearch;pgid=8uKCiKaqQORSR00pmU_Mlavu0000K_PVledH?SearchCategoryUUID=t_DAwGQTQFQAAAELiFM0E4U1&rsstitle=Baby+Items/rss-feed/rss.xml');
		// $rss = new SimpleXmlElement($feed);

		// // $rss = $this->rssFeed();
		// print_r($rss);

		
		// echo $rss->channel->item;
		// foreach($rss->channel->item as $entry) {
		// 	echo "<p><a href=$entry->link title = $entry->title > . $entry->title .</a></p>";

		// 	echo '<p>'. $entry->title .'</p>';}


		$url = $this->parseUrl();

		if(file_exists('../app/controllers/' . $url[0] . '.php'))
		{
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/controllers/' . $this->controller . '.php';

		$this->controller = new $this->controller;


		if(isset($url[1]))
		{
			if(method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			} 
		}
		


		$this->params = $url ? array_values($url) : [];

		
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	public function parseUrl()
	{
		if(isset($_GET['url'])) 
		{
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	public function rssFeed()
	{
		// $feed = file_get_contents('http://www.4sgm.com/is-bin/INTERSHOP.enfinity/WFS/4sgm-Storefront-Site/en_US/-/USD/ViewParametricSearch-AdvancedSearch;pgid=8uKCiKaqQORSR00pmU_Mlavu0000K_PVledH?SearchCategoryUUID=t_DAwGQTQFQAAAELiFM0E4U1&rsstitle=Baby+Items/rss-feed/rss.xml');

		return $rss = new SimpleXmlElement($this->feed);
		
		
	}
}
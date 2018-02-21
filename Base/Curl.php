<?php 
namespace Base;
/**
 * @class Curl
 * 
 * @desc The idea of this classe it's to provide an oop implementation of the libcurl. Curl allows you to connect and communicate to many different types of servers
 * with many different types of protocols. 
 * 
 * @author Richard <richrjweb@yahoo.com.br>
 */
class Curl implements ICurl
{	
	protected $curlresource;
	protected $url;
	protected $output;	
	
	/**
	 * @method __construct
	 * @param String $url
	 */
	public function __construct($url) 
	{
		$this->curlresource = $this->curl_init();
		$this->url = $url;
	}
	
	/**
	 * @method curl_init()
	 * @desc Initialize a cURL session
	 */
	public function curl_init() 
	{
		return  $ch = curl_init(); 
	}
	
	/**
	 * @method curl_setopt 
	 * @desc curl_setopt — Set an option for a cURL transfer
	 * @param array $ArSetOpt
	 */
	public function curl_setopt($ArSetOpt = array())
	{	
		curl_setopt($this->curlresource,CURLOPT_URL, $this->url);
		curl_setopt($this->curlresource, CURLOPT_RETURNTRANSFER, 1);
		if (count ($ArSetOpt) > 0) {
			foreach ($ArSetOpt as $SetOpt) {			
				curl_setopt($this->curlresource, $SetOpt['option'], $SetOpt['boolvalue']);
			}
		}
	}
	
	/**
	 *@method getOutuput()
	 *
	 * @return It's depends, but usually if your are working with an rest api you'll get a json response.
	 */
	public function getOutput()
	{
		return $this->output = curl_exec($this->curlresource);
	}
	
	/**
	 * @method curl_close
	 */
	public function curl_close()
	{	
		return curl_close($this->curlresource);
	}
	
	/**
	 * @converJSonResponse
	 * 
	 * @param string $BoAssoc
	 * 
	 * @return Json
	 */
	public function convertJSonResponse($BoAssoc = null)
	{
		return json_decode($this->output, $BoAssoc);
	}
}
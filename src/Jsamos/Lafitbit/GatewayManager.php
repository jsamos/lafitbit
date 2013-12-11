<?php namespace Jsamos\Lafitbit;

use Fitbit\ApiGatewayFactory;

class GatewayManager
{   

    /**
    * gateways to manage
    * 
    * @var array gateways
    */
    protected $gateways;

    public function __construct(ApiGatewayFactory $factory, $gateways = array())
    {
        $this->factory = $factory;
        $this->gateways = $gateways;
    }

    /**
    * get a gateway
    *
    * @param string $name of gateway
    * @return string Fitbit\EndpointGateway
    */
    public function get($name)
    {    
        if (isset($this->gateways[$name])) return $this->gateways[$name];
        return $this->gateways[$name] = $this->make($name);
    }

    /**
    * make a gateway
    *
    * @param string $name
    * @return string Fitbit\EndpointGateway
    */
    public function make($name)
    {
        $method = 'get' . ucfirst($name) . 'Gateway';
        return $this->factory->$method();
    }

    /**
     * Dynamically pass methods to get.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return Fitbit\EndpointGateway
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array(array($this, 'get'), [$method]);   
    }

}
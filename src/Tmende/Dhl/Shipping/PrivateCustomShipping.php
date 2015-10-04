<?php namespace Tmende\Dhl\Shipping;

use Tmende\Dhl\Credentials\Credentials;
use Tmende\Dhl\Api\Shipping\Personal\ProductInfoFilterType as Filter;
use Tmende\Dhl\Shipping\PrivateCustomShippingRequestBuilder as RequestBuilder;

class PrivateCustomShipping {

	/**
     * @var Credentials
     */
    private $_credentials;

    /**
     * @var RequestBuilder
     */
    private $_requestBuilder;

    /**
     * Constructor
     *
     * @param Credentials $credentials - (Dependency injection) If not provided, a Credentials instance will be constructed.
     */
    public function __construct(Credentials $credentials = null) {
        if ( null === $credentials ) {
            // Create the Credentials
            $credentials = Credentials::getInstance();
        }
        $this->_credentials = $credentials;
        $this->_requestBuilder = new RequestBuilder($credentials);
    }

    /**
     * getProductInfo
     * This function queries information about available products and services.
     *
     * @param
     */
    public function getProductInfo(Array $properties = array()) {
    	$filter = new Filter($properties);
    	$response = $this->_requestBuilder->getProductInfo($filter);
    	var_dump($response);
    }

    /**
     * openShoppingCart
     * This function allows a new shopping basket session to be started.
     *
     * @param
     */
    public function openShoppingCart() {
    	$response = $this->_requestBuilder->ShoppingCartOpen();
    	var_dump($response);
    }

    /**
     * validateShoppingCart
     * This function validates the shopping basket.
     *
     * @param
     */
    public function validateShoppingCart() {
    	$response = $this->_requestBuilder->ShoppingCartValidate();
    	var_dump($response);
    }

    /**
     * getShoppingCartCheckoutViaPayment
     * This function allows the entire shipping document purchasing process to be integrated.
     *
     * @param
     */
    public function getShoppingCartCheckoutViaPayment() {
    	$response = $this->_requestBuilder->ShoppingCartCheckoutViaPayment();
    	var_dump($response);
    }

    /**
     * loadBuyedShoppingCart
     * This function allows read access to a shopping basket that has already been paid for.
     *
     * @param
     */
    public function loadBuyedShoppingCart() {
    	$response = $this->_requestBuilder->LoadBuyedShoppingCart();
    	var_dump($response);
    }
}
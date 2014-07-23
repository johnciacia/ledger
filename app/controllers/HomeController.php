<?php

class HomeController extends BaseController {

	public function __construct()
	{
		// this should be global somewhere
		$this->oauth = new Coinbase_OAuth(
			Config::get('settings.client_id'),
			Config::get('settings.client_secret'),
			Config::get('settings.redirect_uri')
		);

	}

	public function dashboard()
	{
		setlocale( LC_MONETARY, 'en_US' );

		$coinbase = Coinbase::withOauth( $this->oauth, Session::get('tokens') );

		$total_coins = 0;
		$total_cost = 0;
		foreach( $coinbase->getTransfers()->transfers as $t ) {
			if ( $t->type == 'Sell' ) {
				$total_coins = $total_coins - $t->btc->amount;
				$total_cost = $total_cost - $t->total->amount;
			} else {
				$total_coins = $total_coins + $t->btc->amount;
				$total_cost = $total_cost + $t->total->amount;
			}
		}

		$rate = $coinbase->get('/prices/spot_rate')->amount;

		return View::make( 'account.index', array(
			'transactions' => $coinbase->getTransactions(),
			'transfers' => $coinbase->getTransfers(),
			'balance' => $coinbase->getBalance(),
			'value' => $rate * $total_coins,
			'total_coins' => $total_coins,
			'total_cost' => $total_cost,
			'rate' => $rate,
			'profit' => ( $total_coins * $rate ) - $total_cost,
		) );
	}

	/**
	 *
	 */
	public function home()
	{
		return View::make( 'home', array(
			'url' => $this->oauth->createAuthorizeUrl( 'balance', 'transactions', 'transfers' )
		) );
	}
  
}

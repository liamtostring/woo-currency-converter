# Currency Converter for WooCommerce

Currency Converter for WooCommerce is a WordPress plugin that allows you to set a currency baseline per product and update exchange rates manually or via WooCommerce API.

## Features

- Set currency baseline per product.
- Update exchange rates manually or via WooCommerce API.
- Display prices in multiple currencies based on the set exchange rate.

## Installation

1. Download the latest release from the [releases page](link-to-releases).
2. Upload the plugin files to the `/wp-content/plugins/currency-converter-for-woocommerce` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

1. Set the currency baseline for each product from the product edit screen in the WordPress admin panel.
2. Update the exchange rate manually from the plugin settings page or via WooCommerce API.
3. Display prices in multiple currencies on the frontend based on the set exchange rate.

## Settings

- **Currency Baseline**: Set the currency baseline (USD or MXN) for each product.
- **Exchange Rate**: Manually update the exchange rate from the plugin settings page or via WooCommerce API.

## API Endpoint

- **Endpoint**: `/wp-json/myplugin/v1/update-exchange-rate`
- **Method**: POST
- **Parameters**: JSON body with the new exchange rate (`exchange_rate`)

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

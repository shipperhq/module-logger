# ShipperHQ Logger for Magento 2

ShipperHQ Logger provides advanced, granular logging for Magento 2. It gives merchants and developers visibility into ShipperHQ's behaviour at checkout, with graded log levels, per-module filtering, and a built-in admin panel log viewer.

---

## Features

- **Graded Log Levels**: Log at debug, info, warning, and critical levels to capture exactly the detail you need.
- **Per-Module Logging**: Enable or disable logging granularly per ShipperHQ extension or module.
- **Log File Output**: Write log entries to specified log files for easy access and integration with external monitoring tools.
- **Admin Log Viewer**: View log entries directly from the Magento 2 admin panel without needing server access.

---

## Installation

Install using composer, you can find full instructions in the [ShipperHQ documentation](https://docs.shipperhq.com/installing-magento-2-shipperhq-extension/).

---

## Requirements

- Magento 2.4.4+
  - Compatibility with earlier editions is possible but not maintained
  - Supports both Magento Opensource (Community) and Magento Commerce (Enterprise)
- A valid ShipperHQ account. [Sign up here](https://shipperhq.com/) for your 15-day free trial!

---

## Configuration

**If you don't have a ShipperHQ account**:
1. Sign up for a free 15-day trial at www.shipperhq.com
2. You can then follow the steps the basic configuration wizard will guide you through

**Enable and configure logging**:
1. **API Credentials**:
    - Log in to your ShipperHQ account.
    - Navigate to `Websites` and find your API key and generate an Authentication Code.
    - Paste the key and code into the plugin settings under `Stores > Configuration > Sales > Shipping Methods > ShipperHQ`.
    - Set the `Enabled` dropdown to `Yes`.
    - Save the store configuration settings.

2. **Logger Settings**:
    - Navigate to the ShipperHQ Logger configuration in your Magento admin panel.
    - Set the desired log level and enable logging for the modules you want to monitor.
    - You can find detailed setup guides in our [documentation](https://docs.shipperhq.com/).

3. **View Logs**:
    - Log entries can be viewed from the admin panel log viewer or from the configured log files on your server.

---

## Frequently Asked Questions

### 1. Do I need a ShipperHQ account to use this module?
Yes, an active ShipperHQ account is required to use this module.

### 2. Is there a free trial available for ShipperHQ?
Yes, ShipperHQ offers a free trial for new users. You can sign up for the trial on the [ShipperHQ website](https://shipperhq.com/) and explore the platform's features before committing to a subscription.

### 3. How do I troubleshoot missing log entries?
- Verify that the Logger module is enabled and the correct log level is configured.
- Ensure file write permissions are set correctly for the configured log file path.
- Check our extensive [documentation](https://docs.shipperhq.com/category/troubleshooting/) for troubleshooting tips.

### 4. Can I log only specific ShipperHQ modules?
Yes, logging can be enabled or disabled per module in the Logger configuration, allowing you to focus on the areas most relevant to your investigation.

---

## Support

For assistance, please visit our [Help Center](https://docs.shipperhq.com/) or contact ShipperHQ support at [support@shipperhq.com](mailto:support@shipperhq.com).

For alternative contact methods, please visit our [Contact Us](https://shipperhq.com/contact/) page.

---

## Contributing

Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

---

## License

See license files

---

## Copyright
Copyright (c) 2016 Zowta LLC (http://www.ShipperHQ.com)

YOURLS Remove The Share Function
================================

Remove the Share button and box that toggles the sharing options on the Admin page.

What it removes:

* The **Share** action button on every row of the admin links table
* The **Quick Share** box on the admin page (including after adding a new link) and on the bookmarklet page
* The **Share** tab on the link stats page (`/keyword+`)

Installation
------------

1. Create a folder such as `remove-share` in `/user/plugins/` and put `plugin.php` in it
   (or clone this repository there: `git clone https://github.com/seandrickson/YOURLS-Remove-the-Share-Function.git user/plugins/remove-share`).
2. Activate the plugin on the admin **Manage Plugins** page.

That's all there is to it.

Requirements
------------

* [YOURLS](https://yourls.org/) 1.7 or newer — tested against YOURLS 1.10.x (PHP 8.1+)

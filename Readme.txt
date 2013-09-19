=== Plugin Name ===
Contributors: gezimb
Donate link:
Tags: comments, spam
Requires at least: 3.0.1
Tested up to: 3.6.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows the user to insert a hook to WordPress and replace english version of the dates and translate them to their own language.

== Description ==
Allows the user to insert a hook to WordPress and replace english version of the dates and translate them to their own language.

It uses a modular function that takes as input 3 arguments:

1. Days
2. Months
3. Months (shorthand)

It then searches for the English versions and replaces them.

== Installation ==

1. Upload `date_translate.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Array-ize the days `<?php $days = (Sunday, Monday, ...) ?>`
4. Repeat procedure for months and shorthand (Jan, Feb, ...)
5. Finalize by hooking `<?php qnt_date_translate($days,$months,$months_shorthand)?>` - of course, replace array names with your own.

== Frequently Asked Questions ==

= Does the week begin with Sunday? =

Yes. Please arrange the array so your week begins in Sunday and ends in Saturday.

= No shorthand for days? =

There is no need, date formats take full day name and use shorthand for months.

== Changelog ==

= 1.0 =
* Change the language
=== Advanced Contact form 7 DB ===
Contributors: vsourz1td
Tags: contact form 7 db, advanced cf7 db, contact form 7 database, contact form db,  contact form 7, database, cf7db, save-contact-form, Save-Forms-Data, import-cf7, export-contact-data, view-cf7-entry
Requires at least: 4.0
Tested up to: 4.9.5
Stable tag: 1.4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Save all contact form 7 form submitted data to the database, View, Ordering, Change field labels and Import/Export data using CSV.

== Description ==
Plug and Play, No Confrontation is required after install and activated, you can see it in wp-admin.

Each and every submission of Contact Form 7 is stored in the database and manage easily using the default WordPress interface. There is a nice drop-down to select the form and view all form data for that particular form. you can filter by searching keywords or select a date range.
	
Attached files are stored in the /wp-content/uploads/advanced-cf7-upload directory and also download from wp-admin.


= Features =
* **Multisite compatible** to store individual site wise contact form data.
* Save Contact Form 7 form submitted data to the database.
* Display **all** created contact form 7 form list.
* Select Form name to see the entries.
* Keyword search for all the entries of selected form.
* **Date range filter** to filter specific date related entries easily.
* **Export all**, or only searched, filtered results with selected fields.
* Export data in **CSV**, **EXCEL** and **PDF** file.
* Display attachment download link.
* Given **advance pagination** on the listing screen so all the records are not loaded at once, to save resources.
* Given go to page functionality within pagination so view specific page related entries.
* **Enable or disable columns display**.
* **Drag and drop** to reorder columns once the entries are stored.
* Multiple select of records and selected records will be deleted or export in the sheet.
* Facility to update each record.
* Easy to update each field label name.
* Easy to setup **import functionality.**
* Facility to import form related entries from CSV file.

= Restrict IP address storage =
* Some of Countries have introduced a Law to don't store the user's IP addresses into the database, So we had given provision to Restrict IP address storage.

= How to Restrict IP address storage? =
1. Goto -> wp-content/themes/{active theme folder}/functions.php
2. Open the functions.php file and place the code **do_shortcode( '[cf7-db-display-ip]' );** at the end of the file.

= How to use? =
1. Install Plugin via WordPress Admin - Go to Admin > Plugins > Add New.
2. View form entries Go To Admin >> Advanced CF7 DB >> Select form name.
3. Import CSV file Go To Admin >> Import CSV >> Import CSV tab >> Select form name.

= Commercial Features =
We have also introduced new feature **Schedule Report.** This add-on is especially for the businesses that require daily, weekly or monthly reports for the data that are stored at **Advanced Contact form 7 DB.** **Schedule Report For Advanced CF7 DB** plugin will do the same and send the email as per schedule set(Daily, Monthly, Weekly or Yearly) with report attachment. You can download the plugin from <a target="_blank" href="https://codecanyon.net/item/schedule-report-for-advanced-cf7-db/21560647?s_rank=8">here</a>


**Need Support?** <mehul@vsourz.com>

== Installation ==

= Install via WordPress Admin =
1. Ready the zip file of the plugin
2. Go to Admin > Plugins > Add New
3. On the upper portion click the Upload link
4. Using the file upload field, upload the plugin zip file here and activate the plugin

= Install via FTP =
1. First, unzip the plugin file
2. Using FTP go to your server's wp-content/plugins directory
3. Upload the unzipped plugin here
4. Once finished login into your WP Admin and go to Admin > Plugins
5. Look for Advanced CF7 DB and activate it


== Frequently Asked Questions ==

= Can I use this plugin when contact form 7 not install or activate? =
No, without contact form this plugin is not worked.

= How can I import CSV sheet? =
First, you need to add CSV sheet related column name on Import CSV screen in the field setting tab and save values then import sheet on import CSV tab screen.

= Can I change the field name? =
No, You can change only field label name from Display settings screen.

= Any Difficulty to exported data in CSV? =
While exporting the data as CSV, the sheet needs to be opened with delimiter as "," comma separated else the sheet data will not be displayed properly. 

= What to do if advanced CF7 DB not work? =
If the plugin does not work on the website, contact our Support Team via following email address: <mehul@vsourz.com>.
If you think, that you found a bug in our plugin or have any question contact us at <mehul@vsourz.com>. Our support team will solve within 24 hours.

= Can I restrict the plugin from storing IP address of the user to contact form DB? =
Yes, you can strict the plugin for storing IP address of the user.

= How to restrict the plugin from storing IP address of the user to contact form DB? =
Restriction is simple, just code **do_shortcode( '[cf7-db-display-ip]' );** to be placed in theme folder functions.php. By placing the code the IP address of the user will not been stored. Step by step process is explained below :
- Goto -> wp-content/themes/{active theme folder}/functions.php
- Open the functions.php file and place the code **do_shortcode( '[cf7-db-display-ip]' );** at the end of the file.

== Screenshots ==

1. Display form related records.
2. Display Setting popup screen.
3. Edit information popup screen.
4. Setup import file fields.
5. Import CSV file.


== Changelog ==

= 1.4.0 =
* Export data in EXCEL & PDF file.
* IP address storage restriction.
* Mobile UI compatible
* **Schedule Report:** We have also introduced new feature **Schedule Report.**, now You can download our Commercial plugin from <a target="_blank" href="https://codecanyon.net/item/schedule-report-for-advanced-cf7-db/21560647?s_rank=8">here</a>

= 1.3.0 =
* Fixed issue related to the Contact Form tel field while editing the form data entry.
* Provision to change the number of records to be displayed in listing page from display setting option.
* Fixed issue related to redirection to the first page when a record is been updated from edit data popup.
* Compatible up to PHP 7.1

= 1.2.0 =
* Fix error related to PHP strings.

= 1.1.2 =
* Fix error related to PHP 7.1.

= 1.1.1 = 
* Made changes to resolve the issue of user feasibility when editing the form fields.
* Minor tweak related to export functionality and attachment download functionality.

= 1.1.0 = 
* Update Import Functionality.
* Fix CF7 Version related issue.

= 1.0.0 =
* Initial
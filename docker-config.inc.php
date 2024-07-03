<?php // -*-mode: PHP; coding:utf-8;-*-
namespace MRBS;

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 *
 *   NOTE: if you include or require other files from this file, for example
 *   to store your database details in a separate location, then you should
 *   use an absolute and not a relative pathname.
 **************************************************************************/

/**********
 * Timezone
 **********/

// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
// $timezone = $_ENV['MRBS_TIMEZONE'] ?? "Etc/UTC";

/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL
$dbsys = $_ENV['MRBS_DB_SYSTEM'] ?? 'mysql';
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$db_host = $_ENV['MRBS_DB_HOST'] ?? '172.17.0.1';
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
// $db_port = 1234;
// Database name:
$db_database = $_ENV['MRBS_DB_DATABASE'] ?? 'mrbs';
// Schema name.  This only applies to PostgreSQL and is only necessary if you have more
// than one schema in your database and also you are using the same MRBS table names in
// multiple schemas.
//$db_schema = "public";
// Database login user name:
$db_login = $_ENV['MRBS_DB_USER'] ?? 'mrbs';
// Database login password:
$db_password = $_ENV['MRBS_DB_PASSWORD'] ?? 'mrbs-password';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = $_ENV['MRBS_DB_TBL_PREFIX'] ?? 'mrbs_';
// Set $db_persist to TRUE to use PHP persistent (pooled) database connections.  Note
// that persistent connections are not recommended unless your system suffers significant
// performance problems without them.   They can cause problems with transactions and
// locks (see http://php.net/manual/en/features.persistent-connections.php) and although
// MRBS tries to avoid those problems, it is generally better not to use persistent
// connections if you can.
$db_persist = false;


/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */


$override_locale = "fi";

$disable_automatic_language_changing = true;

// Set this to a different language specifier to default to different
// language tokens. This must equate to a lang.* file in MRBS.
// e.g. use "fr" to use the translations in "lang.fr" as the default
// translations.  [NOTE: it is only necessary to change this if you
// have disabled automatic language changing above]
$default_language_tokens = "fi";

$timezone = "Europe/Helsinki";

$mrbs_admin = "Wille";
$mrbs_admin_email = "villeristimaki@gmail.com";
// NOTE:  there are more email addresses in $mail_settings below.    You can also give
// email addresses in the format 'Full Name <address>', for example:
// $mrbs_admin_email = 'Booking System <admin_email@your.org>';
// if the name section has any "peculiar" characters in it, you will need
// to put the name in double quotes, e.g.:
// $mrbs_admin_email = '"Bloggs, Joe" <admin_email@your.org>';

// The company name is mandatory.   It is used in the header and also for email notifications.
// The company logo, additional information and URL are all optional.

$mrbs_company = "RKS";   // This line must always be uncommented ($mrbs_company is used in various places)

// Uncomment this next line to use a logo instead of text for your organisation in the header
//$mrbs_company_logo = "your_logo.gif";    // name of your logo file.   This example assumes it is in the MRBS directory

// Uncomment this next line for supplementary information after your company name or logo.
// This can contain HTML, for example if you want to include a link.
//$mrbs_company_more_info = "You can put additional information here";  // e.g. "XYZ Department"

// Uncomment this next line to have a link to your organisation in the header
//$mrbs_company_url = "http://www.your_organisation.com/";

// This is to fix URL problems when using a proxy in the environment.
// If links inside MRBS or in email notifications appear broken, then specify here the URL of
// your MRBS root directory, as seen by the users. For example:
// $url_base =  "http://example.com/mrbs";
$theme = "default";


/******************
 * Display settings
 ******************/

// [These are all variables that control the appearance of pages and could in time
//  become per-user settings]

// Start of week: 0 for Sunday, 1 for Monday, etc.
$weekstarts = 1;

/**********************************************
 * Email settings
 **********************************************/

// BASIC SETTINGS
// --------------

// Set the email address of the From field. Default is 'admin_email@your.org'
$mail_settings['from'] = $_ENV['ADMIN_MAIL'];

// By default MRBS will send some emails (eg booking approval emails) as though they have come from
// the user, rather than the From address above.   However some email servers will not allow this in
// order to prevent email spoofing.   If this is the case then set this to true in order that the
// From address above is used for all emails.
$mail_settings['use_from_for_all_mail'] = true;

// By default MRBS will set a Reply-To address and use current user's email address.  Set this to
// false in order not to set a Reply-To address.
$mail_settings['use_reply_to'] = true;

// The address to be used for the ORGANIZER in an iCalendar event.   Do not make
// this email address the same as the admin email address or the recipients
// email address because on some mail systems, eg IBM Domino, the iCalendar email
// notification is silently discarded if the organizer's email address is the same
// as the recipient's.  On other systems you may get a "Meeting not found" message.
$mail_settings['organizer'] = 'varaus@rks.fi';

// Set the recipient email. Default is 'admin_email@your.org'. You can define
// more than one recipient like this "john@doe.com,scott@tiger.com"
$mail_settings['recipients'] = $_ENV['ADMIN_MAIL'];

// Set email address of the Carbon Copy field. Default is ''. You can define
// more than one recipient (see 'recipients')
$mail_settings['cc'] = '';

// Set to true if you want the cc addresses to be appended to the to line.
// (Some email servers are configured not to send emails if the cc or bcc
// fields are set)
$mail_settings['treat_cc_as_to'] = false;



// WHO TO EMAIL
// ------------
// The following settings determine who should be emailed when a booking is made,
// edited or deleted (though the latter two events depend on the "When" settings below).
// Set to true or false as required
// (Note:  the email addresses for the area and room administrators are set from the
// edit_area.php and edit_room.php pages in MRBS)
$mail_settings['admin_on_bookings']      = false;  // the addresses defined by $mail_settings['recipients'] below
$mail_settings['area_admin_on_bookings'] = false;  // the area administrator
$mail_settings['room_admin_on_bookings'] = false;  // the room administrator
$mail_settings['booker']                 = true;  // the person making the booking
$mail_settings['book_admin_on_approval'] = false;  // the booking administrator when booking approval is enabled
                                                   // (which is the MRBS admin, but this setting allows MRBS
                                                   // to be extended to have separate booking approvers)

// WHEN TO EMAIL
// -------------
// These settings determine when an email should be sent.
// Set to true or false as required
//
// (Note:  (a) the variables $mail_settings['admin_on_delete'] and
// $mail_settings['admin_all'], which were used in MRBS versions 1.4.5 and
// before are now deprecated.   They are still supported for reasons of backward
// compatibility, but they may be withdrawn in the future.  (b)  the default
// value of $mail_settings['on_new'] is true for compatibility with MRBS 1.4.5
// and before, where there was no explicit config setting, but mails were always sent
// for new bookings if there was somebody to send them to)

$mail_settings['on_new']    = false;   // when an entry is created
$mail_settings['on_change'] = false;  // when an entry is changed
$mail_settings['on_delete'] = false;  // when an entry is deleted

// It is also possible to allow all users or just admins to choose not to send an
// email when creating or editing a booking.  This can be useful if an inconsequential
// change is being made, or many bookings are being made at the beginning of a term or season.
$mail_settings['allow_no_mail']        = false;
$mail_settings['allow_admins_no_mail'] = false;  // Ignored if 'allow_no_mail' is true
$mail_settings['no_mail_default'] = false; // Default value for the 'no mail' checkbox.
                                           // true for checked (ie don't send mail),
                                           // false for unchecked (ie do send mail)


// WHAT TO EMAIL
// -------------
// These settings determine what should be included in the email
// Set to true or false as required
$mail_settings['details']   = false; // Set to true if you want full booking details;
                                     // otherwise you just get a link to the entry
$mail_settings['html']      = true; // Set to true if you want HTML mail
$mail_settings['icalendar'] = true; // Set to true to include iCalendar details
                                     // which can be imported into a calendar.  (Note:
                                     // iCalendar details will not be sent for areas
                                     // that use periods as there isn't a mapping between
                                     // periods and time of day, so the calendar would not
                                     // be able to import the booking)

// HOW TO EMAIL - LANGUAGE
// -----------------------------------------

// Set the language used for emails.  This should be in the form of a BCP 47
// language tag, eg 'en-GB'.  MRBS will use the language tag to set the locale
// for date and time formats, and find the best match in the lang.* files for
// translations.  For example, setting the admin_lang to 'en' will give English
// text and am/pm style times; setting it to 'en-GB' will give English text with
// 24-hour times.
$mail_settings['admin_lang'] = 'fi';   // Default is 'en'.


// HOW TO EMAIL - ADDRESSES
// ------------------------
// The email addresses of the MRBS administrator are set in the config file, and those of
// the room and area administrators are set though the edit_area.php and edit_room.php
// pages in MRBS.  But if you have set $mail_settings['booker'] above to true, MRBS will
// need the email addresses of ordinary users.   If you are using the "db"
// authentication method then MRBS will be able to get them from the users table.  But
// if you are using any other authentication scheme then the following settings allow
// you to specify a domain name that will be appended to the username to produce a
// valid email address (eg "@domain.com").  MRBS will add the '@' character for you.
$mail_settings['domain'] = '';
// If you use $mail_settings['domain'] above and the username returned by mrbs contains extra
// strings appended like the domain name ('username.domain'), you need to provide
// this extra string here so that it will be removed from the username.
$mail_settings['username_suffix'] = '';


// HOW TO EMAIL - BACKEND
// ----------------------
// Set the name of the backend used to transport your mails. Either 'mail',
// 'smtp', 'sendmail' or 'qmail'. Default is 'mail'.
$mail_settings['admin_backend'] = 'smtp';


/*******************
 * SMTP settings
 */

// These settings are only used with the "smtp" backend
$smtp_settings['host'] = $_ENV['SMTP_HOST'];  // SMTP server
$smtp_settings['port'] = $_ENV['SMTP_PORT'];           // SMTP port number
$smtp_settings['auth'] = true;        // Whether to use SMTP authentication
$smtp_settings['secure'] = 'tls';         // Encryption method: '', 'tls' or 'ssl' - note that 'tls' means TLS is used even if the SMTP
                                       // server doesn't advertise it. Conversely if you specify '' and the server advertises TLS, TLS
                                       // will be used, unless the 'disable_opportunistic_tls' configuration parameter shown below is
                                       // set to true.
$smtp_settings['username'] = $_ENV['SMTP_LOGIN'];       // Username (if using authentication)
$smtp_settings['password'] = $_ENV['SMTP_PASSWORD'];       // Password (if using authentication)

// The hostname to use in the Message-ID header and as default HELO string.
// If empty, PHPMailer attempts to find one with, in order,
// $_SERVER['SERVER_NAME'], gethostname(), php_uname('n'), or the value
// 'localhost.localdomain'.
$smtp_settings['hostname'] = '';

// The SMTP HELO/EHLO name used for the SMTP connection.
// Default is $smtp_settings['hostname']. If $smtp_settings['hostname'] is empty, PHPMailer attempts to find
// one with the same method described above for $smtp_settings['hostname'].
$smtp_settings['helo'] = '';

$smtp_settings['disable_opportunistic_tls'] = false; // Set this to true to disable
                                                     // opportunistic TLS
                                                     // https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#opportunistic-tls
// If you're having problems with sending email to a TLS-enabled SMTP server *which you trust* you can change the following
// settings, which reduce TLS security.
// See https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#php-56-certificate-verification-failure
$smtp_settings['ssl_verify_peer'] = true;
$smtp_settings['ssl_verify_peer_name'] = true;
$smtp_settings['ssl_allow_self_signed'] = false;

// EMAIL - MISCELLANEOUS
// ---------------------

// The filename to be used for iCalendar attachments.   Will always have the
// extension '.ics'
$mail_settings['ics_filename'] = "varaus";

// The rate at which emails can be sent out can be throttled if necessary in order to help
// keep within a mail server's limits.  Note that the throttle only applies to emails being
// sent by one user.  If another user is generating email notifications at the same time
// then these won't be taken into account.   Note also that if the email is going to n
// different addresses then this counts as n emails, as that is how most servers operate.
// A setting of zero disables throttling.
$mail_settings['rate_limit'] = 0;  // emails per second (float or int)

// Set this to true if you want MRBS to output debug information when you are sending email.
// If you are not getting emails it can be helpful by telling you (a) whether the mail functions
// are being called in the first place (b) whether there are addresses to send email to and (c)
// the result of the mail sending operation.
$mail_settings['debug'] = true;
// Where to send the debug output.  Can be 'browser' or 'log' (for the error_log)
$mail_settings['debug_output'] = 'log';

// Set this to true if you do not want any email sent, whatever the rest of the settings.
// This is a global setting that will override anything else.   Useful when testing MRBS.
$mail_settings['disabled'] = false;

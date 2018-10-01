<?php

/**
 * This file is part of the haveibeenpwned-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\HaveIBeenPwned\Tests\Fixtures;

use WBW\Library\HaveIBeenPwned\Helper\HaveIBeenPwnedHelper;

/**
 * Test fixtures.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\HaveIBeenPwned\Tests\Fixtures\App
 * @final
 */
final class TestFixtures {

    /**
     * Sample breach response.
     *
     * @var string
     */
    const SAMPLE_BREACH_RESPONSE = <<<'EOT'
[
{
"Name":"Adobe",
"Title":"Adobe",
"Domain":"adobe.com",
"BreachDate":"2013-10-04",
"AddedDate":"2013-12-04T00:00Z",
"ModifiedDate":"2013-12-04T00:00Z",
"PwnCount":152445165,
"Description":"In October 2013, 153 million Adobe accounts were breached with each containing an internal ID, username, email, <em>encrypted</em> password and a password hint in plain text. The password cryptography was poorly done and <a href=\"http://stricture-group.com/files/adobe-top100.txt\" target=\"_blank\" rel=\"noopener\">many were quickly resolved back to plain text</a>. The unencrypted hints also <a href=\"http://www.troyhunt.com/2013/11/adobe-credentials-and-serious.html\" target=\"_blank\" rel=\"noopener\">disclosed much about the passwords</a> adding further to the risk that hundreds of millions of Adobe customers already faced.",
"DataClasses":["Email addresses","Password hints","Passwords","Usernames"],
"IsVerified":True,
"IsSensitive":False,
"IsRetired":False,
"IsSpamList":False
},
{
"Name":"BattlefieldHeroes",
"Title":"Battlefield Heroes",
"Domain":"battlefieldheroes.com",
"BreachDate":"2011-06-26",
"AddedDate":"2014-01-23T13:10Z",
"ModifiedDate":"2014-01-23T13:10Z",
"PwnCount":530270,
"Description":"In June 2011 as part of a final breached data dump, the hacker collective &quot;LulzSec&quot; <a href=\"http://www.rockpapershotgun.com/2011/06/26/lulzsec-over-release-battlefield-heroes-data\" target=\"_blank\" rel=\"noopener\">obtained and released over half a million usernames and passwords from the game Battlefield Heroes</a>. The passwords were stored as MD5 hashes with no salt and many were easily converted back to their plain text versions.",
"DataClasses":["Passwords","Usernames"],
"IsVerified":True,
"IsSensitive":False,
"IsRetired":False,
"IsSpamList":False
}
]
EOT;

    /**
     * Sample data classes response.
     *
     * @var string
     */
    const SAMPLE_DATA_CLASS_RESPONSE = <<< 'EOT'
["Email addresses", "Password hints", "Passwords", "Usernames"]
EOT;

    /**
     * Sample paste response.
     *
     * @var string
     */
    const SAMPLE_PASTE_RESPONSE = <<< 'EOT'
[
{
"Source":"Pastebin",
"Id":"8Q0BvKD8",
"Title":"syslog",
"Date":"2014-03-04T19:14:54Z",
"EmailCount":139
},
{
"Source":"Pastie",
"Id":"7152479",
"Date":"2013-03-28T16:51:10Z",
"EmailCount":30
}
]
EOT;

    /**
     * Sample range response.
     *
     * @var string
     */
    const SAMPLE_RANGE_RESPONSE = <<< 'EOT'
0018A45C4D1DEF81644B54AB7F969B88D65:1
00D4F6E8FA6EECAD2A3AA415EEC418D38EC:2
011053FD0102E94D6AE2F8B83D76FAF94F6:1
012A7CA357541F0AC487871FEEC1891C49C:2
0136E006E24E7D152139815FB0FC6A50B15:2
EOT;

    /**
     * Get a sample breach response.
     *
     * @return array Returns the sample breach response.
     */
    public static function getSampleBreachResponse() {

        // Clean the response.
        $cleanResponse = HaveIBeenPwnedHelper::cleanResponse(self::SAMPLE_BREACH_RESPONSE);

        // Return the response.
        return json_decode($cleanResponse, true);
    }

    /**
     * Get a sample paste response.
     *
     * @return array Returns the sample paste response.
     */
    public static function getSamplePasteResponse() {
        return json_decode(self::SAMPLE_PASTE_RESPONSE, true);
    }

}

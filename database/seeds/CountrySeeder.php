<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



class CountrySeeder extends Seeder {

    public function run() {
        DB::table('countries')->delete();
        $countries = array(
            array(
                'id' => 1,
                'code' => 'US',
                'country' => 'United States'
            ),
            array(
                'id' => 2,
                'code' => 'CA',
                'country' => 'Canada'
            ),
            array(
                'id' => 3,
                'code' => 'AF',
                'country' => 'Afghanistan'
            ),
            array(
                'id' => 4,
                'code' => 'AL',
                'country' => 'Albania'
            ),
            array(
                'id' => 5,
                'code' => 'DZ',
                'country' => 'Algeria'
            ),
            array(
                'id' => 6,
                'code' => 'DS',
                'country' => 'American Samoa'
            ),
            array(
                'id' => 7,
                'code' => 'AD',
                'country' => 'Andorra'
            ),
            array(
                'id' => 8,
                'code' => 'AO',
                'country' => 'Angola'
            ),
            array(
                'id' => 9,
                'code' => 'AI',
                'country' => 'Anguilla'
            ),
            array(
                'id' => 10,
                'code' => 'AQ',
                'country' => 'Antarctica'
            ),
            array(
                'id' => 11,
                'code' => 'AG',
                'country' => 'Antigua and/or Barbuda'
            ),
            array(
                'id' => 12,
                'code' => 'AR',
                'country' => 'Argentina'
            ),
            array(
                'id' => 13,
                'code' => 'AM',
                'country' => 'Armenia'
            ),
            array(
                'id' => 14,
                'code' => 'AW',
                'country' => 'Aruba'
            ),
            array(
                'id' => 15,
                'code' => 'AU',
                'country' => 'Australia'
            ),
            array(
                'id' => 16,
                'code' => 'AT',
                'country' => 'Austria'
            ),
            array(
                'id' => 17,
                'code' => 'AZ',
                'country' => 'Azerbaijan'
            ),
            array(
                'id' => 18,
                'code' => 'BS',
                'country' => 'Bahamas'
            ),
            array(
                'id' => 19,
                'code' => 'BH',
                'country' => 'Bahrain'
            ),
            array(
                'id' => 20,
                'code' => 'BD',
                'country' => 'Bangladesh'
            ),
            array(
                'id' => 21,
                'code' => 'BB',
                'country' => 'Barbados'
            ),
            array(
                'id' => 22,
                'code' => 'BY',
                'country' => 'Belarus'
            ),
            array(
                'id' => 23,
                'code' => 'BE',
                'country' => 'Belgium'
            ),
            array(
                'id' => 24,
                'code' => 'BZ',
                'country' => 'Belize'
            ),
            array(
                'id' => 25,
                'code' => 'BJ',
                'country' => 'Benin'
            ),
            array(
                'id' => 26,
                'code' => 'BM',
                'country' => 'Bermuda'
            ),
            array(
                'id' => 27,
                'code' => 'BT',
                'country' => 'Bhutan'
            ),
            array(
                'id' => 28,
                'code' => 'BO',
                'country' => 'Bolivia'
            ),
            array(
                'id' => 29,
                'code' => 'BA',
                'country' => 'Bosnia and Herzegovina'
            ),
            array(
                'id' => 30,
                'code' => 'BW',
                'country' => 'Botswana'
            ),
            array(
                'id' => 31,
                'code' => 'BV',
                'country' => 'Bouvet Island'
            ),
            array(
                'id' => 32,
                'code' => 'BR',
                'country' => 'Brazil'
            ),
            array(
                'id' => 33,
                'code' => 'IO',
                'country' => 'British lndian Ocean Territory'
            ),
            array(
                'id' => 34,
                'code' => 'BN',
                'country' => 'Brunei Darussalam'
            ),
            array(
                'id' => 35,
                'code' => 'BG',
                'country' => 'Bulgaria'
            ),
            array(
                'id' => 36,
                'code' => 'BF',
                'country' => 'Burkina Faso'
            ),
            array(
                'id' => 37,
                'code' => 'BI',
                'country' => 'Burundi'
            ),
            array(
                'id' => 38,
                'code' => 'KH',
                'country' => 'Cambodia'
            ),
            array(
                'id' => 39,
                'code' => 'CM',
                'country' => 'Cameroon'
            ),
            array(
                'id' => 40,
                'code' => 'CV',
                'country' => 'Cape Verde'
            ),
            array(
                'id' => 41,
                'code' => 'KY',
                'country' => 'Cayman Islands'
            ),
            array(
                'id' => 42,
                'code' => 'CF',
                'country' => 'Central African Republic'
            ),
            array(
                'id' => 43,
                'code' => 'TD',
                'country' => 'Chad'
            ),
            array(
                'id' => 44,
                'code' => 'CL',
                'country' => 'Chile'
            ),
            array(
                'id' => 45,
                'code' => 'CN',
                'country' => 'China'
            ),
            array(
                'id' => 46,
                'code' => 'CX',
                'country' => 'Christmas Island'
            ),
            array(
                'id' => 47,
                'code' => 'CC',
                'country' => 'Cocos (Keeling) Islands'
            ),
            array(
                'id' => 48,
                'code' => 'CO',
                'country' => 'Colombia'
            ),
            array(
                'id' => 49,
                'code' => 'KM',
                'country' => 'Comoros'
            ),
            array(
                'id' => 50,
                'code' => 'CG',
                'country' => 'Congo'
            ),
            array(
                'id' => 51,
                'code' => 'CK',
                'country' => 'Cook Islands'
            ),
            array(
                'id' => 52,
                'code' => 'CR',
                'country' => 'Costa Rica'
            ),
            array(
                'id' => 53,
                'code' => 'HR',
                'country' => 'Croatia (Hrvatska)'
            ),
            array(
                'id' => 54,
                'code' => 'CU',
                'country' => 'Cuba'
            ),
            array(
                'id' => 55,
                'code' => 'CY',
                'country' => 'Cyprus'
            ),
            array(
                'id' => 56,
                'code' => 'CZ',
                'country' => 'Czech Republic'
            ),
            array(
                'id' => 57,
                'code' => 'DK',
                'country' => 'Denmark'
            ),
            array(
                'id' => 58,
                'code' => 'DJ',
                'country' => 'Djibouti'
            ),
            array(
                'id' => 59,
                'code' => 'DM',
                'country' => 'Dominica'
            ),
            array(
                'id' => 60,
                'code' => 'DO',
                'country' => 'Dominican Republic'
            ),
            array(
                'id' => 61,
                'code' => 'TP',
                'country' => 'East Timor'
            ),
            array(
                'id' => 62,
                'code' => 'EC',
                'country' => 'Ecudaor'
            ),
            array(
                'id' => 63,
                'code' => 'EG',
                'country' => 'Egypt'
            ),
            array(
                'id' => 64,
                'code' => 'SV',
                'country' => 'El Salvador'
            ),
            array(
                'id' => 65,
                'code' => 'GQ',
                'country' => 'Equatorial Guinea'
            ),
            array(
                'id' => 66,
                'code' => 'ER',
                'country' => 'Eritrea'
            ),
            array(
                'id' => 67,
                'code' => 'EE',
                'country' => 'Estonia'
            ),
            array(
                'id' => 68,
                'code' => 'ET',
                'country' => 'Ethiopia'
            ),
            array(
                'id' => 69,
                'code' => 'FK',
                'country' => 'Falkland Islands (Malvinas)'
            ),
            array(
                'id' => 70,
                'code' => 'FO',
                'country' => 'Faroe Islands'
            ),
            array(
                'id' => 71,
                'code' => 'FJ',
                'country' => 'Fiji'
            ),
            array(
                'id' => 72,
                'code' => 'FI',
                'country' => 'Finland'
            ),
            array(
                'id' => 73,
                'code' => 'FR',
                'country' => 'France'
            ),
            array(
                'id' => 74,
                'code' => 'FX',
                'country' => 'France, Metropolitan'
            ),
            array(
                'id' => 75,
                'code' => 'GF',
                'country' => 'French Guiana'
            ),
            array(
                'id' => 76,
                'code' => 'PF',
                'country' => 'French Polynesia'
            ),
            array(
                'id' => 77,
                'code' => 'TF',
                'country' => 'French Southern Territories'
            ),
            array(
                'id' => 78,
                'code' => 'GA',
                'country' => 'Gabon'
            ),
            array(
                'id' => 79,
                'code' => 'GM',
                'country' => 'Gambia'
            ),
            array(
                'id' => 80,
                'code' => 'GE',
                'country' => 'Georgia'
            ),
            array(
                'id' => 81,
                'code' => 'DE',
                'country' => 'Germany'
            ),
            array(
                'id' => 82,
                'code' => 'GH',
                'country' => 'Ghana'
            ),
            array(
                'id' => 83,
                'code' => 'GI',
                'country' => 'Gibraltar'
            ),
            array(
                'id' => 84,
                'code' => 'GR',
                'country' => 'Greece'
            ),
            array(
                'id' => 85,
                'code' => 'GL',
                'country' => 'Greenland'
            ),
            array(
                'id' => 86,
                'code' => 'GD',
                'country' => 'Grenada'
            ),
            array(
                'id' => 87,
                'code' => 'GP',
                'country' => 'Guadeloupe'
            ),
            array(
                'id' => 88,
                'code' => 'GU',
                'country' => 'Guam'
            ),
            array(
                'id' => 89,
                'code' => 'GT',
                'country' => 'Guatemala'
            ),
            array(
                'id' => 90,
                'code' => 'GN',
                'country' => 'Guinea'
            ),
            array(
                'id' => 91,
                'code' => 'GW',
                'country' => 'Guinea-Bissau'
            ),
            array(
                'id' => 92,
                'code' => 'GY',
                'country' => 'Guyana'
            ),
            array(
                'id' => 93,
                'code' => 'HT',
                'country' => 'Haiti'
            ),
            array(
                'id' => 94,
                'code' => 'HM',
                'country' => 'Heard and Mc Donald Islands'
            ),
            array(
                'id' => 95,
                'code' => 'HN',
                'country' => 'Honduras'
            ),
            array(
                'id' => 96,
                'code' => 'HK',
                'country' => 'Hong Kong'
            ),
            array(
                'id' => 97,
                'code' => 'HU',
                'country' => 'Hungary'
            ),
            array(
                'id' => 98,
                'code' => 'IS',
                'country' => 'Iceland'
            ),
            array(
                'id' => 99,
                'code' => 'IN',
                'country' => 'India'
            ),
            array(
                'id' => 100,
                'code' => 'ID',
                'country' => 'Indonesia'
            ),
            array(
                'id' => 101,
                'code' => 'IR',
                'country' => 'Iran (Islamic Republic of)'
            ),
            array(
                'id' => 102,
                'code' => 'IQ',
                'country' => 'Iraq'
            ),
            array(
                'id' => 103,
                'code' => 'IE',
                'country' => 'Ireland'
            ),
            array(
                'id' => 104,
                'code' => 'IL',
                'country' => 'Israel'
            ),
            array(
                'id' => 105,
                'code' => 'IT',
                'country' => 'Italy'
            ),
            array(
                'id' => 106,
                'code' => 'CI',
                'country' => 'Ivory Coast'
            ),
            array(
                'id' => 107,
                'code' => 'JM',
                'country' => 'Jamaica'
            ),
            array(
                'id' => 108,
                'code' => 'JP',
                'country' => 'Japan'
            ),
            array(
                'id' => 109,
                'code' => 'JO',
                'country' => 'Jordan'
            ),
            array(
                'id' => 110,
                'code' => 'KZ',
                'country' => 'Kazakhstan'
            ),
            array(
                'id' => 111,
                'code' => 'KE',
                'country' => 'Kenya'
            ),
            array(
                'id' => 112,
                'code' => 'KI',
                'country' => 'Kiribati'
            ),
            array(
                'id' => 113,
                'code' => 'KP',
                'country' => 'Korea, Democratic People\'s Republic of'
            ),
            array(
                'id' => 114,
                'code' => 'KR',
                'country' => 'Korea, Republic of'
            ),
            array(
                'id' => 115,
                'code' => 'KW',
                'country' => 'Kuwait'
            ),
            array(
                'id' => 116,
                'code' => 'KG',
                'country' => 'Kyrgyzstan'
            ),
            array(
                'id' => 117,
                'code' => 'LA',
                'country' => 'Lao People\'s Democratic Republic'
            ),
            array(
                'id' => 118,
                'code' => 'LV',
                'country' => 'Latvia'
            ),
            array(
                'id' => 119,
                'code' => 'LB',
                'country' => 'Lebanon'
            ),
            array(
                'id' => 120,
                'code' => 'LS',
                'country' => 'Lesotho'
            ),
            array(
                'id' => 121,
                'code' => 'LR',
                'country' => 'Liberia'
            ),
            array(
                'id' => 122,
                'code' => 'LY',
                'country' => 'Libyan Arab Jamahiriya'
            ),
            array(
                'id' => 123,
                'code' => 'LI',
                'country' => 'Liechtenstein'
            ),
            array(
                'id' => 124,
                'code' => 'LT',
                'country' => 'Lithuania'
            ),
            array(
                'id' => 125,
                'code' => 'LU',
                'country' => 'Luxembourg'
            ),
            array(
                'id' => 126,
                'code' => 'MO',
                'country' => 'Macau'
            ),
            array(
                'id' => 127,
                'code' => 'MK',
                'country' => 'Macedonia'
            ),
            array(
                'id' => 128,
                'code' => 'MG',
                'country' => 'Madagascar'
            ),
            array(
                'id' => 129,
                'code' => 'MW',
                'country' => 'Malawi'
            ),
            array(
                'id' => 130,
                'code' => 'MY',
                'country' => 'Malaysia'
            ),
            array(
                'id' => 131,
                'code' => 'MV',
                'country' => 'Maldives'
            ),
            array(
                'id' => 132,
                'code' => 'ML',
                'country' => 'Mali'
            ),
            array(
                'id' => 133,
                'code' => 'MT',
                'country' => 'Malta'
            ),
            array(
                'id' => 134,
                'code' => 'MH',
                'country' => 'Marshall Islands'
            ),
            array(
                'id' => 135,
                'code' => 'MQ',
                'country' => 'Martinique'
            ),
            array(
                'id' => 136,
                'code' => 'MR',
                'country' => 'Mauritania'
            ),
            array(
                'id' => 137,
                'code' => 'MU',
                'country' => 'Mauritius'
            ),
            array(
                'id' => 138,
                'code' => 'TY',
                'country' => 'Mayotte'
            ),
            array(
                'id' => 139,
                'code' => 'MX',
                'country' => 'Mexico'
            ),
            array(
                'id' => 140,
                'code' => 'FM',
                'country' => 'Micronesia, Federated States of'
            ),
            array(
                'id' => 141,
                'code' => 'MD',
                'country' => 'Moldova, Republic of'
            ),
            array(
                'id' => 142,
                'code' => 'MC',
                'country' => 'Monaco'
            ),
            array(
                'id' => 143,
                'code' => 'MN',
                'country' => 'Mongolia'
            ),
            array(
                'id' => 144,
                'code' => 'MS',
                'country' => 'Montserrat'
            ),
            array(
                'id' => 145,
                'code' => 'MA',
                'country' => 'Morocco'
            ),
            array(
                'id' => 146,
                'code' => 'MZ',
                'country' => 'Mozambique'
            ),
            array(
                'id' => 147,
                'code' => 'MM',
                'country' => 'Myanmar'
            ),
            array(
                'id' => 148,
                'code' => 'NA',
                'country' => 'Namibia'
            ),
            array(
                'id' => 149,
                'code' => 'NR',
                'country' => 'Nauru'
            ),
            array(
                'id' => 150,
                'code' => 'NP',
                'country' => 'Nepal'
            ),
            array(
                'id' => 151,
                'code' => 'NL',
                'country' => 'Netherlands'
            ),
            array(
                'id' => 152,
                'code' => 'AN',
                'country' => 'Netherlands Antilles'
            ),
            array(
                'id' => 153,
                'code' => 'NC',
                'country' => 'New Caledonia'
            ),
            array(
                'id' => 154,
                'code' => 'NZ',
                'country' => 'New Zealand'
            ),
            array(
                'id' => 155,
                'code' => 'NI',
                'country' => 'Nicaragua'
            ),
            array(
                'id' => 156,
                'code' => 'NE',
                'country' => 'Niger'
            ),
            array(
                'id' => 157,
                'code' => 'NG',
                'country' => 'Nigeria'
            ),
            array(
                'id' => 158,
                'code' => 'NU',
                'country' => 'Niue'
            ),
            array(
                'id' => 159,
                'code' => 'NF',
                'country' => 'Norfork Island'
            ),
            array(
                'id' => 160,
                'code' => 'MP',
                'country' => 'Northern Mariana Islands'
            ),
            array(
                'id' => 161,
                'code' => 'NO',
                'country' => 'Norway'
            ),
            array(
                'id' => 162,
                'code' => 'OM',
                'country' => 'Oman'
            ),
            array(
                'id' => 163,
                'code' => 'PK',
                'country' => 'Pakistan'
            ),
            array(
                'id' => 164,
                'code' => 'PW',
                'country' => 'Palau'
            ),
            array(
                'id' => 165,
                'code' => 'PA',
                'country' => 'Panama'
            ),
            array(
                'id' => 166,
                'code' => 'PG',
                'country' => 'Papua New Guinea'
            ),
            array(
                'id' => 167,
                'code' => 'PY',
                'country' => 'Paraguay'
            ),
            array(
                'id' => 168,
                'code' => 'PE',
                'country' => 'Peru'
            ),
            array(
                'id' => 169,
                'code' => 'PH',
                'country' => 'Philippines'
            ),
            array(
                'id' => 170,
                'code' => 'PN',
                'country' => 'Pitcairn'
            ),
            array(
                'id' => 171,
                'code' => 'PL',
                'country' => 'Poland'
            ),
            array(
                'id' => 172,
                'code' => 'PT',
                'country' => 'Portugal'
            ),
            array(
                'id' => 173,
                'code' => 'PR',
                'country' => 'Puerto Rico'
            ),
            array(
                'id' => 174,
                'code' => 'QA',
                'country' => 'Qatar'
            ),
            array(
                'id' => 175,
                'code' => 'RE',
                'country' => 'Reunion'
            ),
            array(
                'id' => 176,
                'code' => 'RO',
                'country' => 'Romania'
            ),
            array(
                'id' => 177,
                'code' => 'RU',
                'country' => 'Russian Federation'
            ),
            array(
                'id' => 178,
                'code' => 'RW',
                'country' => 'Rwanda'
            ),
            array(
                'id' => 179,
                'code' => 'KN',
                'country' => 'Saint Kitts and Nevis'
            ),
            array(
                'id' => 180,
                'code' => 'LC',
                'country' => 'Saint Lucia'
            ),
            array(
                'id' => 181,
                'code' => 'VC',
                'country' => 'Saint Vincent and the Grenadines'
            ),
            array(
                'id' => 182,
                'code' => 'WS',
                'country' => 'Samoa'
            ),
            array(
                'id' => 183,
                'code' => 'SM',
                'country' => 'San Marino'
            ),
            array(
                'id' => 184,
                'code' => 'ST',
                'country' => 'Sao Tome and Principe'
            ),
            array(
                'id' => 185,
                'code' => 'SA',
                'country' => 'Saudi Arabia'
            ),
            array(
                'id' => 186,
                'code' => 'SN',
                'country' => 'Senegal'
            ),
            array(
                'id' => 187,
                'code' => 'SC',
                'country' => 'Seychelles'
            ),
            array(
                'id' => 188,
                'code' => 'SL',
                'country' => 'Sierra Leone'
            ),
            array(
                'id' => 189,
                'code' => 'SG',
                'country' => 'Singapore'
            ),
            array(
                'id' => 190,
                'code' => 'SK',
                'country' => 'Slovakia'
            ),
            array(
                'id' => 191,
                'code' => 'SI',
                'country' => 'Slovenia'
            ),
            array(
                'id' => 192,
                'code' => 'SB',
                'country' => 'Solomon Islands'
            ),
            array(
                'id' => 193,
                'code' => 'SO',
                'country' => 'Somalia'
            ),
            array(
                'id' => 194,
                'code' => 'ZA',
                'country' => 'South Africa'
            ),
            array(
                'id' => 195,
                'code' => 'GS',
                'country' => 'South Georgia South Sandwich Islands'
            ),
            array(
                'id' => 196,
                'code' => 'ES',
                'country' => 'Spain'
            ),
            array(
                'id' => 197,
                'code' => 'LK',
                'country' => 'Sri Lanka'
            ),
            array(
                'id' => 198,
                'code' => 'SH',
                'country' => 'St. Helena'
            ),
            array(
                'id' => 199,
                'code' => 'PM',
                'country' => 'St. Pierre and Miquelon'
            ),
            array(
                'id' => 200,
                'code' => 'SD',
                'country' => 'Sudan'
            ),
            array(
                'id' => 201,
                'code' => 'SR',
                'country' => 'Suricountry'
            ),
            array(
                'id' => 202,
                'code' => 'SJ',
                'country' => 'Svalbarn and Jan Mayen Islands'
            ),
            array(
                'id' => 203,
                'code' => 'SZ',
                'country' => 'Swaziland'
            ),
            array(
                'id' => 204,
                'code' => 'SE',
                'country' => 'Sweden'
            ),
            array(
                'id' => 205,
                'code' => 'CH',
                'country' => 'Switzerland'
            ),
            array(
                'id' => 206,
                'code' => 'SY',
                'country' => 'Syrian Arab Republic'
            ),
            array(
                'id' => 207,
                'code' => 'TW',
                'country' => 'Taiwan'
            ),
            array(
                'id' => 208,
                'code' => 'TJ',
                'country' => 'Tajikistan'
            ),
            array(
                'id' => 209,
                'code' => 'TZ',
                'country' => 'Tanzania, United Republic of'
            ),
            array(
                'id' => 210,
                'code' => 'TH',
                'country' => 'Thailand'
            ),
            array(
                'id' => 211,
                'code' => 'TG',
                'country' => 'Togo'
            ),
            array(
                'id' => 212,
                'code' => 'TK',
                'country' => 'Tokelau'
            ),
            array(
                'id' => 213,
                'code' => 'TO',
                'country' => 'Tonga'
            ),
            array(
                'id' => 214,
                'code' => 'TT',
                'country' => 'Trinidad and Tobago'
            ),
            array(
                'id' => 215,
                'code' => 'TN',
                'country' => 'Tunisia'
            ),
            array(
                'id' => 216,
                'code' => 'TR',
                'country' => 'Turkey'
            ),
            array(
                'id' => 217,
                'code' => 'TM',
                'country' => 'Turkmenistan'
            ),
            array(
                'id' => 218,
                'code' => 'TC',
                'country' => 'Turks and Caicos Islands'
            ),
            array(
                'id' => 219,
                'code' => 'TV',
                'country' => 'Tuvalu'
            ),
            array(
                'id' => 220,
                'code' => 'UG',
                'country' => 'Uganda'
            ),
            array(
                'id' => 221,
                'code' => 'UA',
                'country' => 'Ukraine'
            ),
            array(
                'id' => 222,
                'code' => 'AE',
                'country' => 'United Arab Emirates'
            ),
            array(
                'id' => 223,
                'code' => 'GB',
                'country' => 'United Kingdom'
            ),
            array(
                'id' => 224,
                'code' => 'UM',
                'country' => 'United States minor outlying islands'
            ),
            array(
                'id' => 225,
                'code' => 'UY',
                'country' => 'Uruguay'
            ),
            array(
                'id' => 226,
                'code' => 'UZ',
                'country' => 'Uzbekistan'
            ),
            array(
                'id' => 227,
                'code' => 'VU',
                'country' => 'Vanuatu'
            ),
            array(
                'id' => 228,
                'code' => 'VA',
                'country' => 'Vatican City State'
            ),
            array(
                'id' => 229,
                'code' => 'VE',
                'country' => 'Venezuela'
            ),
            array(
                'id' => 230,
                'code' => 'VN',
                'country' => 'Vietnam'
            ),
            array(
                'id' => 231,
                'code' => 'VG',
                'country' => 'Virigan Islands (British)'
            ),
            array(
                'id' => 232,
                'code' => 'VI',
                'country' => 'Virgin Islands (U.S.)'
            ),
            array(
                'id' => 233,
                'code' => 'WF',
                'country' => 'Wallis and Futuna Islands'
            ),
            array(
                'id' => 234,
                'code' => 'EH',
                'country' => 'Western Sahara'
            ),
            array(
                'id' => 235,
                'code' => 'YE',
                'country' => 'Yemen'
            ),
            array(
                'id' => 236,
                'code' => 'YU',
                'country' => 'Yugoslavia'
            ),
            array(
                'id' => 237,
                'code' => 'ZR',
                'country' => 'Zaire'
            ),
            array(
                'id' => 238,
                'code' => 'ZM',
                'country' => 'Zambia'
            ),
            array(
                'id' => 239,
                'code' => 'ZW',
                'country' => 'Zimbabwe'
            )
        );
        DB::table('countries')->insert($countries);
    }

}

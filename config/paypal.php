<?php
return array(
    // set your paypal credential
    'client_id' => 'AebKpf0f07UsGDXh-QpV2tb0xsQ_1DAD8b-qSiLY1rF35MRVUiZ_VQ5p0yALATQrhkabufCFuHl4zvD-',
    'secret' => 'EP76PwnoIjWJCa9YCMXCJDOCcNYFDusg5xIV9N2G8QR5PlcuyWy1onOpI2v1IlrRc8dGV-P3_c2m-1HN',
 
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
 
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
 
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
 
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
 
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
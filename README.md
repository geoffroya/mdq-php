# mdq-php

PoC of MDQ server in PHP

## Quick intro

mqd-php is a simple php app that acts as a MDQ server.
SAML Metadata are jsut delivered by the script, not processed.

Processing/preparation of metadatas is done by a backend process

## Build the app

Install deps:
```
$ ./composer.phar install
```

Build app:
```
$ ./phar-composer-1.2.0.phar build . /srv/www/mdq/
```

## Back-end

The backend process is in charge of taking a federated metadafile, and splitting it in unit files

Uses a modified version of https://bitbucket.software.geant.org/users/switch.haemmerle/repos/saml-tools/browse/xml-split.php as core of backend process

## Apache config

Apache config is quite simple. The main point is to set the `AllowEncodedSlashes` directive, set to `NoDecode`.

Here is a sample config:

```
<VirtualHost *:443>
    SSLEngine on
    SSLCertificateFile /path/to/certificate
    SSLCertificateKeyFile /path/to/private/key
    SSLCertificateChainFile /path/to/certificate/chain/if/applicable

    # This one must be present!
    AllowEncodedSlashes NoDecode

    <Directory /path/to/mpq-php>
        #Options Indexes MultiViews
        Require all granted
        <FilesMatch \.php$>
            SetHandler php5-script
        </FilesMatch>
    </Directory>

    # One can have several MD contexts, by setting thos 2 lines several times
    Alias /test /path/to/mpd-php/mdq.php
    SetEnvIf Request_URI ^/test MDQ_CONFIG=/path/to/config.php

</VirtualHost>
```

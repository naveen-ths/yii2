Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).


Change the hosts file to point the domain to your server.

    Windows: c:\Windows\System32\Drivers\etc\hosts
    Linux: /etc/hosts

    Add the following lines:

    127.0.0.1   frontend.dev
    127.0.0.1   backend.dev

Set document roots of your web server:

    for frontend /path/to/yii-application/frontend/web/ and using the URL http://frontend.dev/
    for backend /path/to/yii-application/backend/web/ and using the URL http://backend.dev/

For Apache it could be the following:

    <VirtualHost *:80>
        ServerName frontend.dev
        DocumentRoot "/path/to/yii-application/frontend/web/"
        
        <Directory "/path/to/yii-application/frontend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted
            
            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
    </VirtualHost>
    
    <VirtualHost *:80>
        ServerName backend.dev
        DocumentRoot "/path/to/yii-application/backend/web/"
        
        <Directory "/path/to/yii-application/backend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted
            
            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
    </VirtualHost>

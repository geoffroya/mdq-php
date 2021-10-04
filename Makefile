COMPOSER_FILE=composer-php5.json

all: mdq.phar

composer.lock: composer.json
	COMPOSER=$(COMPOSER_FILE) ./composer.phar update

mdq.phar: composer.lock lib/*.php
	./phar-composer-1.2.0.phar build .

clean:
	rm -f mdq.phar
	touch $(COMPOSER_FILE)

COMPOSER_FILE=composer-php5.json
COMPOSER_LOCK=composer-php5.lock

all: mdq.phar

$(COMPOSER_LOCK): $(COMPOSER_FILE)
	COMPOSER=$(COMPOSER_FILE) php ./composer.phar update

mdq.phar: $(COMPOSER_LOCK) lib/*.php
	./phar-composer-1.2.0.phar build .

clean:
	rm -f mdq.phar
	rm -rf vendor/
	touch $(COMPOSER_FILE)

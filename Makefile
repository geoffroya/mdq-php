COMPOSER_FILE=composer.json
COMPOSER_LOCK=composer.lock

all: mdq.phar

$(COMPOSER_LOCK): $(COMPOSER_FILE)
	COMPOSER=$(COMPOSER_FILE) php ./composer.phar update

mdq.phar: $(COMPOSER_LOCK) lib/*.php
	./phar-composer-1.2.0.phar build .

clean:
	rm -f mdq.phar
	rm -rf vendor/
	touch $(COMPOSER_FILE)

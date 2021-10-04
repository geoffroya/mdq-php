
all: mdq.phar

composer.lock: composer.json
	./composer.phar update

mdq.phar: composer.lock lib/*.php
	./phar-composer-1.2.0.phar build .

clean:
	rm -f mdq.phar
	touch composer.json

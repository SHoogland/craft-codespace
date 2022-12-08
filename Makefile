up:
		@if ! grep -q html/web /etc/apache2/sites-available/000-default.conf; then \
			sudo sed -i 's/html/html\/web/g' /etc/apache2/sites-available/000-default.conf; \
		fi
		@if ! grep -q 8080 /etc/apache2/sites-available/000-default.conf; then \
			sudo sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf; \
		fi
		sudo a2enmod rewrite
		apache2ctl restart
		cp .env.example .env
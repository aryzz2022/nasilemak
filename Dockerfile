FROM dunglas/frankenphp

# Pasang extension mysqli dan pdo_mysql ke dalam server
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Salin semua fail kod anda ke dalam folder app
COPY . /app

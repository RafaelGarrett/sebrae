FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx/

SHELL ["/bin/bash", "-c"]

RUN ln -s public html
RUN apt update -y || true
RUN apt install -y
RUN apt install -y curl
RUN apt install -y nodejs npm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.1/install.sh | bash
RUN curl -o- https://githubusercontent.com | bash
RUN source ~/.bashrc

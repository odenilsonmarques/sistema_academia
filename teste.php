version: '3.5'

services:
  apache:
    build: ./Docker
    image: apache:latest
    ports:
     - "80:80"
    restart: always
networks:
       default:
         name: frontend-network

services:
  db:
    image: mariadb:latest
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: example
    depends_on:
    - "apache"
  adminer:
    image: adminer
    restart: always
    ports:
    - "8080:8080"
    depends_on:
    - "db"
networks:
      default:
        name: frontend-network
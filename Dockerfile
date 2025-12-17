# Use an official PHP image as a parent image
FROM php:8.3-apache

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

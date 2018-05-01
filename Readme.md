# Lead Capture

The **Lead Capture** project is intended to be a proof of concept and code sample to demonstrate the following capabilities:

* Allow a user to enter data in a lead capture form, and save the data to a MySQL database, even if the user does not submit the form.
* Allow a real estate agent to view a list of alphabetically ordered leads which have been captured
* Allow a real estate agent to click on a lead in a list and view the detail of the lead

---

## Table of Contents
    - [Installation](#installation)
    - [Testing](#testing)

## Installation

Requirements:
* Composer
* PHP
* Virtualbox
* Vagrant

Tested with Composer 1.6.3, VirtualBox 5.2.10 and Vagrant 2.0.4

Download or clone this repo, then `cd` to the root directory and execute the following commands:

```bash
cp .env.example .env
cp Homestead.yaml.example Homestead.yaml
composer install --ignore-platform-reqs
```
Edit the `.env` file, paying attention to the `APP_NAME` and `APP_URL`. You may change the values or accept the defaults (leave the file as-is).

Edit the `Homestead.yaml` file, paying attention to the `ip` and `sites > map` settings. You may change the values or accept the defaults (leave the file as-is). **Note: ** the `sites > map` setting should match the `APP_URL` url from the `.env` file.

Next, launch the new Homestead virtual machine by issuing the following command in the root of the project:

```bash
vagrant up
```
While you are waiting for vagrant to provision the new VM, modify your hosts file, adding an entry using the `ip` and `sites > map` settings from `Homestead.yaml`

```bash
sudo nano /etc/hosts
```
The new line in your hosts file should look like this:
```
192.168.10.15 leadcapture.test
```
Once the new VM has booted up, connect to the VM via SSH by entering the following commands in the terminal in the root project directory:

```bash
vagrant ssh
cd code
php artisan key:generate
php artisan migrate
php artisan db:seed
npm install && nmp run dev
```

Now you may go to your browser and navigate to the URL you entered in the `.env` file's `APP_URL` (eg `leadcapture.test`).

## Testing

To test the app, first connect to the VM via SSH by entering the following commands in the terminal in the root directory of the project:

```bash
vagrant ssh
cd code
phpunit
```





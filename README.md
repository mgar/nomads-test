# NOMADS DEVOPS TEST

# What do you need before start coding? 
* a fork of this repository
* a Free Tier AWS account

# The Test
Given the PHP code in `src` folder, you should create a development environment using whichever technology you want that allow you to run the environment in local (e.g. Vagrant, Docker). This environment should be able to run using a single command, you could use `Makefile` for that purpose, or a single bash script that allow you to operate the devenv. 

In the `prod` folder you should store *IaC* that allow you to create the infrastructure needed to run the application and expose it to the Internet. It's up to you to use whatever you want but the use of Terraform is preferable.

# Extra ball!

Use a CI tool (you can choose over a wide variety of tools, such as CircleCI, Travis, Shippable) to run unit tests stored in the `tests` folder with the command `./vendor/bin/phpunit src/tests` before pushing changes to production.
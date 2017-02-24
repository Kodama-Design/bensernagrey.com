[![Latest Stable Version](https://poser.pugx.org/kodama/sapling/v/stable)](https://packagist.org/packages/kodama/sapling) 
[![Total Downloads](https://poser.pugx.org/kodama/sapling/downloads)](https://packagist.org/packages/kodama/sapling) 
[![Latest Unstable Version](https://poser.pugx.org/kodama/sapling/v/unstable)](https://packagist.org/packages/kodama/sapling) 
[![License](https://poser.pugx.org/kodama/sapling/license)](https://packagist.org/packages/kodama/sapling)

# Sapling
Sapling is a WordPress starter theme that uses Symfony, Twig, YAML, Foundation and gulp to help you quickly create themes and grow them to meet your needs.

# Install
- Clone theme into your themes directory. `git clone https://github.com/Kodama-LLC/Sapling.git`
- Install PHP dependancies with composer. `composer install`
- Install Node dependancies with npm. `npm install`
- Install Javascript and CSS dependancies with bower. `bower install`
- Activate theme in WordPress
- Run Gulp `gulp`

# Minimal Requirements
- PHP 7+
- MySQL 5.0+. 5.6+ prefered
- Composer
- Node
- Gulp
- Bower

# WordPress Helpers
in the config.wordpress.yml file you can use yaml to define common wordpress functionality with ease. This includes post types, menus, widget locations and more.

# ACF Helpers
The theme has a set of classes to help you create ACF fields in PHP so you can dynamically create fields, reuse fields and most importantly keep it all in version control.

# Dependancy Injection Container
The Sapling variable is a Symfony Dependancy Injection container. This container is used to manage the symfony related libraries used in the theme such as Twig. You can manage them inside the config.sapling.yml file.

# Twig
The theme uses twig to render views. We encourage that you do not output and HTML outside of twig to keep your code more organized.

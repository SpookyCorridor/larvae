Larvae
===============

This is a demo app I created in order to help myself learn Laravel. It allows you to post articles and tag and/or bookmark them. You may view all your bookmarked articles or find articles with certain tags. There is also a publishing feature which allows you to choose a later date for an article to be shown publicly.  


<img src="http://i.imgur.com/mMppO6h.png?1">
:notebook_with_decorative_cover: Table of Contents :notebook_with_decorative_cover:
=================

- [links](#links)
- [intro](#intro)
- [Installation](#installation)
- [Getting Started](#Getting Started)
  * [publishing articles](#publishing articles)
  * [bookmarks](#bookmarks)
- [Technologies](#technologies)
- [TODO](#todo)

=====


# Links


[Live Website](http://frozen-hollows-8289.herokuapp.com/)

# Intro

What better way to learn PHP and Laravel than to just dive right in? Larvae has a bunch of cool features like publishing dates, tags, bookmarks, and a highlight feature for the latest article. Going through this project gave me a better understanding of "magic" that happens behind the scenes in Laravel and Rails. Specifically things like their middleware setup, many-to-many automated relationships, and service providers. Side note: Elixer is freaking amazing and makes Gulp feel even more elegant. 

I think my biggest hurdle on this project was actually managing to get it properly deployed somewhere. Most tutorials are only pieces of the puzzle and for outdated versions of Laravel. Now that I've figured it out though it's pretty easy to manage. 

# Installation

 - clone down the repository
 - composter install
 - php artisan migrate:refresh --seed 
 - php artisan serve 
 - enjoy! 
 - Or just go check out the live demo 

# Getting Started 

You can view the home index of published articles as a guest but for everything else you'll need to make an account. There's no need for a mailer right now so the email field is only to log in with, no verification. 

## publishing articles

<img src="http://i.imgur.com/hcbAkFG.png?1"> 

- The publish on feature lets you choose a future date on when that article will become public
- Tag your article! Tags on articles will be displayed and clicking them will display matching articles 
- Articles will display a published-on date and author on the index

## bookmarks and tags

- You can bookmark articlesyou like which and access them via the bookmarks button on the navbar.
- You can also see and click through tags to find related articles

<img src="http://i.imgur.com/wzOxQ7P.png?1"> 

# Technologies :floppy_disk:

Front-end: 
- Bootstrap
- Blade
- jQuery
- Sass
- Gulp + Elixer

Back-end: 
- Laravel
- Postgresql 

Notable libraries and modules: 
- Illuminate / Http 
- Faker


# :coffee::coffee::coffee: TODO :coffee::coffee::coffee:
- [ ] More robust tagging 
- [ ] Interface facelift and UX fixes
- [ ] More features for articles

## :rotating_light: Known Issues  :rotating_light:


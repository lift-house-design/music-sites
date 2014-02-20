<?php header("Status: 403"); exit("Access denied."); ?>
<?/* See Config::construct for host-based-settings */?> 
---
sql:
  host: "localhost"
  username: "moco"
  password: "029jr430jr0"
  database: "moco"
  prefix: "blog_"
  adapter: "mysql"
url: "/blog"
chyrp_url: "/blog"
name: "MO.CO Blog"
description: 
email: "bain.lifthousedesign@gmail.com"
timezone: "America/Chicago"
locale: "en_US"
check_updates: true
theme: "firecrest"
admin_theme: "default"
posts_per_page: 5
feed_items: 20
feed_url: 
uploads_path: "/uploads/"
enable_trackbacking: true
send_pingbacks: false
enable_xmlrpc: true
enable_ajax: true
enable_wysiwyg: true
can_register: false
email_activation: false
enable_recaptcha: false
default_group: 2
guest_group: 5
clean_urls: false
post_url: "(year)/(month)/(day)/(url)/"
enabled_modules: 
enabled_feathers: 
  - "text"
routes: 
secure_hashkey: "0eab430a6eb171428aa9e7021eda0049"
cache_expire: 1
cache_exclude: 
cache_memcached_hosts: 
ajax_scroll_auto: true
ga_tracking_number: "UA-40034269-1"
ga_script_position: "head"

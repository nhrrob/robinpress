## RobinPress
A laravel package that generates markdown-powered blog.

<p align="left">
<a href="https://github.com/nhrrob/robinpress/stargazers"><img src="https://img.shields.io/github/stars/nhrrob/robinpress?style=flat-square" alt="Stars"></a>
<a href="https://packagist.org/packages/nhrrob/robinpress"><img src="https://img.shields.io/packagist/dt/nhrrob/robinpress.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/nhrrob/robinpress"><img src="https://img.shields.io/packagist/v/nhrrob/robinpress" alt="Latest Stable Version"></a>
<a href="https://github.com/nhrrob/robinpress/blob/master/LICENSE.md"><img alt="GitHub license" src="https://img.shields.io/github/license/nhrrob/robinpress"></a>
</p>

### Composer Install

<code>composer require nhrrob/robinpress</code>

## 

### Usage
- Run migration: <code>php artisan migrate</code>
- Publish vendor: <code>php artisan vendor:publish --tag=robinpress-config</code>
- Create your first markdown file under App\blogs folder. 
    Ex. App\blogs\sample-post.md
    ```
    ---
    title: My Title 
    description: Description here
    random: random string
    ---

    # Heading

    Blog post body here
    ```

- run artisan command: <code>php artisan robinpress:process</code> 

Your mark-down.md is now stored in database as a post.

Cheers!


Feel free to contact:  
<a href="https://www.nazmulrobin.com/">nazmulrobin.com</a> | <a href="https://twitter.com/nhr_rob">Twitter</a> | <a href="https://www.linkedin.com/in/nhrrob/">Linkedin</a> | <a href="mailto:robin.sust08@gmail.com">Email</a>


## 
#### Bonus 
Laravel 8 auth using laravel/ui:
- <code>composer require laravel/ui</code>
- <code>php artisan ui bootstrap —auth</code>
- <code>npm install & nom run dev</code>

### Thanks to Coder's Tape for this awesome tutorial: 
https://www.youtube.com/watch?v=ivrc1ZKFgHI&list=PLpzy7FIRqpGBQ_aqz_hXDBch1aAA-lmgu 
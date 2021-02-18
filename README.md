# Main Plugin

***

## Quiz Plugin (similar to quiz jockey)

***

## Challenges

***

- How to deploy code?
- Use XAMPP locally? (why not)
- npm run dev? gulp? webpack?
  - Keep the course as simple as possible with as few libraries as possible.
  - Handlebars for templating and nothing else.
  - No SCSS or similar.
    - Use 1 CSS file per page.
  - Use a page reloader instead of gulp.
- How to handle table modifications???


## Introduction

***

- https://github.com/DevinVinson/WordPress-Plugin-Boilerplate
- What are hooks/filters?
  - Where to get list of hooks, filters, etc.
- WordPress codebase
- What are Custom Post Types?
- What are Categories/Taxonomies?
- What are Shortcodes?
- Why plugins???

### Stage 1

***

- Shortcodes to display quizzes in posts (this will be version 1.1).
  - [https://wordpress.stackexchange.com/questions/165754/enqueue-scripts-styles-when-shortcode-is-present](https://wordpress.stackexchange.com/questions/165754/enqueue-scripts-styles-when-shortcode-is-present)
- Use spl\_autoload and make sure that a secondary plugin can read the classes of this plugin before going to far into it.
- Deals with:
  - Admin side of plugin
  - is\_admin
  - Custom Post Types.
  - Categories
  - Tags
  - Hooks/filters
  - Settings Api
  - Adding menu pages
  - Adding custom pages

### Stage 2

***

- Shortcodes Api
- Public pages
- Translations

### Stage 3 (this will be an add-on plugin)

***

- Add actions hooks to plugin do_action( 'unique_name' )
- Add filters to plugin add_filter
- Quiz Jockey style plugin
  - Deals with
    - WordPress api
    - Custom Tables
    - CPTs
        - Quiz Teams
    - JS/CSS
        - vanilla / libraries (handlebars)

### Stage 4 (Another add-on)

***

- Stripe to allow users to pay for credits to do quizzes.
- Turn site into membership site.
- Block access to pages based upon roles (manage roles with Stripe credits).
- Use Handlebars as the templating library for the front-end

### Stage 5

***

- Publishing to the WordPress directory (SVN)
- [https://kinsta.com/blog/publish-plugin-wordpress-plugin-directory/](https://kinsta.com/blog/publish-plugin-wordpress-plugin-directory/)
- CodeCanyon???
- Dev-Ops
- WordPress version on activate (table creation).
- Testing (basic testing)

### TODO

***

- Go through WordPress plugin courses to get more ideas
- e.g.
- Sell plugins on CodeCanyon
  -Read the sections no this page thoroughly before beginning:
  - [https://www.udemy.com/instructor/courses/](https://www.udemy.com/instructor/courses/)
- Create course outline before filming (but after creating local plugins)
- Write a Course Landing Page (spend time on this).

### Extra Considerations

***

- How can students practice?
  - Local XAMPP – no dev ops. Simple libraries (Handlebars.js).
- Think about YouTube channel name.
- How to get initial sales and reviews (family/friends…)
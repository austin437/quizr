# Main Plugin

## Quiz Plugin (similar to quiz jockey)

## Challenges

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

- https://github.com/DevinVinson/WordPress-Plugin-Boilerplate
- What are hooks/filters?
  - Where to get list of hooks, filters, etc.
- WordPress codebase
- What are Custom Post Types?
- What are Categories/Taxonomies?
- What are Shortcodes?
- Why plugins???

### Stage 1

- Shortcodes to display quizzes in posts (this will be version 1.1).
  - [https://wordpress.stackexchange.com/questions/165754/enqueue-scripts-styles-when-shortcode-is-present](https://wordpress.stackexchange.com/questions/165754/enqueue-scripts-styles-when-shortcode-is-present)
- Use spl\_autoload and make sure that a secondary plugin can read the classes of this plugin before going to far into it.
- Deals with:
  - is\_admin
  - Custom Post Types.
  -
  -
  - Tags
  - Hooks/filters
  - Settings Api
  - Shortcodes Api
  - is\_admin
  - Translations
  - Testing (basic testing)
  - WP-cron???

### Stage 2 (this will be version 2.1)

- Quiz Jockey style plugin
- Will be add-on plugin
  - Deals with
  - WordPress api
  - Custom Tables (???)
  - CPTs
    - Quiz Teams
  - JS/CSS
    - vanilla / libraries (lodash???)

### Stage 3 (version 3.1)

- Stripe to allow users to pay for credits to do quizzes.
- Turn site into membership site.
- Block access to pages based upon roles (manage roles with Stripe credits).
- Use Handlebars as the templating library for the front-end

### Stage 4

- Publishing to the WordPress directory (SVN)
- [https://kinsta.com/blog/publish-plugin-wordpress-plugin-directory/](https://kinsta.com/blog/publish-plugin-wordpress-plugin-directory/)
- CodeCanyon???

### Other

- Dev-Ops
- WordPress version on activate (table creation).
-

### TODO

- -Go through WordPress plugin courses to get more ideas
- -e.g.
- -Sell plugins on CodeCanyon
  - -Read the sections no this page thoroughly before beginning:
  - [https://www.udemy.com/instructor/courses/](https://www.udemy.com/instructor/courses/)
- Create course outline before filming (but after creating local plugins)
- Write a Course Landing Page (spend time on this).

### Extra Considerations

- How can students practice?
  - Local XAMPP – no dev ops. Simple libraries (Handlebars.js).
- Think about YouTube channel name.
- How to get initial sales and reviews (family/friends…)
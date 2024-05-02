#ios url
https://support.apple.com/it-it/guide/safari/sfri11471/15.1/mac/12.0
# Create option in acf.php
acf_add_options_sub_page( array(
    'page_title'  => 'Privacy Policy',
    'menu_title'  => 'Privacy Policy',
    'parent_slug' => 'theme-general-settings',
) );

#import privacy-acf.json from /imports

#include shortcode /shortcodes/privacy.php in functions.php

#add content from page-privacy.html to page privacy in admin wordpress

#add styles

.page-privacy {
  padding: 0 0 4rem;
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    margin-top: 6rem;
    margin-bottom: 3rem;
  }
  .red {
    display: inline-block;
    color: red;
    border: 1px solid red;
  }
  a {
    font-weight: bold;
    text-decoration: underline;
  }
  table {
    border-collapse: collapse;
    th {
      color: white;
      background-color: #444;
    }
    th,
    td {
      padding: 1rem 2rem;
      border: 1px solid #aaa;
    }
  }
}

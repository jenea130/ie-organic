# Install

- Upload and install Advanced custom fields and All in one migration
- Rename bs-base-vite folder and theme name in style.css
- Add to you themes folder in project
- Choose theme from admin -> appearance -> themes and remove over
- Create Home page and choose Home template from sidebar -> settings -> reading
- Go to settings, permalinks and choose Name and save
- Download your empty theme from bitbucket and .git to your project
- yarn
- yarn dev
- after finished changes, kill terminal and type yarn build
- go to admin -> appearance -> theme and activate your theme

## settings

- style.css change theme name with your + prefix, example bs-moonflower

## scss

my.scss

## js

- custom-jquery
- my.ts

## acf

- import settings for acf in custom-fields in admin -> tools -> import
- /import/acf-header-footer-contacts.json
- custom-fields -> tools -> import

## coockies policy

- publish coockies policy page in admin from draft
- select the template privacy policey in admin
- add the content to the page from import/privacy/page-privacy.html
- add the styles to the page from privacy-policy.scss
- uncomment the plugin in tgm-example.php file "Cookie Notice"
- add translation for plugin from the cookies-info.txt

## language

- fow widget in admin set list
- template-parts/header/language.php
- src/js/modules/header/language-selector.js
- src/scss/blocks/globals/language.scss

## webp

### Plugin install

WebP Express

### Plugin settings

#### General

- Scope - Uploads Only
- Image types to work on - jpeg and png
- Destination folder - Mingled
- File extension - Append webp
- Destination structure - Document root
- Cache-Control header - Custom

#### .htaccess rules for webp generation

- all checked

#### Conversion

- Don't change
- Convert on upload - check
- Enable logging - check

### Alter HTML

- Alter HTML - check

## How to use

- !!! Warning, you need to optimize jpg and png before upload !!!
- add images with the_post_thumbnail
- for images from custom fields img will be replaced with picture
- for vue js use Picture component

## Commits named

- **feat** - new implementations
- **fix** - non-blocking error fix
- **bugfix** - fix blocking bug in development / staging
- **upd** - general changes
- **core** - update of configuration files, dependencies, utilities for the framework
- **backup** - import from backup




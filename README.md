# PHP Markdown Knowledge Base

Inspired by [Raneto](https://github.com/gilbitron/Raneto)

This works pretty similarly to Raneto except it doesn't (currently) have an admin area.  All files need to be manually added to the content folder.

## Installation

Download the repo then install with composer

## Creating Categories

* Add folders to the content folder (this can be changed in the src/config.php) file.
* You can sort categories by something other than name if you include a file named "sort" in the category folder
* You can use a different name compared to what the folder is named by creating a file named "actual_name" in the category folder


## Creating Pages
 
* Add markdown (.md) files to the category folder.
* In the markdown files you can set the title and sort order by including it in the top of the file.
 * Example:
 ```
 Title: This is a title
 Sort: 1
 ---
 This is the page content
 ```

## Routes

Routes are determined by the category/page name combo.  For example if you have a folder named "category-1" and inside that folder is a file named "page-one.md", the route to the knowledge base page would be http://yoursite.com/category-1/page-one
##About skymo
**skymo** is a lightweight Content Management System built using PHP and JSON. it does not use a database.

##Site Structure 
The structure of a **skymo** site is held in JSON files. The admin interface allows this to be edited, although not all the features have been implemented 

##Pages
Pages are the building blocks of a **skymo** site. A page can be vary from a simple piece of content, to a complex custom piece of functionality (or anything in between).

|Field|Description|
|---|---|
|URL|The page address which is appended to the base URL|
|Title|The page title. (If menu name is not set this is used as the menu name)|
|Template|A PHP template which defines the look of the page|
|Content|A markdown file which defines the page content |
|Menu Name|Which menu appears on this page|
|Menu Item|The name of this page as it appears on the menu|
|Sections|A list of content snippets which the page includes |
|Script|A PHP script which controls the page behaviour |
|User Level|User level required to view page. If blank, all users may see this page |

A page generally needs at least either content, a template or a script. However, it may have any or all of these. For example a simple page may just have content and slot directly into the site's master template. A more complex page may have a template and either content or sections (for example a list of news items)

A script may be used in conjunction with a template and/or content to implement more advanced behaviour.

##Admin Interface 
The admin interface currently allows access to some editing functionality for the site. This includes editing most of the page details above, a markdown editor for the content files and a basic template editor.

As of the current version, the following features are not yet implemented:

* Ability to add new page
* Ability to change the order of site items 
* Script editor 
* Menu editor

These actions can still be achieved by using a file editor on the appropriate site files 

##User Level 
Accessed to the site is determined by user levels. There are six defined user levels, but if required it is possible to add more.

|Level|Description|Value|
|---|---|---|
|Guest|Can view the site, but has no access to the Admin interface|1|
|Registered|Guest has registered with the site,  but is not yet approved|5|
|Approved|An approved registered user|10|
|Author|Can edit content via the Admin interface|15|
|Administrator|Can edit content, templates and assign scripts to pages|20|
|Developer|Can edit everything including scripts|25|


# joomla require tag plugin

This started by a question from sseguin on the joomla forum
https://forum.joomla.org/viewtopic.php?f=706&t=967272

## How to force setting one or more tags to an article of a certain category.

At first I figured to do this in an override just adding some jQuery styling and attribution dynamically. 
However, maintening this from the admin would not be possible. Some plugin technology would be required.

Big thanks to SharkyKZ who pointed us into the direction of some plugin technology.

## How it works

Note! This plugin only is tested on ISIS admin template.

1. Install the plugin as with any other extension
2. The required categories are set in the plugin settings. Enable plugin.
3. Upon creation or editing of an article the plugin checks for the articles category if on the list of categories that require a TAG
The plugin then sets TAG field to required or not.
4. While editing the author may switch categories. 
The jQuery script will then dynamically add or remove the appropriate pieces of html and/or styling attributes.

If a tag is required but not set, an error message will appear.

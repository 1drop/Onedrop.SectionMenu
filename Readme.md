# Onedrop.SectionMenu

This package provides an additional menu element ``Onedrop.SectionMenu:Menu`` which can be used as a replacement 
of ``Neos.Neos:Menu`` to provide a section based navigation.

This is especially useful if you're building a onepager and would like to have a dynamic navigation
menu as you know it from Neos.

This package also adds the NodeType ``Onedrop.SectionMenu:Section`` which is highly similar 
to a ``Neos.Nodetypes:Headline`` which is used target anchors of the generated section menu.

## Compatibility

| Neos Version     | Onedrop.SectionMenu Version  |
|------------------|------------------------------|
| Neos 3.x         | 2.x                          |
| Neos 2.3 LTS     | 1.x                          |

## How-To:

### Install: 

Use the command ``composer require onedrop/sectionmenu`` to add this package as a requirement to your Neos project.  
(Or: Download the zip and unpack it to ``Packages/Application/Onedrop.SectionMenu``)

## Usage: 

### Fusion:

You can use the ``Onedrop.SectionMenu:Menu`` TS object as a replacement for the regular ``Neos.Neos:Menu``
element e.g.

    page = Page {  
      body.parts.menu = Onedrop.SectionMenu:Menu {  
        maximumLevels = 3
        entryLevel = 1
      }  
    }

### Content element:

This package provides a content element 'Section' which you need to place somewhere on the page. 
It behaves like a regular Header-element except that you can't use Aloha formatting (due to Menu generation).
The element can be placed anywhere e.g. inside a multicolumn element. All ``Onedrop.SectionMenu:Section`` 
elements from a page are used to generate a second submenu inside the Menu after the regular subpages.

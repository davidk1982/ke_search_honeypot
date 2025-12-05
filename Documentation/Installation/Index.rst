.. include:: /Includes.rst.txt

.. _installation:

============
Installation
============

.. _requirements:

Requirements
============

* TYPO3 11.5 LTS, 12 LTS, 13 LTS or 14
* PHP 8.1 or higher
* ke_search extension (version 4.0 or higher)

.. _installation-composer:

Installation with Composer
===========================

The recommended way to install the extension is via Composer:

.. code-block:: bash

   composer require davidkohr/ke-search-honeypot

.. _installation-extension-manager:

Installation via Extension Manager
===================================

1. Go to the Extension Manager in the TYPO3 Backend
2. Search for "ke_search_honeypot"
3. Click on "Install"

.. _activation:

Activation
==========

After installation:

1. Clear all TYPO3 caches
2. Add the honeypot partial to your ke_search form template:

.. code-block:: html

   <f:render partial="honeypot" />

**Example:**

.. code-block:: html

   <form action="..." method="post">
       <input type="text" name="tx_kesearch_pi1[sword]" />
       <input type="hidden" name="tx_kesearch_pi1[page]" value="{page}" />
       
       <f:render partial="honeypot" />
       
       <button type="submit">Search</button>
   </form>

That's it! The honeypot field is now active.

.. _verification:

Verification
============

To verify the installation is working:

1. View the source code of a page with your search form
2. Look for an input field named `tx_kesearch_pi1[__hp]`
3. This field should be positioned off-screen (margin-left: -99999px)

The middleware will automatically reject any search request where this field 
contains a value.

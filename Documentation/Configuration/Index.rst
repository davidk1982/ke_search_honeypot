.. include:: /Includes.rst.txt

.. _configuration:

=============
Configuration
=============

.. _typoscript:

TypoScript Configuration
========================

The extension registers a Fluid Partial path for ke_search:

.. code-block:: typoscript

   plugin.tx_kesearch_pi1 {
       view {
           partialRootPaths {
               1000 = EXT:ke_search_honeypot/Resources/Private/Partials/
           }
       }
   }

This makes the `honeypot` partial available in your ke_search templates.

.. _template:

Template Integration
====================

Add the partial to your search form template:

.. code-block:: html

   <f:render partial="honeypot" />

The partial renders:

.. code-block:: html

   <div style="margin-left: -99999px; position: absolute;">
       <label for="kesearch_hp">Diese Feld nicht ausfüllen!</label>
       <input autocomplete="new-kesearch-hp" tabindex="-1" 
              type="text" name="tx_kesearch_pi1[__hp]" value="" />
   </div>

.. _middleware:

Middleware
==========

The extension uses a PSR-15 middleware to check search requests.

The middleware checks if:

1. A ke_search form was submitted (`tx_kesearch_pi1` parameter exists)
2. A search term was entered (`tx_kesearch_pi1[sword]` parameter exists)
3. The honeypot field (`tx_kesearch_pi1[__hp]`) is missing or filled

If a bot fills the honeypot field, the request is rejected with **403 Forbidden**.

The middleware is automatically registered in `Configuration/RequestMiddlewares.php` - 
no manual configuration needed.

.. _routeenhancer:

RouteEnhancer Configuration
===========================

**Important:** To ensure the honeypot field is included in all ke_search URLs, 
you must add `__hp` to your RouteEnhancer configuration.

Add this to your site configuration (`config/sites/<identifier>/config.yaml`):

.. code-block:: yaml

   routeEnhancers:
     KeSearch:
       type: Plugin
       namespace: tx_kesearch_pi1
       routePath: '/{sortByField}/{sortByDir}/{resetFilters}/{page}/{sword}/{__hp}'
       _arguments:
         sortByField: sortByField
         sortByDir: sortByDir
         resetFilters: resetFilters
         page: page
         sword: sword
       defaults:
         __hp: ''
         sortByField: ''
         sortByDir: ''
         resetFilters: ''
         page: '0'
         sword: ''

**Why is this necessary?**

The RouteEnhancer ensures that:

- The `__hp` parameter is always present in search result URLs
- Pagination and sorting links automatically include the empty honeypot field
- Bots that follow links can be detected if they fill the field

Without this configuration, the honeypot validation may fail on result pages.

**Note:** This configuration will create URLs with a trailing slash (e.g., 
`/search/score/desc/0/1/searchterm//`). This is expected behavior and ensures 
maximum bot protection.

.. _customization:

Customization
=============

Custom Honeypot Field Name
---------------------------

If you want to use a different field name, override the partial in your own 
extension or template:

.. code-block:: html

   <!-- Your own Partials/honeypot.html -->
   <div style="margin-left: -99999px; position: absolute;">
       <input type="text" name="tx_kesearch_pi1[my_custom_field]" value="" />
   </div>

Then update the middleware check accordingly.

Custom Styling
---------------

The default partial uses `position: absolute` with negative margin. You can 
override this with your own CSS or by creating a custom partial.

**Note:** Don't use `display: none` as some bots detect this. Use positioning 
off-screen instead.

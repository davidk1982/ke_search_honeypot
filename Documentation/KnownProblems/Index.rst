.. include:: /Includes.rst.txt

.. _known-problems:

==============
Known Problems
==============

.. _browser-autofill:

Browser Auto-fill
=================

Some browser extensions or password managers might auto-fill the honeypot field.
This is rare but can cause legitimate users to be blocked.

**Solution:** Ensure the honeypot field has attributes that prevent auto-fill:

.. code-block:: html

   autocomplete="off"
   tabindex="-1"

These are already included in the default TypoScript configuration.

.. _accessibility:

Accessibility
=============

Screen readers might announce the honeypot field if not properly hidden.

**Solution:** The default implementation uses both CSS and ARIA attributes:

.. code-block:: html

   aria-hidden="true"
   style="position: absolute; left: -9999px;"

This ensures the field is hidden from both visual users and assistive technologies.

.. _compatibility:

Compatibility Issues
====================

No known compatibility issues with other TYPO3 extensions.

If you encounter issues with other extensions, please report them on the 
`GitHub issue tracker <https://github.com/davidkohr/ke_search_honeypot/issues>`__.

.. _reporting-issues:

Reporting Issues
================

Please report bugs and issues on GitHub:
https://github.com/davidkohr/ke_search_honeypot/issues

When reporting issues, please include:

* TYPO3 version
* PHP version
* ke_search version
* ke_search_honeypot version
* Steps to reproduce the issue
* Error messages or logs

.. include:: /Includes.rst.txt

.. _introduction:

============
Introduction
============

.. _what-it-does:

What does it do?
================

KeSearch HoneyPot provides simple protection against spammers and bots in 
`ke_search <https://extensions.typo3.org/extension/ke_search>`__ search queries.

A honeypot field is an invisible form field that is hidden from real users but 
visible to spam bots. If this field is filled out, the search request is rejected 
with a 403 Forbidden response.

Features
========

* Simple honeypot field for ke_search forms via Fluid Partial
* Automatic spam bot detection via PSR-15 Middleware
* 403 Forbidden response for spam attempts
* Works out of the box - just install and add the partial to your template
* Compatible with TYPO3 11 LTS, 12 LTS, 13 LTS and 14

.. _screenshots:

Screenshots
===========

The extension works silently in the background. There are no visible changes 
for legitimate users. Spam bots filling out the hidden honeypot field will 
receive a 403 Forbidden response.

.. _support:

Support
=======

For issues, questions or feature requests please use the 
`GitHub issue tracker <https://github.com/davidkohr/ke_search_honeypot/issues>`__.

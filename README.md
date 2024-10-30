 # TYPO3 Extension "Faceted Search Honeypot"

This extension provides simple protection against spammers and bots in search queries.


## Support

This TYPO3 Extension is free to use.

## Install

Quick guide:
- Just install this extension - e.g. `composer require david-kohr/ke-search-honeypot`
- Clear caches
## Usage

Add the following code in your search form template.

```
<f:render partial="honeypot" />
```

Example:
```
....
        <input type="hidden" name="tx_kesearch_pi1[redirect]" value="0" />
		<input id="kesearchpagenumber" type="hidden" name="tx_kesearch_pi1[page]" value="{page}" />
		<input id="resetFilters" type="hidden" name="tx_kesearch_pi1[resetFilters]" value="0" />
		<input id="sortByField" type="hidden" name="tx_kesearch_pi1[sortByField]" value="{sortByField}" />
		<input id="sortByDir" type="hidden" name="tx_kesearch_pi1[sortByDir]" value="{sortByDir}" />

		<f:render partial="honeypot" />
	</form>
</f:section>
```


## Your Contribution

 **Pull requests** are welcome in general! Please note these requirements:
* Unit Tests must still work
* Behaviour Tests must still work
* Describe how to test your pull request
* TYPO3 coding guidelines must be respected

- **Bugfixes**: Please describe what kind of bug your fix solve and give us feedback how to reproduce the issue. We're going
to accept only bugfixes that can be reproduced.
- **Features**: Not every feature is relevant for the bulk of the users. In addition: We don't want to make the extension even more complicated in usability for an edge case feature. Please discuss a new feature before.
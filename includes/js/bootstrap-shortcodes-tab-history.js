/* ==========================================================================
 * bootstrap-tab-history.js
 * Author: Michael Narayan <mnarayan01@gmail.com>
 * Repository: https://github.com/mnarayan01/bootstrap-tab-history/
 * ==========================================================================
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain a
 * copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 * ========================================================================== */

/* ========================================================================== */
/* JSHint directives                                                          */
/*                                                                            */
/* global BootstrapTabHistory: true                                           */
/*                                                                            */
/* global document                                                            */
/* global jQuery                                                              */
/* global history                                                             */
/* global window                                                              */
/* ========================================================================== */

/**
 * Integrate [HTML5 history state tracking](https://developer.mozilla.org/en-US/docs/Web/Guide/API/DOM/Manipulating_the_browser_history)
 * with [`bootstrap/tab.js`](http://getbootstrap.com/javascript/#tabs). To enable tracking on a tab element, simply set
 * the `data-tab-history` attribute to true (or a string denoting a tab grouping).
 *
 * See the README for additional information.
 *
 * Functionality based upon bootstrap/tab.js v3.1.0; reference it when making any changes.
 */

BootstrapTabHistory = {
	options: {
		/**
		 * When the anchor portion of the URI is used to activate a tab, scroll down to the given offset, rather than the
		 * element with the given `id` attribute. Set to null to disable. Only relevant if showTabsBasedOnAnchor is true.
		 *
		 * May be overriden on a per-element basis by the attribute `data-tab-history-anchor-y-offset`.
		 *
		 * @public
		 * @type {?number}
		 */
		defaultAnchorYOffset: 0,
		/**
		 * Either 'push' or 'replace', for whether to use `history.pushState` or `history.replaceState`, resp.
		 *
		 * May be overriden on a per-element basis by the attribute `data-tab-history-changer`.
		 *
		 * @public
		 * @type {string}
		 */
		defaultChanger: 'replace',
		/**
		 * If true, update the URL in onShownTab in the calls to `history.pushState` and `history.replaceState`. Otherwise,
		 * `null` is passed as the third parameter to these calls.
		 *
		 * May be overriden on a per-element basis by the attribute `data-tab-history-update-url`.
		 *
		 * @public
		 * @type {boolean}
		 */
		defaultUpdateURL: false,
		/**
		 * Should the anchor portion of the loaded URI be used to activate a single tab if no history was present on page
		 * load.
		 *
		 * @public
		 * @type {boolean}
		 */
		showTabsBasedOnAnchor: true
	}
};

(function () {
	'use strict';

	jQuery(function () {
		if(history && history.pushState && history.replaceState) {
			var bootstrapTabHistory = history.state && history.state.bootstrapTabHistory;

			if(bootstrapTabHistory) {
				showTabsBasedOnState(bootstrapTabHistory);
			} else {
				showTabsBasedOnAnchor();
			}

			backfillHistoryState();

			jQuery(document).on('shown.bs.tab', onShownTab);
			jQuery(window).on('popstate', onPopState);
		} else {
			showTabsBasedOnAnchor();
		}
	});

	/**
	 * Used to prevent onShownTab from registering shown events that we triggered via showTabsBasedOnState.
	 *
	 * @type {boolean}
	 */
	var showingTabsBasedOnState = false;

	/**
	 * Used to update `history.state` to reflect the default active tabs on initial page load. This supports proper
	 * `history.back` handling when `data-tab-history-update-url` is true.
	 */
	function backfillHistoryState() {
		var newState = null;

		jQuery('li.active > [data-tab-history]').each(function () {
			var $activeTabElement = jQuery(this);
			var selector = getTabSelector($activeTabElement);

			if(selector) {
				var tabGroup = getTabGroup($activeTabElement);

				if(tabGroup) {
					newState = createNewHistoryState(newState || history.state, tabGroup, selector);
				}
			}
		});

		if(newState) {
			history.replaceState(newState, '', null);
		}
	}

	/**
	 * Clone the existing state, ensure its bootstrapTabHistory attribute is an Object, and add the provided tabGroup to
	 * said bootstrapTabHistory attribute.
	 *
	 * @param {?object} existingState
	 * @param {!string} tabGroup
	 * @param {!string} selector
	 * @returns {!object}
	 */
	function createNewHistoryState(existingState, tabGroup, selector) {
		// Clone history.state and ensure it has a bootstrapTabHistory entry.
		var newState = jQuery.extend(true, {}, existingState, {
			bootstrapTabHistory: {}
		});

		newState.bootstrapTabHistory[tabGroup] = selector;

		return newState;
	}

	/**
	 * @param {jQuery} $tab
	 * @returns {?string}
	 */
	function getTabGroup($tab) {
		return parseTruthyAttributeValue($tab.data('tab-history'));
	}

	/**
	 * @param {jQuery} $tab
	 * @returns {?string}
	 */
	function getTabSelector($tab) {
		return $tab.data('target') || $tab.attr('href');
	}

	/**
	 * Receives the `shown.bs.tab` event. Updates `history.state` as appropriate.
	 *
	 * @param {jQuery.Event} shownEvt
	 */
	function onShownTab(shownEvt) {
		if(!showingTabsBasedOnState) {
			var $activatedTab = jQuery(shownEvt.target);
			var selector = getTabSelector($activatedTab);

			if(selector) {
				var tabGroup = getTabGroup($activatedTab);

				if(tabGroup) {
					var historyChanger = $activatedTab.data('tab-history-changer') || BootstrapTabHistory.options.defaultChanger;
					var newState = createNewHistoryState(history.state, tabGroup, selector);
					var updateURL = (function ($activatedTab) {
						if(selector[0] === '#') {
							var elementUpdateURLOption = parseTruthyAttributeValue($activatedTab.data('tab-history-update-url'));

							if(elementUpdateURLOption === undefined) {
								return BootstrapTabHistory.options.defaultUpdateURL;
							} else {
								return elementUpdateURLOption;
							}
						} else {
							return false;
						}
					})($activatedTab);

					switch(historyChanger) {
						case 'push':
							history.pushState(newState, '', updateURL ? selector : null);
							break;
						case 'replace':
							history.replaceState(newState, '', updateURL ? selector : null);
							break;
						default:
							throw new Error('Unknown tab-history-changer: ' + historyChanger);
					}
				}
			}
		}
	}

	/**
	 * Receives the `popstate` event. Shows tabs based on the value of `history.state` as appropriate.
	 */
	function onPopState() {
		var bootstrapTabHistory = history.state && history.state.bootstrapTabHistory;

		if(bootstrapTabHistory) {
			showTabsBasedOnState(bootstrapTabHistory);
		}
	}

	/**
	 * Returns the given value, _unless_ that value is an empty string, in which case `true` is returned.
	 *
	 * Rationale: HAML data attributes which are set to `true` are rendered as a blank string.
	 *
	 * @param {*} value
	 * @returns {*}
	 */
	function parseTruthyAttributeValue(value) {
		if(value) {
			return value;
		} else if(value === '') {
			return true;
		} else {
			return value;
		}
	}

	/**
	 * Show tabs based upon the anchor component of `window.location`.
	 */
	function showTabsBasedOnAnchor() {
		if(BootstrapTabHistory.options.showTabsBasedOnAnchor) {
			var anchor = window.location && window.location.hash;

			if(anchor) {
				var $tabElement = showTabForSelector(anchor);

				if($tabElement && window.addEventListener && window.removeEventListener) {
					var anchorYOffset = (function ($tabElement) {
						var elementSetting = $tabElement.data('tab-history-anchor-y-offset');

						if(elementSetting === undefined) {
							return BootstrapTabHistory.options.defaultAnchorYOffset;
						} else {
							return elementSetting;
						}
					})($tabElement);

					// HACK: This prevents scrolling to the tab on page load. This relies on the fact that we should never get
					//   here on `history.forward`, `history.back`, or `location.reload`, since in all those situations the
					//   `history.state` object should have been used (unless the browser did not support the modern History API).
					if(anchorYOffset || anchorYOffset === 0) {
						var scrollListener = function resetAnchorScroll () {
							window.removeEventListener('scroll', scrollListener);
							window.scrollTo(0, anchorYOffset);
						};

						window.addEventListener('scroll', scrollListener);
					}
				}
			}
		}
	}

	/**
	 * Show a tab which corresponds to the provided selector.
	 *
	 * @param {string} selector - A CSS selector.
	 * @returns {?jQuery} - The tab which was found to show (even if said tab was already active).
	 */
	function showTabForSelector(selector) {
		var $tabElement = (function (selector) {
			var $ret = null;

			jQuery('[data-toggle="tab"], [data-toggle="pill"]').each(function () {
				var $potentialTab = jQuery(this);

				if(($potentialTab.attr('href') === selector || $potentialTab.data('target') === selector) && getTabGroup($potentialTab)) {
					$ret = $potentialTab;

					return false;
				} else {
					return null;
				}
			});

			return $ret;
		})(selector);

		if($tabElement) {
			$tabElement.tab('show');
		}

		return $tabElement;
	}

	/**
	 * Iterate through the provided set of tab tab groups, showing the tabs based on the stored selectors.
	 *
	 * @param {object} bootstrapTabHistory - Each of the values is passed to showTabForSelector; the keys are actually irrelevant.
	 */
	function showTabsBasedOnState(bootstrapTabHistory) {
		showingTabsBasedOnState = true;

		try {
			for(var k in bootstrapTabHistory) {
				if(bootstrapTabHistory.hasOwnProperty(k)) {
					showTabForSelector(bootstrapTabHistory[k]);
				}
			}
		} finally {
			showingTabsBasedOnState = false;
		}
	}
})();
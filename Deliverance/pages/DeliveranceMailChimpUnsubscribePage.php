<?php

require_once 'Deliverance/pages/DeliveranceUnsubscribePage.php';
require_once 'Deliverance/DeliveranceMailChimpList.php';

/**
 * @package   Deliverance
 * @copyright 2009-2011 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class DeliveranceMailChimpUnsubscribePage extends DeliveranceUnsubscribePage
{
	// process phase
	// {{{ protected function getList()

	protected function getList()
	{
		$list = new DeliveranceMailChimpList($this->app);
		$list->setReplaceInterests(true);
		return $list;
	}

	// }}}
	// {{{ protected function getInterestInfo();

	protected function getInterestInfo(array $interests_to_remove)
	{
		$info = array();

		$new_interests = $this->getNewInterests();

		// make sure interests changed, if not, don't update the info.
		if (count($new_interests) > 0 &&
			count($new_interests) !== count($this->getInterests())) {
			$info['interests'] = $new_interests;
		}

		return $info;
	}

	// }}}
}

?>

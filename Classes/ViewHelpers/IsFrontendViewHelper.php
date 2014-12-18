<?php
namespace Gjo\GjoLib\ViewHelpers;

use \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * Checks the TYPO3_MODE for frontend use
 */
class IsFrontendViewHelper extends AbstractConditionViewHelper {

    /**
     * @return string
     */
    public function render() {
        if (TYPO3_MODE === 'FE') {
            return $this->renderThenChild();
        }
        return $this->renderElseChild();
    }

}

<?php
namespace Gjo\GjoLib\ViewHelpers\IfCondition\Client;

/**
 * ### Will be removed in 2.0
 *
 * Please don't do user agent sniffing. This is bad practice.
 *
 * ### Condition: Client's Browser
 *
 * Condition ViewHelper which renders the `then` child if client's
 * browser matches the `browser` argument
 *
 * ### Examples
 *
 *     <!-- simple usage, content becomes then-child -->
 *     <v:if.client.isBrowser browser="chrome">
 *         Thank you for using Google Chrome!
 *     </v:if.client.isBrowser>
 *     <!-- display a nice warning if not using Chrome -->
 *     <v:if.client.isBrowser browser="chrome">
 *         <f:else>
 *             <div class="alert alert-info">
 *                 <h2 class="alert-header">Please download Google Chrome</h2>
 *                 <p>
 *                     The particular system you are accessing uses features which
 *                     only work in Google Chrome. For the best experience, download
 *                     Chrome here:
 *                     <a href="http://chrome.google.com/">http://chrome.google.com/</a>
 *                 </p>
 *         </f:else>
 *     </v:if.client.isBrowser>
 *
 * @deprecated
 * @author Andreas Lappe <nd@kaeufli.ch>, kaeufli.ch
 * @package Vhs
 * @subpackage ViewHelpers\If\Client
 */
class IsBrowserViewHelper extends AbstractClientInformationViewHelper {

	/**
	 * Render method
	 *
	 * @param string $browser
     * @param string $version
	 * @return string
	 */
	public function render($browser, $version = '') {

//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($browser, 'Browser: ');
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($version, 'Version: ');
//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($content = $this->renderElseChild(), 'Else: ');
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->getBrowsers(), 'Brwoser: ');

		if (array_key_exists($browser, $this->getBrowsers())) {

            if($version == ''){
                $content = $this->renderThenChild();
            }else{
                if($version == $this->getBrowsers()[$browser]){
                    $content = $this->renderThenChild();
                }else{
                    $content = $this->renderElseChild();
                }
            }
		} else {
			$content = $this->renderElseChild();
		}

		return $content;
	}
}

<?php

/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link https://github.com/Mikel1961/contentinum-components
 * @version 1.0.0
 */
namespace Guestbook\Model\Guests;

use ContentinumComponents\Mapper\Process;

class SaveEntry extends Process
{

    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            if (isset($datas['furthernames']) && strlen($datas['furthernames']) > 0) {
                return array(
                    'error' => 'Sorry! ERROR!'
                );
            } else {
                parent::save($datas, $entity, $stage, $id);
                return array(
                    'success' => 'Vielen Dank! Dein Eintrag wurde registriert und nach Prüfung freigeschaltet.'
                );
            }
        } else {
            return array(
                'error' => 'Sorry! Es gab einen Fehler Bitte probiere es später noch einmal!'
            );
        }
    }
}
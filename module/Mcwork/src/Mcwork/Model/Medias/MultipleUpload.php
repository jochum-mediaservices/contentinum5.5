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
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\Medias;

use Mcwork\Model\Exception\ErrorLogicModelException;
use ContentinumComponents\Path\Clean;
use ContentinumComponents\Images\Size;

/**
 *
 * @author mike
 *        
 */
class MultipleUpload extends Upload
{

    public function multipleUpload($fs, $k, $fsTmpName)
    {
        $this->addInsert('mediaName', $fs['file']['name'][$k]);
        $this->setMediaName($fs['file']['name'][$k]);
        $this->addInsert('mediaType', $fs['file']['type'][$k]);
        $this->setMediaType($fs['file']['type'][$k]);
        $this->addInsert('mediaSizes', $fs['file']['size'][$k]);
        if (false === $this->moveUploadFile($fsTmpName, $this->buildTargetFile($this->buildTargetName($fs['file']['name'][$k])))) {
            throw new ErrorLogicModelException('Error upload file');
        } else {
            
            if (in_array($this->ext, $this->imageExtensions)) {
                $imageFile = Clean::get($this->getTargetPathFileName());
                $imgSize = new Size($imageFile);
                $imgSize->imgSize();
                
                if ($this->resizeImage > 0) {
                    $resize = new \ContentinumComponents\Images\CalculateResize($this->getResizeImage(), $imgSize->getWidth(), $imgSize->getHeight());
                    $nSize = $resize->getNewSize();
                    $nWidth = $nSize['width'];
                    $nHeight = $nSize['height'];
                } else {
                    $nWidth = $imgSize->getWidth();
                    $nHeight = $imgSize->getHeight();
                }
                
                $newImage = @imagecreatetruecolor($nWidth, $nHeight);
                
                switch ($this->ext) {
                    case 'JPG':
                    case 'JPEG':
                    case 'jpeg':
                    case 'jpg':
                        $jpegOptim = new \PHPImageOptim\Tools\Jpeg\JpegOptim();
                        $jpegOptim->setBinaryPath('/usr/bin/jpegoptim');
                        $jpegOptim->setOptimisationLevel(3);
                        
                        imagecopyresampled($newImage, imagecreatefromjpeg($imageFile), 0, 0, 0, 0, $nWidth, $nHeight, $imgSize->getWidth(), $imgSize->getHeight());
                        imagejpeg($newImage, $imageFile, $this->getImageQuality());
                        
                        $optim = new \PHPImageOptim\PHPImageOptim();
                        $optim->setImage($imageFile);
                        $optim->chainCommand($jpegOptim);
                        $optim->optimise();
                        break;
                    case "PNG":
                    case "png":                    
                        if ($this->resizeImage > 0) {
                            imageAlphaBlending($newImage, false);
                            imageSaveAlpha($newImage, true);                        
                            imagecopyresampled($newImage, imageCreateFromPng($imageFile) ,0,0,0,0, $nWidth, $nHeight, $imgSize->getWidth(), $imgSize->getHeight());
                            imagepng($newImage, $imageFile);
                        }                      
                        $pngQuant = new \PHPImageOptim\Tools\Png\PngQuant();
                        $pngQuant->setBinaryPath('/usr/bin/pngquant');
                        
                        $optim = new \PHPImageOptim\PHPImageOptim();
                        $optim->setImage($imageFile);
                        $optim->chainCommand($pngQuant);
                        $optim->optimise();
                        break;
                    case "GIF":
                    case "gif":
                        if ($this->resizeImage > 0) {
                            imageAlphaBlending($newImage, false);
                            imageSaveAlpha($newImage, true);
                            imagecopyresampled($newImage, imagecreatefromgif($imageFile) ,0,0,0,0, $nWidth, $nHeight, $imgSize->getWidth(), $imgSize->getHeight());
                            imagegif($newImage, $imageFile);
                        }            

                        $gifsicle = new \PHPImageOptim\Tools\Gif\Gifsicle();
                        $gifsicle->setBinaryPath('/usr/bin/gifsicle');
                        
                        $optim = new \PHPImageOptim\PHPImageOptim();
                        $optim->setImage($imageFile);
                        $optim->chainCommand($gifsicle);
                        $optim->optimise();                        
                        break;
                    default:
                        break;
                }
                
                if ($this->resizeImage > 0) {
                    $this->addInsert('mediaDimensions', $nWidth . 'x' . $nHeight, true);
                }
                $this->addInsert('mediaSizes', filesize ( $imageFile ), true);
            }
            
            if (in_array($this->ext, $this->imageExtensions)) {
                return 1;
            }
        }
    }

}
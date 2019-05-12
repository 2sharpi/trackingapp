
<?php

defined('BASEPATH') or exit('access denied');

class CsvImporter {
    private $filePath;
    private $delim;
    private $enclosure;

    public function initialize($filePath, $delimiter = ',', $enclosure = '"')
    {
        $this->filePath = $filePath;
        $this->delim  =$delimiter;
        $this->enclosure = $enclosure;
    }

    /**
     * @param bool $skipHeader
     * @return array
     * @throws Exception
     */
    public function read($skipHeader = true)
    {
        $data = [];
        if (($handle = fopen($this->filePath, 'r')) !== false) {
            while (($line = fgetcsv($handle, 1000, $this->delim, $this->enclosure)) !== false) {
                if ($skipHeader) {
                    $skipHeader = false;
                    continue;
                }

                $dpdNum = (string)$line[0];
                $optionalNum = null;
                $optionalLocation = null;
                $optionalPostCode = null;
                $optionalCountryCode = null;
                if( isset( $line[1] ) ) {
                    $optionalNum = (string) $line[1];
                }

                if( isset( $line[2] ) ) {
                    $optionalLocation = (string) $line[2];
                }

                if( isset( $line[3] ) ) {
                    $optionalPostCode = (string) $line[3];
                }
                
                if( isset( $line[4] ) ) {
                    $optionalCountryCode= (string) $line[4];
                }

                if ($dpdNum && is_numeric($dpdNum)) {
                    $data[$dpdNum] = [
                        'realTracking' => $dpdNum,
                        'generatedTracking' => $optionalNum ? $optionalNum : null,
                        'address' => $optionalLocation ? $optionalLocation : null,
                        'postalCode' => $optionalPostCode ? $optionalPostCode : null,
                        'countryCode' => $optionalCountryCode ? $optionalCountryCode : null
                    ];
                }
            }
            fclose($handle);
        } else {
            throw new Exception('Can`t open file: ' . $this->filePath);
        }

        return $data;
    }
}


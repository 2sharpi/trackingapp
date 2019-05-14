
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
                if( isset( $line[1] ) ) {
                    $optionalNum = (string) $line[1];
                }

                if( isset( $line[2] ) ) {
                    $optionalLocation = (string) $line[2];
                }

                if ($dpdNum && is_numeric($dpdNum)) {
                    $data[$dpdNum] = [
                        'realTracking' => $dpdNum,
                        'generatedTracking' => $optionalNum ? $optionalNum : null,
                        'address' => $optionalLocation ? $optionalLocation : null,
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


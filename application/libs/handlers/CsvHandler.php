<?php
require_once "DataHandler.php";
require_once DB_ROOT."MapObjects.php";
require_once DB_ROOT."ChartData.php";

class CsvHandler extends DataHandler
{
    public function handle()
    {
        $result = array(
            'type' => 'csv',
            'status' => 'FAIL',
            'objects_list' => array()
        );

        $chartData = array();
        if (($handle = fopen($this->filePath, "r")) !== FALSE) {
            $currentObject = null;
            $currentGround = null;

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (count($data) == 4) {
                    $currentObject = $this->addObjectLine($data);
                }
                elseif (count($data) == 3) {
                    $currentObject = $this->addObjectPoint($data);
                }
                elseif (count($data) == 1) {
                    $currentGround = $data[0];
                }
                elseif (count($data) == 2) {
                    $chartData[$currentObject][$currentGround][] = $data;
                }

            }
            fclose($handle);
        }

        if (!empty($chartData)) {
            $result['status'] = "OK";
            $result['objects_list'] = array_keys($chartData);
            $this->addChartData($chartData);
        }

        return $result;
    }

    private function addObjectLine($data)
    {
        $json = "[[".$data[0].", ".$data[1]."], [".$data[2].", ".$data[3]."]]";

        $mapObjects = new MapObjects();

        return $mapObjects->create($this->mapId, "line", $json);
    }

    private function addObjectPoint($data)
    {
        $json = "[".$data[0].", ".$data[1]."]";

        $mapObjects = new MapObjects();

        return $mapObjects->create($this->mapId, "point", $json);
    }

    private function addChartData($data)
    {
        $chartData = new ChartData();

        foreach ($data as $idObj => $grounds) {
            foreach ($grounds as $idGround => $ground) {
                $tmp = array();
                foreach ($ground as $gData) {
                    $tmp[] = "{x: ".$gData[0].", y: ".$gData[1]."}";
                }
                $json = "[".join(", ", $tmp)."]";

                $chartData->create($idObj, $idGround, $json);
            }
        }
    }
}

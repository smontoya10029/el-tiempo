<?php

App::uses('AppController', 'Controller');


class BaseController extends AppController
{
    public function datatable($object, $query, $rows)
    {
        $data = $object->find('all', $query);

        $queryCountWithConditions = $query;
        unset($queryCountWithConditions["order"]);
        unset($queryCountWithConditions["limit"]);
        unset($queryCountWithConditions["offset"]);

        $countWithConditions = $object->find('count', $queryCountWithConditions);

        $queryCountWithOutConditions = $query;
        unset($queryCountWithOutConditions["conditions"]);
        unset($queryCountWithOutConditions["order"]);
        unset($queryCountWithOutConditions["limit"]);
        unset($queryCountWithOutConditions["offset"]);

        $countWithOutConditions = $object->find('count', $query);

        $aaData = array_map($rows, $data);

        $result = array(
            "sEcho" => $this->request->data['sEcho'],
            "iTotalRecords" => $countWithConditions,
            "iTotalDisplayRecords" => $countWithConditions,
            "aaData" => $aaData
        );
        
        return $result;
    }
}

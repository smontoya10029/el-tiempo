<?php

App::uses('BaseController', 'Controller');

class ProductosController extends BaseController
{

    public $components = array('Server', 'DataBase', 'CurlRequests');
    public $uses = array("Producto");

    public function inicio_order($sort)
    {
        switch ($sort) {
            case '0':
                $order = "Producto.id";
                break;
            case '1':
                $order = "Producto.nombre";
                break;
            default:
                $order = "Producto.id";
                break;
        }
        return $order;
    }

    public function inicio()
    {
        if ($this->request->is('post')) {
            $fields = array(
                'Producto.id',
                'Profile.nombre',
                'Profile.valor',
            );

            $order = $this->inicio_order($this->request->data['iSortCol_0']);
            $condiciones = array();

            $searchSort = $this->request->data['sSearch'];
            $fls = array();
            foreach ($fields as $keyfields => $valuefields) {
                $fls[] = ' ' . $valuefields . '  LIKE "%' . $searchSort . '%"';
            }
            $condiciones[] = array(
                'OR' => $fls
            );

            $orderDir = $this->request->data['sSortDir_0'];

            $query = array(
                array(
                    'recursive' => -1,
                ),
                'conditions' => $condiciones,
                'fields' => $fields,
                'order' => array($order => $orderDir),
                'limit' => $this->request->data['iDisplayLength'],
                'offset' => $this->request->data['iDisplayStart']
            );
            $output = $this->datatable($this->Producto, $query, function ($item) {
                $row = array();
                $row[] = $item['Producto']['id'];
                $row[] = $item['Producto']['nombre'];
                $row[] = $item['Producto']['valor'];
                $botones = "";
                $botones .= '<button type="button" data_id="' . $item["producto"]["id"] . '" class="btn btn-warning btn-icon btn-sm tooltips btnEdit" data-toggle="tooltip" title="EDITAR"><i class="fa fa-edit"></i>';
                $botones .= '<button type="button" data_id="' . $item["producto"]["id"] . '" class="btn btn-danger btn-icon btn-sm tooltips delete" data-toggle="tooltip" title="Borrar"><i class="fa fa-trash"></i></button>';
                $row[] = $botones;
                return $row;
            });
            echo json_encode($output);
            exit;
        }
        $this->layout = "default";
    }

    public function add_producto()
    {
        if ($this->request->is('post')) {
            $this->Producto->create();
            $this->Producto->save($this->request->data["Producto"]);

            return $this->redirect(array('action' => 'inicio'));
        }

        $this->layout = "vacio";
    }

    public function edit_grupo($id)
    {
        if ($this->request->is('post')) {
            $this->Producto->id = $this->request->data['Producto']['id'];
            $this->Producto->save($this->request->data["Producto"]);

            return $this->redirect(array('action' => 'inicio'));
        }

        $producto = $this->producto->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Producto.id' => $id
            )
        ));

        $endponit = "127.0.0.1:3000";
        
        $this->set(compact('producto', 'endpoint'));
        $this->layout = "vacio";
    }

    public function delete_producto($id)
    {
        $this->Producto->deleteAll(array(
            'Producto.id' => $id
        ));
        echo json_encode(array("error" => "0", "mensaje" => "Producto removido correctamente!"));
        exit;
    }

}

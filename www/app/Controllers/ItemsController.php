<?php 
namespace App\Controllers;
use App\Models\ItemModel;
use CodeIgniter\Controller;

class ItemsController extends Controller
{
    public function index(){
        $ItemModel = new ItemModel();
        $data['items'] = $ItemModel->orderBy('id', 'DESC')->findAll();
        return view('itemlist', $data);
    }

    public function create(){
        return view('additem');
    }
 
    public function store() {
        $ItemModel = new ItemModel();
        if($file = $this->request->getFile('picture')){
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName(); 
                $filepath = base_url()."/uploads/".$newName;
                $data = [
                    'name' => $this->request->getVar('name'),
                    'category'  => $this->request->getVar('category'),
                    'cost_price'  => $this->request->getVar('cost_price'),
                    'unit_price'  => $this->request->getVar('unit_price'),
                    'pic_filename'  => $filepath,
                ];
                if($ItemModel->insert($data)){
                    $file->move('../public/uploads', $newName);
                    session()->setFlashdata('message', 'El ítem fue guardado');
                    session()->setFlashdata('alert-class', 'alert-success');
                    return $this->response->redirect(site_url('/'));
                }else{
                   session()->setFlashdata('add-error', 'No se pudo guardar el ítem.');
                   session()->setFlashdata('alert-class', 'alert-danger');
                   return $this->response->redirect(site_url('/additem'));
                }
            }else{
               session()->setFlashdata('add-error', 'Por favor, adjunta un archivo de imagen.');
               session()->setFlashdata('alert-class', 'alert-danger');
               return $this->response->redirect(site_url('/additem'));
            }
        }
    }

    public function singleItem($id = null){
        $ItemModel = new ItemModel();
        $data['item_obj'] = $ItemModel->where('id', $id)->first();
        return view('edititems', $data);
    }

    public function update(){
        $ItemModel = new ItemModel();
        $id = $this->request->getVar('id');

        if($file = $this->request->getFile('picture')){
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName(); 
                $filepath = base_url()."/uploads/".$newName;
                $data = [
                    'name' => $this->request->getVar('name'),
                    'category'  => $this->request->getVar('category'),
                    'cost_price'  => $this->request->getVar('cost_price'),
                    'unit_price'  => $this->request->getVar('unit_price'),
                    'pic_filename'  => $filepath,
                ];
                if($ItemModel->update($id, $data)){
                    $file->move('../public/uploads', $newName);
                    session()->setFlashdata('message', 'El ítem fue actualizado');
                    session()->setFlashdata('alert-class', 'alert-success');
                    return $this->response->redirect(site_url('/'));
                }else{
                   session()->setFlashdata('add-error', 'No se pudo actualizar el ítem.');
                   session()->setFlashdata('alert-class', 'alert-danger');
                   return $this->response->redirect(site_url('/edititem'));
                }
            }else{
                $data = [
                    'name' => $this->request->getVar('name'),
                    'category'  => $this->request->getVar('category'),
                    'cost_price'  => $this->request->getVar('cost_price'),
                    'unit_price'  => $this->request->getVar('unit_price'),
                    'pic_filename'  => $this->request->getVar('default_picture'),
                ];
                $ItemModel->update($id, $data);
                session()->setFlashdata('message', 'El ítem fue actualizado');
                session()->setFlashdata('alert-class', 'alert-success');
                return $this->response->redirect(site_url('/'));
            }
        }
    }
 
    public function delete($id = null){
        $ItemModel = new ItemModel();
        $data['item'] = $ItemModel->where('id', $id)->delete($id);
        session()->setFlashdata('message', 'El ítem fue eliminado');
        session()->setFlashdata('alert-class', 'alert-success');
        return $this->response->redirect(site_url('/'));
    }    
}
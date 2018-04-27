<?php


class ControllerMain extends Controller
{

    public function action_index()
    {
        return json_encode(ModuleDatabaseConnection::instance()->notes->getAllWhere());

    }

    public function action_add()
    {
        $name = @$_POST["name"];
        $description = @$_POST["description"];
        if (empty($name) || empty($description)) throw new Exception("enter all fields");
        ModuleDatabaseConnection::instance()
            ->notes
            ->insert(["name"=>$name,"description"=>$description]);
        $this->redirect(URLROOT);
    }
    public function action_del()
    {
        $id = @$_POST["id"];
        if (empty($id)) $this->redirect404();
        ModuleDatabaseConnection::instance()
            ->notes
            ->deleteById((int)$id);
        $this->redirect(URLROOT);
    }

    public function action_get()
    {

        $id = @$this->getUriParam("id");

        if (empty($id)) $this->redirect404();
        $data = ModuleDatabaseConnection::instance()

            ->notes

            ->getFirstWhere("id=?",[(int)$id]);

        $this->response(json_encode($data));

    }

    public function action_getAll(){
        echo json_encode(ModuleDatabaseConnection::instance()->notes->getAllWhere());
    }
}
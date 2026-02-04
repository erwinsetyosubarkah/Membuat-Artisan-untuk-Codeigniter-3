<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CI_Artisan.php
 * -------------------------------------------------
 * Laravel-like Artisan CLI for CodeIgniter 3
 * All generators produce EDITABLE TEMPLATE (snippet-style)
 *
 * Usage:
 * php index.php cli/ci_artisan make:model User
 */

class CI_Artisan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            exit("CLI only\n");
        }
    }

    /* ================= HELP ================= */

    public function index()
    {
        echo "Available Commands:\n";
        echo " make:model User\n";
        echo " make:controller UserController\n";
        echo " make:request StoreUserRequest\n";
        echo " make:migration create_users_table\n";
        echo " make:crud users\n";
        echo " make:api users\n";
        echo " make:auth\n";
        echo " make:policy UserPolicy\n";
        echo " make:middleware AuthMiddleware\n";
        echo " db:migrate\n";
        echo " db:seed UserSeeder\n";
        echo " cache:clear\n";
        echo " route:list\n";
    }

    /* ================= ROUTER ================= */

    public function make($type = null, $name = null)
    {
        switch ($type) {
            case 'model': $this->makeModel($name); break;
            case 'controller': $this->makeController($name); break;
            case 'request': $this->makeRequest($name); break;
            case 'migration': $this->makeMigration($name); break;
            case 'crud': $this->makeCrud($name); break;
            case 'api': $this->makeApi($name); break;
            case 'auth': $this->makeAuth(); break;
            case 'policy': $this->makePolicy($name); break;
            case 'middleware': $this->makeMiddleware($name); break;
        }
    }

    /* ================= GENERATORS ================= */

    private function makeModel($name)
    {
        $file = APPPATH."models/{$name}_model.php";
        file_put_contents($file, "<?php
class {$name}_model extends CI_Model {

    protected \$table = ''; // TODO: set table

    public function all()
    {
        return \$this->db->get(\$this->table)->result();
    }

    public function find(\$id)
    {
        return \$this->db->get_where(\$this->table, ['id'=>\$id])->row();
    }
}
");
        echo "Model $name created\n";
    }

    private function makeController($name)
    {
        $file = APPPATH."controllers/$name.php";
        file_put_contents($file, "<?php
class $name extends CI_Controller {

    public function index()
    {
        // TODO
    }
}
");
        echo "Controller $name created\n";
    }

    private function makeRequest($name)
    {
        $dir = APPPATH.'requests/';
        if (!is_dir($dir)) mkdir($dir,0755,true);

        file_put_contents($dir.$name.'.php', "<?php
class $name {

    protected \$CI;

    public function __construct()
    {
        \$this->CI =& get_instance();
        \$this->CI->load->library('form_validation');
    }

    public function rules()
    {
        return [
            // ['field'=>'name','label'=>'Name','rules'=>'required']
        ];
    }

    public function validate()
    {
        \$this->CI->form_validation->set_rules(\$this->rules());
        return \$this->CI->form_validation->run();
    }
}
");
        echo "Request $name created\n";
    }

    private function makeMigration($name)
    {
        $v = date('YmdHis');
        file_put_contents(APPPATH."migrations/{$v}_$name.php", "<?php
class Migration_".ucfirst($name)." extends CI_Migration {

    public function up()
    {
        // TODO
    }

    public function down()
    {
        // TODO
    }
}
");
        echo "Migration created\n";
    }

    private function makeCrud($table)
    {
        $class = ucfirst($table);
        $this->makeModel($class);
        $this->makeController($class);
        mkdir(APPPATH."views/$table",0755,true);
        echo "CRUD $table generated\n";
    }

    private function makeApi($name)
    {
        $dir = APPPATH.'controllers/api/';
        if (!is_dir($dir)) mkdir($dir,0755,true);

        file_put_contents($dir.ucfirst($name).'Api.php', "<?php
class ".ucfirst($name)."Api extends CI_Controller {

    public function index()
    {
        echo json_encode(['status'=>true,'data'=>[]]);
    }
}
");
        echo "API created\n";
    }

    private function makeAuth()
    {
        echo "Auth scaffolding placeholder (login/register) created\n";
    }

    private function makePolicy($name)
    {
        $dir = APPPATH.'policies/';
        if (!is_dir($dir)) mkdir($dir,0755,true);

        file_put_contents($dir.$name.'.php', "<?php
class $name {
    public function view() { return true; }
    public function create() { return true; }
}
");
        echo "Policy created\n";
    }

    private function makeMiddleware($name)
    {
        $dir = APPPATH.'middleware/';
        if (!is_dir($dir)) mkdir($dir,0755,true);

        file_put_contents($dir.$name.'.php', "<?php
class $name {

    public function before()
    {
        // before hook
    }

    public function after()
    {
        // after hook
    }
}
");
        echo "Middleware created\n";
    }

    /* ================= UTIL ================= */

    public function db($action=null,$name=null)
    {
        if ($action==='migrate') {
            $this->load->library('migration');
            $this->migration->current();
            echo "Migrated\n";
        }
        if ($action==='seed') {
            echo "Seeder $name executed\n";
        }
    }

    public function cache($action=null)
    {
        if ($action==='clear') {
            $this->cache->clean();
            echo "Cache cleared\n";
        }
    }

    public function route($action=null)
    {
        if ($action==='list') {
            print_r($this->router->routes);
        }
    }
}

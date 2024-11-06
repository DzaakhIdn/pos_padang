<?php
require_once __DIR__ . '/Model.php';

class User extends Model
{
    protected $table = 'user';

    public function create($datas)
    {
        return parent::create_data($datas, $this->table);
    }
    public function all()
    {
        return parent::all_data($this->table);
    }
    public function find($id)
    {
        return parent::find_data($id, $this->table);
    }
    public function update($id, $datas)
    {
        return parent::update_data($id, $datas, $this->table);
    }
    public function delete($id)
    {
        return parent::delete_data($id, $this->table);
    }
    public function register($datas){

        $email = $datas["post"]["email"];
        $name = $datas["post"]["name"];
        $password = $datas["post"]["password"];
        $gender = $datas["post"]["gender"];

        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);
        if(mysqli_num_rows($result) > 0){
            return "email udah ada cu";
        }

        $nama_file = $datas["files"]["avatar"]["name"];
        $file_size = $datas["files"]["avatar"]["size"];
        $tmp_name = $datas["files"]["avatar"]["tmp_name"];
        $file_extension = pathinfo($nama_file, PATHINFO_EXTENSION);
        $allowed_extension = ["jpg", "jpeg", "gif", "svg", "png", "webp"];

        if(!in_array($file_extension, $allowed_extension)){
            echo "<script> alert('extensi tidak diizinkan!') window.location.href = '../views/create-menu.php'";
        }
        if($file_size > 5120000 ){
            echo "
            <script>
            Swal.fire('SweetAlert2 is working!');
            </script>
            ";
        }

        $nama_file = random_int(1000, 9999) . "." . $file_extension;
        if(move_uploaded_file($tmp_name, "/var/www/html/projects/pos/public/img/users/" . $nama_file)){
            echo "file berhasil diunggah";
        } else {
            echo "gagal cu";
            var_dump(error_get_last());
            die;
        }
        
        $pass = base64_encode($password);
        $query_register = "INSERT INTO {$this->table} (name, avatar, gender, email, password) VALUES ('$name', '$nama_file', '$gender', '$email', '$pass')";

        $result = mysqli_query($this->db, $query_register);

        if(!$result){
            return "Register gagal";
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['avatar'] = $nama_file;
    
            $detail_user = [
                'name' => $name,
                'email' => $email,
                'avatar' => $nama_file,
            ];
    
            return $detail_user;
        }
    }
    public function login($email, $pass){

        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) == 0){
            return "email tidak ditemukan";
        }

        $user = mysqli_fetch_assoc($result);
        if(base64_decode($user['password'], false) === $pass){
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["avatar"] = $user["avatar"];
    
            $detail_user = [
                'name' => $user['name'],
                'email' => $email,
                'avatar' => $user['avatar']
            ];
    
            return $detail_user;
        } else {
            return "Password salah";
        }

    }
}

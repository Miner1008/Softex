<?php //error_reporting(0);
 
#User Login
function login($username, $password) {
    global $mysql;
    $sql = "SELECT id FROM users where email = '".$username."' and password = '".$password."'";
    $result = mysqli_query($mysql, $sql);
    $num_rows = mysqli_num_rows($result);
     
    if ($num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['id'];
    } else {
        return false;
    }
}

# Insert Data 
function Insert($table, $data) {
    global $mysql;
    $fields = array_keys($data);
    $values = array_map(array($mysql, 'real_escape_string'), array_values($data));
    mysqli_query($mysql, "INSERT INTO $table(".implode(",", $fields).") VALUES ('".implode("','", $values )."');") or die(mysqli_error($mysql));
}

// Update Data, Where clause is left optional
function Update($table_name, $form_data, $where_clause='') {
    global $mysql;
    // check for optional where clause
    $whereSQL = '';
    if (!empty($where_clause)) {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE') {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach ($form_data as $column => $value) {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;
    
    //var_dump($sql);
    //exit();
    // run and return the query result
    return mysqli_query($mysql, $sql);
}

 
//Delete Data, the where clause is left optional incase the user wants to delete every row!
function Delete($table_name, $where_clause='') {
    global $mysql;
    // check for optional where clause
    $whereSQL = '';
    if (!empty($where_clause)) {
        // check to see if the 'where' keyword exists
        if (substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE') {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;
     
    // run and return the query result resource
    return mysqli_query($mysql, $sql);
}

//Image compress
function compress_image($source_url, $destination_url, $quality) {
    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_url);
    } else if ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source_url);
    } else if ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_url);
    }

    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
}

//Get class name of the <i/> tag for status of company
function get_status_led($status){
    $img_id = "";
    if ($status == "Pending") {
        $img_id = "bg-light";
    } else if ($status == "Completed") {
        $img_id = "bg-success";
    }
    else if ($status == "Delayed") {
        $img_id = "bg-danger";
    }
    else if ($status == "On schedule") {
        $img_id = "bg-info";
    }
    else{
        $img_id = "bg-default";   
    }

    return $img_id;
}

//Get user's avatar path
function get_avatar_path($user_name){
   global $mysql;
   $avatar = "assets/img/theme/default.png";
   $sql = "SELECT avatar FROM users WHERE name = '".$user_name."' ORDER BY id DESC";
   $result = mysqli_query($mysql, $sql);
   $num_rows = mysqli_num_rows($result);
   if ($num_rows > 0) {
       $row = mysqli_fetch_assoc($result);
       if ($row['avatar'] != "") 
           $avatar = $row['avatar'];
   }

   return $avatar;
}

function get_user_age($user_birthday)
{
    $cur_year = date('Y');
    $born_year = date("Y", strtotime($user_birthday));

    $age = $cur_year - $born_year;

    return $age;
}

?>
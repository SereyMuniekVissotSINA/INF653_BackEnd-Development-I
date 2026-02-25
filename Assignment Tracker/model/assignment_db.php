<?php 
require_once('database.php');
function get_assignments_by_course_name($course_id){
    global $db;
    if ($course_id){
    $query = 'SELECT A.ID, A.Description, C.courseName FROM assignments A 
            LEFT JOIN courses C ON A.courseID = C.courseID
            WHERE A.courseID = :course_id ORDER BY A.ID'; 
    } else{
    $query = 'SELECT A.ID, A.Description, C.courseName FROM assignments A 
            LEFT JOIN courses C ON A.courseID = C.courseID
            ORDER BY A.ID'; 
    }
    $statement = $db->prepare($query);
    if ($course_id){
        $statement->bindValue(':course_id', $course_id);
    }

    $statement->execute();
    $assignments = $statement->fetchAll();
    $statement->closeCursor();
    return $assignments;
}

function delete_assignment($assignment_id){
    global $db;
        $query = 'DELETE FROM assignments WHERE ID = :assignment_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':assignment_id', $assignment_id);
        $statement->execute();
        $statement->closeCursor();
}

function add_assignment($description, $course_id){
    global $db;
    $query = 'INSERT INTO assignments (courseID, Description) VALUES (:course_id, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

function update_assignment($assignment_id, $description, $course_id){

}
?>
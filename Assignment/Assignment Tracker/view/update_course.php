<?php
include("view/header.php");
?>

<section class="course-container">
    <h2>Update Course</h2>

    <form action="." method="post">
        <input type="hidden" name="action" value="update_course">
        <input type="hidden" name="course_id" value="<?= $course['courseID'] ?>">
        
        <label>Course Name:</label>
        <input type="text" name="course_name" maxlength="30" placeholder="Name" value="<?= htmlspecialchars($course['courseName']) ?>" required>
        
        <button type="submit">Update Course</button>
    </form>

    <p><a href=".?action=list_courses">Cancel</a></p>
</section>

<?php
include("view/footer.php");
?>

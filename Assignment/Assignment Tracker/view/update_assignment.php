<?php
include('view/header.php');
?>

<section class="assignment-container">
    <h2>Update Assignment</h2>

    <form action="." method="post">
        <input type="hidden" name="action" value="update_assignment">
        <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">
        
        <label>Course:</label>
        <select name="course_id" required>
            <option value="">Please select</option>
            <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID'] ?>" <?= $assignment['courseID'] == $course['courseID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($course['courseName']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Description:</label>
        <input type="text" name="description" maxlength="120" placeholder="Description" value="<?= htmlspecialchars($assignment['Description']) ?>" required>
        
        <button type="submit">Update Assignment</button>
    </form>

    <p><a href=".?action=list_assignments">Cancel</a></p>
</section>

<?php
include('view/footer.php');
?>
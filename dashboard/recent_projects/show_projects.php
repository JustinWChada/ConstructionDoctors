<link rel="stylesheet" href="recent_projects/show_projects.css" type="text/css">

<div class="project-container">
    <h2>List of Projects</h2>
    <br>

    <?php
    require "../db_management.php";

    try {
        // Fetch all projects
        $sql = "SELECT * FROM projects ORDER BY id DESC";
        $stmt = $MgtConn->prepare($sql);
        $stmt->execute();
        $projects = $stmt->get_result();

        while ($row = $projects->fetch_assoc()) {
            ?>
            <div class="project-card" data-id="<?php echo htmlspecialchars($row['id']); ?>">
                <h3 class="project-title"><?php echo htmlspecialchars($row['project_title']); ?></h3>
                <img src="../files/uploads/projects/<?php echo htmlspecialchars($row['project_image']); ?>"
                    class="project-image">
                <textarea class="project-description"
                    style="display:none;"><?php echo htmlspecialchars($row['project_description']); ?></textarea>
                <a href="../files/uploads/projects/<?php echo htmlspecialchars($row['project_image']); ?>">Image</a>
            </div>
            <?php
        }
        //$projects = $stmt->fetch();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>


</div>

<!-- Update Project Modal -->
<div id="updateModal" style="display:none;">
    <form id="updateForm">
        <input type="hidden" id="update_id" name="update_id">
        <label for="update_project_title">Project Title:</label>
        <input type="text" id="update_project_title" name="update_project_title" required>

        <label for="update_description">Description:</label>
        <textarea id="update_description" name="update_description" required></textarea>

        <label for="update_image">Image URL: <small><i>leave empty to not replace</i></small></label>
        <input type="file" id="image" name="update_image" accept="image/*">

        <br>
        <button type="submit">Update Project</button>
        <button type="button" id="closeModal">Close</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="recent_projects/show_projects.js"></script>
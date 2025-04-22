<link rel="stylesheet" href="recent_projects/add_projects.css" type="text/css">

<div class="container">
    <h2>Add New Project</h2>
    <form id="projectForm">
        <input name="save_project" readonly hidden>
        <label for="project_title">Project Title:</label>
        <input type="text" id="project_title" name="project_title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="image">Image URL:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br>

        <button type="submit">Save Project</button>
    </form>
    <div id="response"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="recent_projects/add_projects.js"></script>
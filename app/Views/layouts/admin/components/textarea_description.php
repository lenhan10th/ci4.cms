<div class="form-group">
    <label class="control-label">Description (SEO)</label>
    <textarea class="form-control" name="description" data-autoresize><?php echo isset($row['description']) ? html_escape($row['description']) : ''; ?></textarea>
</div>
<div class="form-group">
    Từ khóa
</div>
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control input-sm" name="q" value="<?php echo isset($get['q']) ? html_escape($get['q']) : ''; ?>"  placeholder="Từ khóa tìm kiếm">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
            <a class="btn btn-danger btn-sm" href="<?php echo get_admin_url($module_slug); ?>">Xóa điều kiện lọc</a>
        </span>
    </div>
</div>
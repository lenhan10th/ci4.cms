<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="container">
            <div class="row mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($users): ?>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <td>
                                <?php echo $user['id']; ?>
                            </td>
                            <td>
                                <?php echo $user['name']; ?>
                            </td>
                            <td>
                                <?php echo $user['email']; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <div class="pagination justify-content-center mb-4">
                            <?php if (!empty($pager)) :
                                //echo $pager->simpleLinks($groupPage, 'bs_simple');
                                echo $pager->links($groupPage, 'bs_full');
                                //Pagination library uses page query parameter for HTTP queries by default (if no group or default group name given) or page_[groupName] for custom group names.
                            endif ?>

                            <!-- Bootstrap 4.5.2 code to show page 1 of 4 total pages using a button. -->
                            <div class="btn-group pagination justify-content-center mb-4" role="group" aria-label="pager counts">
                                &nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-light"><?= 'Page '.$currentPage.' of '.$totalPages; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <?php if (! empty($news) && is_array($news)): ?>
                        <?php foreach ($news as $news_item): ?>
                            <div class="col-md-12">
                                <h3><?= esc($news_item['title']) ?></h3>
                                <div class="main">
                                    <?= esc($news_item['body']) ?>
                                </div>
                                <p><a href="<?= site_url('news/' . esc($news_item['slug'], 'url')) ?>">View article</a></p>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <h3>No News</h3>
                            <p>Unable to find any news for you.</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
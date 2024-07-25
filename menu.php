<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <?php if($_SESSION["kanri_flg"] == 1): ?>
                <a class="navbar-brand" href="select.php">会員一覧</a>　
                <a class="navbar-brand" href="user.php">ユーザー登録</a>　
            <?php else: ?>
                <a class="navbar-brand" href="user_top.php">ホーム</a>　
            <?php endif; ?>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
    </div>
</nav>
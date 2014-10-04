<?php
// Concrete5インストール用の設定主に【】で囲まれた部分を差し替えてください
$git_path = "https://github.com/concrete5japan/concrete5.git";
// インストール設定
$db_server = "【DB host】"; // データベースの接続ホストを指定します。WebとDBが同じサーバーの場合localhostが一般的です
$db_user_name = "【DBのユーザー名】";
$db_password = "【DBのパスワード】";
$db_name = "【DB名】";
$site_name = "【サイト名】"; // サイト名を指定します
$admin_mail = "【管理者のメアド】"; // 管理者用のメールアドレスです。パスワードリマインダーなどで利用します
$admin_password = "【管理者のパスワード】"; // ログイン時に使用する。ユーザー名はadmin
$starting_point = "standard"; // blankを指定すると空のサイトができる
// インストールするフォルダ名
$dir_name = "con5";

// 設定ここまで

echo "git clone concrete5...\n";

exec("git clone ${git_path}");

echo "git clone end\n";

// フォルダ名を変更
echo "move dir...\n";

exec("mv concrete5 ${dir_name}");

echo "move dir end\n";

$core_path = dirname(__FILE__). "/". $dir_name. "/web/concrete";

$cmd = "php ". $dir_name. "/cli/install-concrete5.php ".
       " --db-server=". $db_server.
       " --db-username=". $db_user_name.
       " --db-password=". $db_password.
       " --db-database=". $db_name.
       " --site=". $site_name.
       " --starting-point=". $starting_point.
       " --admin-password=". $admin_password.
       " --admin-email=".$admin_mail.
       " --core=". $core_path.
       " --target=". dirname(__FILE__). "/". $dir_name. "/web";

echo "install concrete5...\n";

echo $cmd. "\n";
exec($cmd);

echo "install end\n";

?>

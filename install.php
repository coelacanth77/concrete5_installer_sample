<?php
// Concrete5�C���X�g�[���p�̐ݒ��Ɂy�z�ň͂܂ꂽ�����������ւ��Ă�������
$git_path = "https://github.com/concrete5japan/concrete5.git";
// �C���X�g�[���ݒ�
$db_server = "�yDB host�z"; // �f�[�^�x�[�X�̐ڑ��z�X�g���w�肵�܂��BWeb��DB�������T�[�o�[�̏ꍇlocalhost����ʓI�ł�
$db_user_name = "�yDB�̃��[�U�[���z";
$db_password = "�yDB�̃p�X���[�h�z";
$db_name = "�yDB���z";
$site_name = "�y�T�C�g���z"; // �T�C�g�����w�肵�܂�
$admin_mail = "�y�Ǘ��҂̃��A�h�z"; // �Ǘ��җp�̃��[���A�h���X�ł��B�p�X���[�h���}�C���_�[�Ȃǂŗ��p���܂�
$admin_password = "�y�Ǘ��҂̃p�X���[�h�z"; // ���O�C�����Ɏg�p����B���[�U�[����admin
$starting_point = "standard"; // blank���w�肷��Ƌ�̃T�C�g���ł���
// �C���X�g�[������t�H���_��
$dir_name = "con5";

// �ݒ肱���܂�

echo "git clone concrete5...\n";

exec("git clone ${git_path}");

echo "git clone end\n";

// �t�H���_����ύX
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

<?php
 
// Include database, session, general info
require_once 'core/init.php';
// Include header
require_once 'includes/header.php';
 
// LAYOUT
 //neu ton tai user'
if ($user) {
	if (isset($_GET['ac'])) {
		$ac = addcslashes(trim(htmlentities($_GET['ac'])));
		// neu hanh dong la them note\
		if ($ac == 'create_note') {
			//include template form them note
			require_once 'templates/create-note-form.php';
		} else if ($ac == 'edit_note') {
			//neu co id truyen vao
			if (isset($_GET['id'])) {
				$get_id = addcslashes(trim(htmlentities($_GET['id'])));
				if ($get_id != '') {
					//cau lenh kiem tra su ton tai va quyen edit note
					$sql_check_id_exist = "SELECT id, user_id FROM notes WHERE user_id = '$data[id]' AND id = '$get_id'";
						// Nếu có tồn tại và thuộc quyền sở hữu
	                if ($db->num_rows($sql_check_id_exist))
	                {
	                    // Include template chỉnh sửa note
	                    require_once 'templates/edit-note-form.php';
	                }
	                // Ngược lại không tồn tại và không thuộc quyền sở hữu 
	                else
	                {   
	                    // Hiển thị thông báo lỗi
	                    echo '
	                        <div class="container">
	                            <div class="alert alert-danger">
	                                Note này không tồn tại hoặc không thuộc quyền sở hữu của bạn.
	                            </div>
	                        </div>
	                    ';
	                }         
				} else {
					header('Location: index.php');
				}
			} else {
				header('Location: index.php');
			}
		} else if ($ac == 'change_password') {
			//include form change pass
			require_once 'templates/change-pass-form.php';
		}
	} else {
		//include list note
		require_once 'templates/list-note.php';
	}	
		
} else {
	require_once 'templates/signin-up-form.php';
}
	
// Include footer
require_once 'includes/footer.php';
 

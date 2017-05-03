<?php

class Session
{
	//ham gui du lieu
	public function send($user)
	{
		$_SESSION['user'] = $user;
	}
	//ham bawt dau luu session
	public function start()
	{
		session_start();
	}
	//ham lay du lieu session
	public function get()
	{
		//kiem tra ton tai session
		if (isset($_SESSION['user'])) {
			$user = $_SESSION['user'];
		} else {
			$user = '';
		}

		return $user;

	}
	//ham xoa session
	public function destroy()
	{
		session_destroy();
	}
}
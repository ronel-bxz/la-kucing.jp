<?php session_start();?>
<?php
	if (empty($_SESSION['contact_data'])) {
		header('location:https://la-kucing.jp/contact/');
	}
	if (isset($_POST['send'])) {

		$to = "info@koki-beauty.com";
		$subject = "お問い合わせがありました。";

		$message = "お問い合わせの種類:".$_SESSION['contact_data']['question']."<br>";
		$message .= "姓: ".$_SESSION['contact_data']['surname']." "."名: ".$_SESSION['contact_data']['firstname']."<br>";
		$message .= "セイ: ".$_SESSION['contact_data']['say']." "."メイ: ".$_SESSION['contact_data']['mei']."<br>";
		$message .= "会社・事業所名: ".$_SESSION['contact_data']['company']."<br>";
		$message .= "郵便番号: ".$_SESSION['contact_data']['zip']."<br>";
		$message .= "ご住所: ".$_SESSION['contact_data']['state']." ".$_SESSION['contact_data']['city']." ".$_SESSION['contact_data']['street']." ".$_SESSION['contact_data']['building']."<br>";
		$message .= "電話番号: ".$_SESSION['contact_data']['phonenumber']."<br>";
		$message .= "メールアドレス: ".$_SESSION['contact_data']['email']."<br>";
		$message .= "お問い合わせ内容: ".$_SESSION['contact_data']['inquiry-content']."<br>";

		$headers  = "From: la-kucing <". $_SESSION['contact_data']['email'] .">\n";
	    $headers .= "Cc: la-kucing < info@koki-beauty.com >\n"; 
	    $headers .= "X-Sender: la-kucing < info@koki-beauty.com >\n";
	    $headers .= 'X-Mailer: PHP/' . phpversion();
	    $headers .= "X-Priority: 1\n"; // Urgent message!
	    $headers .= "Return-Path: info@koki-beauty.com \n"; // Return path for errors
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=utf-8\n";

		$completed_sent=mail($to,$subject,$message,$headers);
		// var_dump($completed_sent);exit;
		if($completed_sent){

			// More headers
			$headers2  = "From: la-kucing < info@koki-beauty.com >\n";
		    $headers2 .= "Cc: la-kucing < info@koki-beauty.com >\n"; 
		    $headers2 .= "X-Sender: la-kucing < info@koki-beauty.com >\n";
		    $headers2 .= 'X-Mailer: PHP/' . phpversion();
		    $headers2 .= "X-Priority: 1\n"; // Urgent message!
		    $headers2 .= "Return-Path: info@koki-beauty.com \n"; // Return path for errors
		    $headers2 .= "MIME-Version: 1.0\r\n";
		    $headers2 .= "Content-Type: text/html; charset=utf-8\n";

			$subject2 = "お問い合わせありがとうございます";
			$send_to_user=mail($_SESSION['contact_data']['email'],$subject2,$message,$headers2);
			// var_dump($send_to_user);

			if ($send_to_user) {
				// exit;
				echo"<script>
					alert('電子メールを正常に送信');
				</script>";
				// unset($_SESSION['contact_data']);
				// header('location:https://la-kucing.jp/');
			}
			else{

				echo"<script>
					alert('電子メールを正常に送信');
				</script>";
			}
			

		}
		else{
			echo"<script>
				alert('メールの送信に失敗しました');
			</script>";
		}
	}
	else{

	}

?>
<?php require('header.php');?>
<div class="pages-container container contact">
	<div class="row">
		<div class="col-md-12">
			<div class="contact-content">
				<h1>お問い合わせ</h1>
				<p>以下の内容で送信してよろしいですか？</p>
				<form method="post" action="">
					<!-- <p class="contact-table-title"><span>※</span>項目は必ずご入力ください。</p> -->
					<table class="contact-table">
						<tr>
							<td class="bg-gray border-white">
								<span>※</span>お問い合わせの種類
							</td>
							<td class="border-gray">
								<p><?php echo $_SESSION['contact_data']['question']; ?></p>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">
								<span>※</span>お名前
							</td>
							<td class="name border-gray">
								<div class="d-flex flex-row">
									<div>
										<label>姓</label>
										<p><?php echo $_SESSION['contact_data']['surname']; ?></p>
									</div>
									<div style="padding-left: 30px;">
										<label >名</label>
										<p><?php echo $_SESSION['contact_data']['firstname']; ?></p>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">
								<span>※</span>フリガナ
							</td>
							<td class="name border-gray">
								<div class="d-flex flex-row">
									<div>
										<label>セイ</label>
										<p><?php echo $_SESSION['contact_data']['say']; ?></p>
									</div>
									<div style="padding-left: 30px;">
										<label>メイ</label>
										<p><?php echo $_SESSION['contact_data']['mei']; ?></p>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">会社・事業所名</td>
							<td class="border-gray">
								<p><?php echo $_SESSION['contact_data']['company']; ?></p>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">郵便番号</td>
							<td class="zip border-gray">
								<label>〒</label>
								<p><?php echo $_SESSION['contact_data']['zip']; ?></p>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">ご住所</td>
							<td class="border-gray address">
								<label>都道府県</label>
								<p><?php echo $_SESSION['contact_data']['state']; ?></p>
								<label>市区町村</label>
								<p><?php echo $_SESSION['contact_data']['city']; ?></p>
								<label>丁目番地号</label>
								<p><?php echo $_SESSION['contact_data']['street']; ?></p>
								<label>建物名など</label>
								<p><?php echo $_SESSION['contact_data']['building']; ?></p>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">電話番号</td>
							<td class="border-gray">
								<p><?php echo $_SESSION['contact_data']['phonenumber']; ?></p>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white"><span>※</span>メールアドレス</td>
							<td class="email border-gray">
								<p><?php echo $_SESSION['contact_data']['email']; ?></p>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white"><span>※</span>お問い合わせ内容</td>
							<td class="border-gray">
								<p><?php echo $_SESSION['contact_data']['inquiry-content']; ?></p>
							</td>
						</tr>

					</table>
					<!-- <p class="privacy-policy-link"><span>個人情報保護方針</span>への同意が必要となります。個人情報等の取り扱いについてをご一読の上、ご了承頂ければ同意にチェックを入れ、お進みください。</p> -->
					<div class="text-center">
						<!-- <input type="checkbox" id="agree" name="agree" class="tex-center" value="agree">
						<label for="agree">同意する</label> -->

						<br>
						<input class="check_content" type="submit" name="send" value="送信する">
						<br>
						<br>
						<a href="https://la-kucing.jp/contact/" class="btn" style="color: #000;text-decoration: underline;">←戻る</a>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require('footer.php'); ?>
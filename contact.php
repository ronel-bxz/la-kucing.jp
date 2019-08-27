<?php require('post_validation.php');?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
	$post_library= new Post_Validation;

	if(isset($_POST['check_content'])){
	        $config = array(
	          array(
	            "post_name" => 'firstname',
	            "post_label" => "名前を入力してください。",
	            "post_rules" => "required"
	          ),
	          array(
	            "post_name" => 'surname',
	            "post_label" => "名字を入力してください。",
	            "post_rules" => "required"
	          ),
	          array(
	            "post_name" => 'say',
	            "post_label" => "名字のフリガナを入力してください。",
	            "post_rules" => "required"
	          ),
	          array(
	            "post_name" => 'mei',
	            "post_label" => "名前のフリガナを入力してください。",
	            "post_rules" => "required"
	          ),
	          array(
	            "post_name" => 'question',
	            "post_label" => "お問合せの種類を選択してください。",
	            "post_rules" => "required"
	          ),
	          array(
	            "post_name" => 'email',
	            "post_label" => "メールアドレスを入力してください。",
	            "post_rules" => "required|email_check"
	          ),
	          array(
	            "post_name" => 'inquiry-content',
	            "post_label" => "お問い合わせ内容を入力してください。",
	            "post_rules" => "required"
	          ),
	          array(
	            "post_name" => 'agree',
	            "post_label" => "クリックして、同意にチェックを入れてください。",
	            "post_rules" => "required"
	          )
	         
	        );

	 		if($post_library->post_validate($config)){
	          
	         
	        }
	        else{
	        	$_SESSION['contact_data']=$_POST;
	        	header('location:https://la-kucing.jp/check_contact/');
	        }
      } 
      
      ?>

<?php require('header.php');?>
<div class="pages-container container contact">
	<div class="row">
		<div class="col-md-12">
			<div class="contact-content">
				<h1>お問い合わせ</h1>
				<p>商品や弊社に関して、ご相談やご質問などお気軽にお問い合わせください。 <br>
				下記フォームより必要事項を入力頂き、「内容を確認する」ボタンを押してください。<br>
				送信後、自動返信メールが届きます。<br>
				もし何も届かない場合は、メールアドレスの記入間違いにより返信ができていない場合がございますので、その際はお手数ですが、再度お問い合わせをお願いいたします。</p>
				<h2></h2>
				<form method="post" action="">
					<p class="contact-table-title"><span>※</span>項目は必ずご入力ください。</p>
					<table class="contact-table">
						<tr>
							<td class="bg-gray border-white">
								<span>※</span>お問い合わせの種類
							</td>
							<td class="border-gray border-black">
								<select name="question">
									<option value="">ご質問</option>
									<option value="ラクチン商品について" <?php echo $post_library->select_question('ラクチン商品について'); ?>>ラクチン商品について</option>
									<option value="その他" <?php echo  $post_library->select_question('その他'); ?>>その他</option>
								</select>
								<?php $post_library->set_error('question'); ?>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">
								<span>※</span>お名前
							</td>
							<td class="name border-gray">
								<div class="d-flex flex-row">
									<div>
										<label>姓</label> <input type="text" name="surname" placeholder="山田" value="<?php echo (empty($_SESSION['contact_data']['surname'])) ?  $post_library->set_value('surname') : $_SESSION['contact_data']['surname'];?>">
										<?php $post_library->set_error('surname'); ?>
									</div>
									<div class="name-padding-left">
										<label >名</label> <input type="text" name="firstname" placeholder="太郎" value="<?php echo (empty($_SESSION['contact_data']['firstname'])) ?  $post_library->set_value('firstname') : $_SESSION['contact_data']['firstname'];?>">
										<?php $post_library->set_error('firstname'); ?>
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
										<label>セイ</label> <input type="text" name="say" placeholder="ヤマダ" value="<?php echo (empty($_SESSION['contact_data']['say'])) ?  $post_library->set_value('say') : $_SESSION['contact_data']['say'];?>">
										<?php $post_library->set_error('say'); ?>
									</div>
									<div class="name-padding-left">
										<label>メイ</label> <input type="text" name="mei" placeholder="タロウ" value="<?php echo (empty($_SESSION['contact_data']['mei'])) ?  $post_library->set_value('mei') : $_SESSION['contact_data']['mei'];?>">
										<?php $post_library->set_error('mei'); ?>
									</div>
								</div>
								
								
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">会社・事業所名</td>
							<td class="border-gray">
								<input type="text" name="company" placeholder="株式会社〇〇" value="<?php echo (empty($_SESSION['contact_data']['company'])) ?  $post_library->set_value('company') : $_SESSION['contact_data']['company'];?>">
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">郵便番号</td>
							<td class="zip border-gray">
								<label>〒</label>
								<input type="text" name="zip" placeholder="012-3456" id="zip" onKeyUp="AjaxZip3.zip2addr(this,'','state','city');" value="<?php echo (empty($_SESSION['contact_data']['zip'])) ?  $post_library->set_value('zip') : $_SESSION['contact_data']['zip'];?>">
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">ご住所</td>
							<td class="border-gray address">
								<label>都道府県</label>
								<select name="state" id="state">
									<option value="">選択してください</option>
									<option value="北海道" <?php echo $post_library->select_state('北海道'); ?> >北海道</option>
									<option value="青森県" <?php echo $post_library->select_state('青森県'); ?>>青森県</option>
									<option value="岩手県" <?php echo $post_library->select_state('岩手県'); ?>>岩手県</option>
									<option value="宮城県" <?php echo $post_library->select_state('宮城県'); ?>>宮城県</option>
									<option value="秋田県" <?php echo $post_library->select_state('秋田県'); ?>>秋田県</option>
									<option value="山形県" <?php echo $post_library->select_state('山形県'); ?>>山形県</option>
									<option value="福島県" <?php echo $post_library->select_state('福島県'); ?>>福島県</option>
									<option value="新潟県" <?php echo $post_library->select_state('新潟県'); ?>>新潟県</option>
									<option value="茨城県" <?php echo $post_library->select_state('茨城県'); ?>>茨城県</option>
									<option value="栃木県" <?php echo $post_library->select_state('栃木県'); ?>>栃木県</option>
									<option value="群馬県" <?php echo $post_library->select_state('群馬県'); ?>>群馬県</option>
									<option value="埼玉県" <?php echo $post_library->select_state('埼玉県'); ?>>埼玉県</option>
									<option value="千葉県" <?php echo $post_library->select_state('千葉県'); ?>>千葉県</option>
									<option value="東京都" <?php echo $post_library->select_state('東京都'); ?>>東京都</option>
									<option value="神奈川県" <?php echo $post_library->select_state('神奈川県'); ?>>神奈川県</option>
									<option value="静岡県" <?php echo $post_library->select_state('静岡県'); ?>>静岡県</option>
									<option value="石川県" <?php echo $post_library->select_state('石川県'); ?>>石川県</option>
									<option value="福井県" <?php echo $post_library->select_state('福井県'); ?>>福井県</option>
									<option value="山梨県" <?php echo $post_library->select_state('山梨県'); ?>>山梨県</option>
									<option value="長野県" <?php echo $post_library->select_state('長野県'); ?>>長野県</option>
									<option value="岐阜県" <?php echo $post_library->select_state('岐阜県'); ?>>岐阜県</option>
									<option value="静岡県" <?php echo $post_library->select_state('静岡県'); ?>>静岡県</option>
									<option value="愛知県" <?php echo $post_library->select_state('愛知県'); ?>>愛知県</option>
									<option value="三重県" <?php echo $post_library->select_state('三重県'); ?>>三重県</option>
									<option value="滋賀県" <?php echo $post_library->select_state('滋賀県'); ?>>滋賀県</option>
									<option value="京都県" <?php echo $post_library->select_state('京都県'); ?>>京都県</option>
									<option value="大阪府" <?php echo $post_library->select_state('大阪府'); ?>>大阪府</option>
									<option value="兵庫県" <?php echo $post_library->select_state('兵庫県'); ?>>兵庫県</option>
									<option value="奈良県" <?php echo $post_library->select_state('奈良県'); ?>>奈良県</option>
									<option value="和歌山県" <?php echo $post_library->select_state('和歌山県'); ?>>和歌山県</option>
									<option value="鳥取県" <?php echo $post_library->select_state('鳥取県'); ?>>鳥取県</option>
									<option value="島根県" <?php echo $post_library->select_state('島根県'); ?>>島根県</option>
									<option value="和歌県" <?php echo $post_library->select_state('和歌県'); ?>>和歌県</option>
									<option value="広島県" <?php echo $post_library->select_state('広島県'); ?>>広島県</option>
									<option value="山口県" <?php echo $post_library->select_state('山口県'); ?>>山口県</option>
									<option value="徳島県" <?php echo $post_library->select_state('徳島県'); ?>>徳島県</option>
									<option value="香川県" <?php echo $post_library->select_state('香川県'); ?>>香川県</option>
									<option value="愛媛県" <?php echo $post_library->select_state('愛媛県'); ?>>愛媛県</option>
									<option value="高知県" <?php echo $post_library->select_state('高知県'); ?>>高知県</option>
									<option value="福岡県" <?php echo $post_library->select_state('福岡県'); ?>>福岡県</option>
									<option value="宮崎県" <?php echo $post_library->select_state('宮崎県'); ?>>宮崎県</option>
									<option value="長崎県" <?php echo $post_library->select_state('長崎県'); ?>>長崎県</option>
									<option value="熊本県" <?php echo $post_library->select_state('熊本県'); ?>>熊本県</option>
									<option value="鹿児島県" <?php echo $post_library->select_state('鹿児島県'); ?>>鹿児島県</option>
									<option value="大分県" <?php echo $post_library->select_state('大分県'); ?>>大分県</option>
									<option value="沖縄県" <?php echo $post_library->select_state('沖縄県'); ?>>沖縄県</option> 
								</select>
								<label>市区町村</label>
								<input type="text" name="city" id="city" value="<?php echo (empty($_SESSION['contact_data']['city'])) ?  $post_library->set_value('city') : $_SESSION['contact_data']['city'];?>">
								<label>丁目番地号</label>
								<input type="text" name="street" placeholder="1-2-3" value="<?php echo (empty($_SESSION['contact_data']['street'])) ?  $post_library->set_value('street') : $_SESSION['contact_data']['street'];?>">
								<label>建物名など</label>
								<input type="text" name="building" value="<?php echo (empty($_SESSION['contact_data']['building'])) ?  $post_library->set_value('building') : $_SESSION['contact_data']['building'];?>">
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white">電話番号</td>
							<td class="border-gray">
								<input type="text" name="phonenumber" placeholder="06-1234-5678" value="<?php echo (empty($_SESSION['contact_data']['phonenumber'])) ?  $post_library->set_value('phonenumber') : $_SESSION['contact_data']['phonenumber'];?>">
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white"><span>※</span>メールアドレス</td>
							<td class="email border-gray">
								<input type="text" name="email" placeholder="example@koki-beauty.com" value="<?php echo (empty($_SESSION['contact_data']['email'])) ?  $post_library->set_value('email') : $_SESSION['contact_data']['email'];?>">
								<input type="text" name="email2" placeholder="確認用" value="<?php echo (empty($_SESSION['contact_data']['email2'])) ?  $post_library->set_value('email2') : $_SESSION['contact_data']['email2'];?>">
								<?php $post_library->set_error('email'); ?>
							</td>
						</tr>
						<tr>
							<td class="bg-gray border-white"><span>※</span>お問い合わせ内容</td>
							<td class="border-gray">
								<textarea name="inquiry-content"><?php echo (empty($_SESSION['contact_data']['inquiry-content'])) ?  $post_library->set_value('inquiry-content') : $_SESSION['contact_data']['inquiry-content'];?></textarea>
								<?php $post_library->set_error('inquiry-content'); ?>
							</td>
						</tr>

					</table>
					<p class="privacy-policy-link"><span>個人情報保護方針</span>への同意が必要となります。個人情報等の取り扱いについてをご一読の上、ご了承頂ければ同意にチェックを入れ、お進みください。</p>
					<div class="text-center">
						<input type="checkbox" id="agree" name="agree" class="tex-center" value="agree">
						<label for="agree">同意する</label>
						
						<?php $post_library->set_error('agree'); ?>
						<br>
						<input class="check_content" type="submit" name="check_content" value="内容を確認する">

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require('footer.php'); ?>
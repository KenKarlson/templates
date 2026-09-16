<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?
// Ошибки валидации
if (!empty($arResult["ERROR_MESSAGE"])) {
	foreach ($arResult["ERROR_MESSAGE"] as $message) {
		echo '<div class="alert alert--error">' . htmlspecialcharsbx($message) . '</div>';
	}
}

// Сообщение об успешной отправке
if (!empty($arResult["OK_MESSAGE"])) {
	echo '<div class="alert alert--success">' . htmlspecialcharsbx($arResult["OK_MESSAGE"]) . '</div>';
}

$postName    = $_POST["user_name"] ?? "";
$postEmail   = $_POST["user_email"] ?? "";
$postMessage = $_POST["MESSAGE"] ?? "";
$paramsHash  = $arResult["PARAMS_HASH"] ?? "";
?>

<form class="feedback-form" action="" method="post">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="PARAMS_HASH" value="<?=htmlspecialcharsbx($paramsHash)?>">

	<div class="form-group">
		<label class="form-label form-label--required" for="feedback-name">Ваше имя</label>
		<input class="form-input" type="text" id="feedback-name" name="user_name"
			value="<?=htmlspecialcharsbx($postName)?>" required>
	</div>

	<div class="form-group">
		<label class="form-label form-label--required" for="feedback-email">Email</label>
		<input class="form-input" type="email" id="feedback-email" name="user_email"
			value="<?=htmlspecialcharsbx($postEmail)?>" required>
	</div>

	<div class="form-group">
		<label class="form-label form-label--required" for="feedback-message">Сообщение</label>
		<textarea class="form-textarea" id="feedback-message" name="MESSAGE" required><?=htmlspecialcharsbx($postMessage)?></textarea>
	</div>

	<button type="submit" name="submit" class="btn btn--primary">Отправить</button>
</form>

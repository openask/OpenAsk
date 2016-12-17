<?php

require __DIR__.'/LoginCept.php';

$I->click('.widget-ask .btn');
$I->waitForElement('.redactor-editor');
$I->waitForElement('.select2-selection__rendered');
$I->fillField('#question-title', '测试 QuestionCreate');
$I->executeJS("$('#question-body').redactor('code.set', '<p>测试 QuestionCreate，文章内容 </p>');");
$I->click('.select2-selection__rendered');
$I->waitForElement('.select2-results__option');
$I->click('.select2-results__option:last-child');
$I->click('#w0 > div:nth-child(6) > button');
$I->wait(2);
$I->seeCurrentUrlMatches('#question/\d+#');
